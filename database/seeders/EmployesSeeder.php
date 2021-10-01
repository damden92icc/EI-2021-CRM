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
     
            // admin 
            [
                'user_id' => 1 ,// Damien  - Manager
                'company_id' => 1, // main company
            ],

            // Client 1 - company 2 
            [
                'user_id' => 2 ,// Client 1 - Julie
                'company_id' => 2, // x company
            ],

              // Client 1 - company 3
            [
                'user_id' =>  2,// Client 1 Julie
                'company_id' => 3, // x company
            ],
   
            // Client 2 - company 4 
            [
                'user_id' => 3 ,// Client 2- Pierre
                'company_id' => 2, // x company
            ],

            // Client 2 - company 5
            [
                'user_id' =>  3,// Client 2 Pierre
                'company_id' => 3, // x company
            ],

            // Manager  
            [
                'user_id' =>  4,// Damien Manager
                'company_id' => 1, // x company
            ],
            

            // Accountant
            [
                'user_id' =>  5,// Damien super Admin
                'company_id' => 1, // x company
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
