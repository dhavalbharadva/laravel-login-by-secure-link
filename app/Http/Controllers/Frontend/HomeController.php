<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subscriber;
use App\Helpers\Common;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\LoginMail;
use App\User;
use App\Transformers\UserTransformer;
use Laravel\Passport\Events\AccessTokenCreated;

class HomeController extends Controller {

    /**
     * @var \App\Transformers\UserTransformer
     * */
    protected $userTransformer;

    public function __construct(UserTransformer $userTransformer) {
        $this->userTransformer = $userTransformer;
    }

    public function index() {
        return view('frontend.index');
    }
    
    /**
     * Send email link to user for login
     *
     * @author Dhaval
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request) {
        $data = $request->all();
        $rules = array(
            'email' => 'required|email'
        );

        $messages = array(
            'email.required' => 'Please enter email!'
        );
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        
        $userExist = User::where('email',$data['email'])->get()->toArray();
        if($userExist){
            $string = Common::generateRandomString(20);
            $token = Common::encode5t($string);
            
            $user = User::find($userExist[0]['id']);
            $user->remember_token = $token;
            $user->save();
            
            //send email to user with login link
            Mail::to($data['email'])->send(new LoginMail($user));

            return redirect('/')->with('success_message', 'Email send successfully!');
        }else{
            return redirect('/')->with('error_message', 'Email not found in our system!')->withInput();
        }
    }
    
    public function login($token) {
        $userArray = $this->getUserByToken($token);
        if($userArray){
            $tokenDecode = Common::decode5t($token);
            $tokenArr = explode('|', $tokenDecode);
            $linkGeneratedTime = end($tokenArr);
            if ($linkGeneratedTime < strtotime('-2 hours')) {
                return redirect('/')->with('error_message', 'Login link expired!');
            }
            
            $user = User::find($userArray[0]['id']);
            auth()->login($user);
            $user = auth()->guard()->user();
            $user->token =  $user->createToken('MyApp')->accessToken;
            $user->remember_token =  "";
            $user->save();
            
            return redirect('/dashboard');
        }else{
            return redirect('/')->with('error_message', 'Invalid login link!');
        }
    }
    
    public function getUserByToken($token) {
        return User::where('remember_token',$token)->get()->toArray();
    }
    
    public function dashboard() {
        $user = User::find(auth()->guard('user')->user()->id);
        return view('frontend.dashboard', compact('user'));
    }
    
    public function logout() {
        auth()->guard('user')->logout();
        session()->flush();
        session()->regenerate();
        return redirect('/')->with('success_message', "Logout successfully!");
    }

}
