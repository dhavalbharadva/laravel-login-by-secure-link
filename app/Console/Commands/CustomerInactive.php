<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;


class CustomerInactive extends Command {

   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CustomerInactive:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CustomerInactive description';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
 

    public function handle() {
        
         \Log::info("Cron is working fine!");
         
         /* $date = Date('Y-m-d', strtotime('+10 days'));
         \App\User::active()->where('created_at', '<', $date)->get();
         
         
         $date = Date('Y-m-d', strtotime('+10 days'));
        
        $customers = \App\User::where('created_date', '<', $date)->get();
        foreach ($customers as $key => $user) {
            if($user->orders->count() == 0){
                $customer = \App\User::findOrFail($user->id);
                $customer->status = 0;
                $customer->save();
            }
         }
          * 
          */
         $this->info('Demo:Cron Cummand Run successfully!');
          
    }

}
