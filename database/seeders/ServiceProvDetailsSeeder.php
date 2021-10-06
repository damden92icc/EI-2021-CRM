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


        $arrayFakeReccurency = [ 2, 3, 4, 5];
      
        $arrayFakeProvider = [ 1,2, 3, 4, 5];
        $arrayFakeService = [ 2, 3, 4, 5];
        
        
        // foreach($servicesProv as $data){
        //     DB::table('service_prov_details')->insert([
        //         'spd_unit_cost_ht' => 100,                
        //         'spd_is_active' => 1,
        //         'spd_start_date' => Carbon::parse('2000-01-01'),
        //         'spd_recurrency_payement' => Arr::random($arrayFakeReccurency) ,
        //         'spd_last_payement_date' =>null,
        //         'spd_is_pay' => 1,
        //         'spd_service_state' => $data['service_state'] ,                  
        //         'spd_payement_state' =>    $data['payement_state'] ,          
        //         'ps_id' => Arr::random($arrayFakeService) , 
        //         'provider_id'=>          Arr::random($arrayFakeProvider),    
        //     ]);
        // }
    }
}
