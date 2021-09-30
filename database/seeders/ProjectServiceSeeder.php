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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
                'is_active' => 1,
                'service_state' => 'RUNNING',
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "MONTHLY" ,
                'project_id' => 7,
           
            ],

            [
                'service_id' => 8 , // Debugg website
                'quantity' => '5',
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 250, 
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "MONTHLY" ,
                'project_id' => 8,
           
            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40,
                'start_date' => Carbon::parse('2021-01-01'),  
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "MONTHLY" ,
                'project_id' => 9,
           
            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'start_date' => Carbon::parse('2021-01-01'), 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "MONTHLY" ,
                'project_id' => 9,
           
            ],

            [
                'service_id' => 5 , // DNS Name
                'quantity' => '5',
                'unit_cost_ht' => 4, 
                'unit_sell_ht' => 9, 
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2020-09-01'), 
                'is_active' => 1,
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY',
                'recurrency_payement' => "MONTHLY" ,
                'project_id' => 10,

            ],

            [
                'service_id' => '4' , // DNS Name
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 40, 
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2020-09-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2020-09-01'), 
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
                'start_date' => Carbon::parse('2021-01-01'), 
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
                'start_date' => Carbon::parse('2020-09-01'), 
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
                'start_date' => Carbon::parse('2020-09-01'), 
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
                'unit_sell_ht' => 15, 
                'start_date' => Carbon::parse('2020-09-01'), 
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
                'start_date' => Carbon::parse('2021-09-01'), 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'payement_state' => 'PAY',
                'recurrency_payement' => "NONE" ,
                'project_id' => 12,

            ],
        ];

      
        foreach($projects as $data){

            $currentDate = Carbon::now();

            // Calcul next Pay date based on the start date and reccurency of payement
            $npd = Carbon::parse($data['start_date']);

        
            switch ($data['recurrency_payement'] ) {
                case "YEARLY":
                    $data['next_payement_date'] =      $npd->addYear();

                    break;
                case "MONTHLY":
                    $data['next_payement_date'] = $npd->addMonth();
                    break;
                case "HALF-YEARLY":
                    $data['next_payement_date'] = $npd->addMonth();
                    break;
                case "NONE":
                    $npd = null;
                    break;
                default:
                $npd  =    null;
                    break;                
            }

            // Check delay between start date and current date 
            $delayBeforeNPD =  $currentDate->diffInDays(    $npd ); 

            // Set value of billable service (1 - 0   ) 
            // Set 1 only for billable and reccurent service 

                if(  $delayBeforeNPD < 30 && $delayBeforeNPD != null){
                    $data[  'is_billable' ] = 1;
                   }

                else{
                    $data[  'is_billable' ] = 0;
                }

            
            DB::table('project_services')->insert([
                'quantity' => $data['quantity'],
                'unit_cost_ht' => $data['unit_cost_ht'],
                'unit_sell_ht' => $data['unit_sell_ht'],
                'is_active' =>  $data['is_active'],
                'service_state' => $data['service_state'] ,
                'start_date' => $data['start_date'] ,
                'last_payement_date' =>null,
                'payement_state' =>    $data['payement_state'] ,
                'recurrency_payement' => $data['recurrency_payement'] ,
                'next_payement_date' => $npd,
                'is_billable' =>  $data[  'is_billable' ] ,               
                'is_pay' => 1,
                'service_id' =>  $data['service_id'] ,
                'project_id'=>   $data['project_id']          
            ]);
        }
    }
}
