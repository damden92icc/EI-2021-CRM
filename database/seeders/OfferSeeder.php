<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;


class OfferSeeder extends Seeder
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
                'label' => 'Offer Website Fimz',
                'reference' => 'A201545'
            ],
            [
                'label' => 'Offer Website XYZ',
                'reference' => 'A2015445'
            
            ],
            [
                'label' => 'Offer Website ATD',
                'reference' => 'B201545'
  
            ],
            [
                'label' => 'Offer website Aristo',
                'reference' => 'CA201545'
            ],
        ];

        $arrayFakeCOncernedClient = [ 2, 3, 4];

        $arrayFakeCompany = [ 2, 3, 4,5];
        foreach($offers as $data){
            DB::table('offers')->insert([
                'label' => $data['label'],
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",   
                'reference'=> $data['reference'],
                'sended_date'=>  Carbon::parse('2000-01-01') ,
                'offer_state'=> "IN PROGRESS",
                'offer_priority_state'=> "Low",
                'total_cost_ht'=> 200,
                'total_sell_ht'=> 1000,
                'validity_delay'=> 30,
                'due_date'=>  Carbon::parse('2000-01-01') ,
                'owner_id'=>1,
                'concerned_client' =>  Arr::random( $arrayFakeCOncernedClient),       
                'concerned_company' =>    Arr::random($arrayFakeCompany),       
            ]);
        }
    }
}
