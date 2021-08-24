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
                'name' => "SuperAdmin",
                'firstname' => "Damien",
                'email' => 'admin1@demo.com',
                'phone' => '0032-489373721',
                'mobile'=> '0032-489373721',
                'gdpr_valided' => true,
                'cgu_valided' => true,
                'user_state' => 'in progress',
                'role_id' => 2
            ],

            [
                'name' => "Client Test",
                'firstname' => "Julie",
                'email' => 'client1@demo.com',
                'phone' => '0032-489373721',
                'mobile'=> '0032-489373721',
                'gdpr_valided' => true,
                'cgu_valided' => true,
                'user_state' => 'in progress',
                'role_id' => 1
            ],

            [
                'name' => "Client Test",
                'firstname' => "Pierre",
                'email' => 'client2@demo.com',
                'phone' => '0032-489373721',
                'mobile'=> '0032-489373721',
                'gdpr_valided' => true,
                'cgu_valided' => true,
                'user_state' => 'in progress',
                'role_id' => 1
            ],

            [
                'name' => "Client Test",
                'firstname' => "Marie",
                'email' => 'client3@demo.com',
                'phone' => '0032-489373721',
                'mobile'=> '0032-489373721',
                'gdpr_valided' => true,
                'cgu_valided' => true,
                'user_state' => 'in progress',
                'role_id' => 1
            ],

            [
                'name' => "Client Test",
                'firstname' => "Julien",
                'email' => 'client4@demo.com',
                'phone' => '0032-489373721',
                'mobile'=> '0032-489373721',
                'gdpr_valided' => true,
                'cgu_valided' => true,
                'user_state' => 'in progress',
                'role_id' => 1
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
            'user_state' => $usr['user_state'],
            'role_id' => $usr['role_id'],
        ]);
    }
    }
}
