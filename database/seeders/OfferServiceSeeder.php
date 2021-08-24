<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
class OfferServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offers = [
            [
                'quantity' => '1',
           
            ],

            [
                'quantity' => '1',
           
            ],

            [
                'quantity' => '1',
           
            ],

            [
                'quantity' => '1',
           
            ],

            [
                'quantity' => '1',
           
            ],

            [
                'quantity' => '1',
           
            ],
          
        ];

        $arrayFakeOffer = [ 2, 3, 4, 5];
        $arrayFakeService = [ 2, 3, 4, 5];
        foreach($offers as $data){
            DB::table('offer_services')->insert([
                'quantity' => $data['quantity'],
                'unit_cost_ht' => 100, 
                'unit_sell_ht' => 200, 
                'service_id' => Arr::random($arrayFakeService) , 
                'offer_id'=>          Arr::random($arrayFakeOffer),    
            ]);
        }
    }
}
