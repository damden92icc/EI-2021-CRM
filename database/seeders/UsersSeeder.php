<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allUsers=
        [
            [
                'name' => "Manager Dams",
                'firstname' => "Damien",
                'email' => 'manager1@demo.com',
                'phone' => '0032-489373721',
                'mobile'=> '0032-489373721',
                'gdpr_valided' => true,
                'cgu_valided' => true,
                'role_id' => 2
            ],

            [
                'name' => "Client Julie",
                'firstname' => "Julie",
                'email' => 'client1@demo.com',
                'phone' => '0032-489373721',
                'mobile'=> '0032-489373721',
                'gdpr_valided' => true,
                'cgu_valided' => true,
                'role_id' => 1
            ],

            [
                'name' => "Client Pierre",
                'firstname' => "Pierre",
                'email' => 'client2@demo.com',
                'phone' => '0032-489373721',
                'mobile'=> '0032-489373721',
                'gdpr_valided' => true,
                'cgu_valided' => true,
                'role_id' => 1
            ],

            
     
            [
                'name' => "Admin Julien",
                'firstname' => "Julien",
            
                'email' => 'admin1@demo.com',
                'phone' => '0032-489373721',
                'mobile'=> '0032-489373721',
                'gdpr_valided' => true,
                'cgu_valided' => true,
                'role_id' => 3
            ],

            [
                'name' => "Accountant Michel",
                'firstname' => "Julien",
                'email' => 'accountant1@demo.com',
                'phone' => '0032-489373721',
                'mobile'=> '0032-489373721',
                'gdpr_valided' => true,
                'cgu_valided' => true,
                'role_id' => 4
            ],
        ];


    foreach($allUsers as $usr){
        DB::table('users')->insert([
            'name' => $usr['name'],
            'firstname'=> $usr['firstname'],
            'email' =>$usr['email'],
            'password' =>  Hash::make('password'),
            'phone' => $usr['phone'],
            'mobile'=> $usr['mobile'],
            'gdpr_valided' => $usr['gdpr_valided'],
            'cgu_valided' => $usr['cgu_valided'],
            'user_state' => 'ACTIVE',
            'role_id' => $usr['role_id'],
        ]);
    }
    }
}
