<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class ServiceProvDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $servicesProv = [


            // Project 1 
            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    8, // OVH
                'ps_id' =>  4,  // Project 1 S4               
            ],

            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    9, // Namecheap
                'ps_id' =>  5,  // Project 1 S 5          
            ],
          

            //Project 2 

            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    8, // OVH
                'ps_id' =>  9,  // Project 1 S4               
            ],

            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    9, // Namecheap
                'ps_id' =>  10,  // Project 1 S 5          
            ],

            //Project  3

            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    8, // OVH
                'ps_id' =>  14,  // Project 1 S4               
            ],

            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    9, // Namecheap
                'ps_id' =>  15,  // Project 1 S 5          
            ],

            //Project  4

            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    8, // OVH
                'ps_id' =>  16,  // Project 1 S4               
            ],

            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    9, // Namecheap
                'ps_id' =>  17,  // Project 1 S 5          
            ],      
            
            //Project  5

            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    8, // OVH
                'ps_id' =>  18,  // Project 1 S4               
            ],

            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    9, // Namecheap
                'ps_id' =>  19,  // Project 1 S 5          
            ],  

            //Project  6

            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    8, // OVH
                'ps_id' =>  20,  // Project 1 S4               
            ],

            [
                'spd_unit_cost_ht' => 3,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    8, // OVH - mail
                'ps_id' =>  21,  // Project 1 S4               
            ],

            [
                'spd_unit_cost_ht' => 15,                
                'spd_is_active' => 1,
                'spd_start_date' =>Carbon::now()->subDays(80),
                'spd_recurrency_payement' => "YEARLY" ,
                'spd_last_payement_date' =>null,
                'spd_is_pay' => 1,
                'spd_service_state' => "RUNNING",                  
                'spd_payement_state' =>    "PAYED" ,   
                'provider_id'=>    9, // Namecheap
                'ps_id' =>  22,  // Project 1 S 5          
            ],             
        ];



        
        foreach($servicesProv as $data){
            DB::table('service_prov_details')->insert([
                'spd_unit_cost_ht' => $data['spd_unit_cost_ht'] ,            
                'spd_is_active' => $data['spd_is_active'] ,   
                'spd_start_date' => Carbon::parse($data['spd_start_date']) ,   
                'spd_recurrency_payement' => $data['spd_recurrency_payement'] ,   
                'spd_last_payement_date' => $data['spd_last_payement_date'] ,   
                'spd_is_pay' => $data['spd_is_pay'] ,   
                'spd_service_state' => $data['spd_service_state'] ,                
                'spd_payement_state' =>    $data['spd_payement_state'] ,     
                'ps_id' => $data['ps_id'] ,   
                'provider_id'=>         $data['provider_id'] ,   
            ]);
        }
    }
}
