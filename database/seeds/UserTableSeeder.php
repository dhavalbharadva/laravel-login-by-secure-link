<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->delete();
        $admin = array(
            array(
                'firstname' => 'Dhaval',
                'lastname' => 'Bharadva',
                'email' => 'info@dhavalbharadva.com',
                'password' => Hash::make('admin123'),
                'remember_token' => Str::random(50),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            )
        );

        DB::table('users')->insert($admin);
    }
}
