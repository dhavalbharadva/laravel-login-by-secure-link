<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Common;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Transformers\UserTransformer;
use Laravel\Passport\Events\AccessTokenCreated;

class UserController extends Controller {
    
    protected $auth;
    /**
     * @var \App\Transformers\UserTransformer
     * */
    protected $userTransformer;

    public function __construct(UserTransformer $userTransformer) {
        $this->auth = auth()->guard('api');
        $this->userTransformer = $userTransformer;
    }
    
    public function profile() {
        $profile = User::find($this->auth->user()->id);
        if ($profile) {
            $data = $this->userTransformer->transform($profile);
            return $this->respondWithData($data);
        } else {
            return $this->respondNotFound();
        }
    }
    
    public function logout() {
        auth()->guard('api')->user()->token()->delete();
        return $this->respondWithSuccess(trans('Logout successfully!'));
    }

}
