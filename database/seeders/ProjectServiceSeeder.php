<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class ProjectServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            
            // Service Seeder for Project 1
            
            [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 1,
           
            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 1,
           
            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 1,
           
            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => false,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => null ,
                'project_id' => 1,
           
            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 1,
                'service_state' => 'ACTIVE',
                'payement_state' => 'PAY',
                'recurrency_payement' => null ,
                'project_id' => 1,
           
            ],


            
              // Service Seeder for Project 2
            
              [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 2,
           
            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 2,
           
            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 2,
           
            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 2,
           
            ],

            [
                'service_id' => 9 , // Update website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 2,
           
            ],

              // Service Seeder for Project 3
           
            
              [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 3,
           
            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 3,
           
            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 3,
           
            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 3,
           
            ],

            [
                'service_id' => 10 , // Transfert to this company
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 3,
           
            ],


            // Service Seeder for Project 4
            
            [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 4,
           
            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 4,
           
            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 4,
           
            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 4,
           
            ],

            // Service Seeder for Project 5
                        
            [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 5,

            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 5,

            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 5,

            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 5,

            ],
            
              // Service Seeder for Project 6
            
              [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 6,
           
            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 6,
           
            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 6,
           
            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 6,
           
            ],

            
              // Service Seeder for Project 7
            
              [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 7,
           
            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 7,
           
            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 7,
           
            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 7,
           
            ],

            [
                'service_id' => 9 , // Update website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 7,
           
            ],

              // Service Seeder for Project 8
           
            
              [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 8,
           
            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 8,
           
            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 8,
           
            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 8,
           
            ],

            [
                'service_id' => 10 , // Transfert to this company
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 8,
           
            ],


            // Service Seeder for Project 9
            
            [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 9,
           
            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 9,
           
            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 9,
           
            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 9,
           
            ],

            // Service Seeder for Project 10
                        
            [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 10,

            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 10,

            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 10,

            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 10,

            ],


            // Service Seeder for Project 11
            
            [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 11,
           
            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 11,
           
            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 11,
           
            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 11,
           
            ],

            // Service Seeder for Project 12
                        
            [
                'service_id' => '1' , // Hosting  CMS Plateform 
                'quantity' => '1',
                'unit_cost_ht' => 30, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 12,

            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 12,

            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "YEARLY" ,
                'project_id' => 12,

            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 12,

            ],
        ];

      
        foreach($projects as $data){
            DB::table('project_services')->insert([
                'quantity' => $data['quantity'],
                'unit_cost_ht' => $data['unit_cost_ht'],
                'unit_sell_ht' => $data['unit_sell_ht'],
                'is_active' =>  $data['is_active'],
                'service_state' => $data['service_state'] ,
                'start_date' => Carbon::parse('2021-01-01'),
                'last_payement_date' => Carbon::parse('2021-01-01'),
                'payement_state' =>    $data['payement_state'] ,
                'recurrency_payement' => $data['recurrency_payement'] ,
                'next_payement_date' => Carbon::parse('2001-01-01'),
                'is_billable' => 0,               
                'is_pay' => 1,
                'service_id' =>  $data['service_id'] ,
                'project_id'=>   $data['project_id']          
            ]);
        }
    }
}
