<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $seederDatas = [
     
            // Super admin
            [
                'user_id' => 1 ,// Damien super Admin
                'company_id' => 1, // main company
                'role_id' => 2,
            ],

            // Client 1
            [
                'user_id' => 2 ,// Client 1
                'company_id' => 2, // x company
                'role_id' => 1,
            ],

            // Client 1
            [
                'user_id' =>  2,// Client 1
                'company_id' => 3, // x company
                'role_id' => 1,
            ],
   
            // Client 1
            [
                'user_id' =>  2,// Client 1
                'company_id' => 4, // x company
                'role_id' => 1,
            ],

            // Client 4
            [
                'user_id' =>  4,// Damien super Admin
                'company_id' => 3, // x company
                'role_id' => 1,
            ],


            // Client 5
            [
                'user_id' =>  5,// Damien super Admin
                'company_id' => 4, // x company
                'role_id' => 1,
            ]
        ];


        foreach($seederDatas as $data){
            DB::table('employes')->insert([
                'user_id' => $data['user_id'],
                'company_id' => $data['company_id'],              
               
            ]);
        }
    }
}
