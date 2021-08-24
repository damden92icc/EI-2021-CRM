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
            [
                'quantity' => '1',
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY'
            ],

            [
                'quantity' => '2',
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY'
           
            ],

            [
                'quantity' => '3',
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY'
           
            ],

            [
                'quantity' => '1',
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY'
           
            ],

            [
                'quantity' => '1',
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY'
           
            ],

            [
                'quantity' => '1',
                'service_state' => 'RUNNING',
                'payement_state' => 'PAY'
           
            ],
          
        ];

      
      
        $arrayFakeProject = [ 2, 3, 4, 5];
        $arrayFakeService = [ 2, 3, 4, 5];
        foreach($projects as $data){
            DB::table('project_services')->insert([
                'quantity' => $data['quantity'],
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 200, 
                'is_active' => 1,
                'service_state' => $data['service_state'] ,
                'start_date' => Carbon::parse('2000-01-01'),
                'last_payement_date' =>Carbon::parse('2000-01-01'),
                'payement_state' =>    $data['payement_state'] ,
                'recurrency_payement' => "YEARLY" ,
                'next_payement_date' => Carbon::parse('2001-01-01'),
                'is_billable' => 0,
               
                'is_pay' => 1,
                'service_id' => Arr::random($arrayFakeService) , 
                'project_id'=>          Arr::random($arrayFakeProject),    
            ]);
        }
    }
}
