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
                'reference' => 'EDF695',
                'offer_state'=>  "ARCHIVED" ,
            ],
            [
                'label' => 'Offer Website XYZ',
                'reference' => 'A2015445',
                'offer_state'=>  "SENDED" ,
            
            ],
            [
                'label' => 'Offer Website ATD',
                'reference' => 'B201545',
                'offer_state'=>  "SENDED" ,
  
            ],
            [
                'label' => 'Offer website Aristo',
                'reference' => 'CAEZ201545',
                'offer_state'=>  "SENDED" ,
            ],
            [
                'label' => 'Offer website Fali',
                'reference' => 'CAZA201545',
                'offer_state'=>  "SENDED" ,
            ],

            [
                'label' => 'Offer hosting Kassan',
                'reference' => 'C7A20123R545',
                'offer_state'=>  "DRAFT" ,
            ],
            
            [
                'label' => 'Offer  Brussels Expo',
                'reference' => 'RE201545',
                'offer_state'=>  "ARCHIVED" ,
            ],

            [
                'label' => 'Offer website Champina',
                'reference' => 'GF2015AZADS45',
                'offer_state'=>  "ARCHIVED" ,
            ],

            [
                'label' => 'Offer website Proxanis',
                'reference' => 'FA20AZ1545',
                'offer_state'=>  "SENDED" ,
            ],


            [
                'label' => 'Offer  Ecommerce Expo',
                'reference' => 'RE296AEDS01545',
                'offer_state'=>  "SENDED" ,
            ],

            [
                'label' => 'Offer Pack Hosting',
                'reference' => 'GF2AED01545',
                'offer_state'=>  "DRAFT" ,
            ],

            [
                'label' => 'Offer Hosting Wordpress',
                'reference' => 'FAZ2EGNK01545',
                'offer_state'=>  "DRAFT" ,
            ],

            

            [
                'label' => 'Offer website Queeny',
                'reference' => 'FA208ZA51545',
                'offer_state'=>  "SENDED" ,
            ],


            [
                'label' => 'Offer  Singer Website',
                'reference' => 'RE2960AVSX1545',
                'offer_state'=>  "SENDED" ,
            ],

            [
                'label' => 'Offer Blog Influanca',
                'reference' => 'GF23ER01545',
                'offer_state'=>  "SENDED" ,
            ],

            [
                'label' => 'Offer Paradize Holliday ',
                'reference' => 'FAZ2019K6545',
                'offer_state'=>  "SENDED" ,
            ],
        ];

        $arrayFakeCOncernedClient = [ 2, 3];
      $arrayFakeCompany = [ 2, 3, 4,5];
        foreach($offers as $data){
            DB::table('offers')->insert([
                'label' => $data['label'],
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",   
                'reference'=> $data['reference'],
                'sended_date'=>  Carbon::parse('2021-08-01') ,
                'offer_state'=>  $data['offer_state'],
                'offer_priority_state'=> "Low",
                'total_cost_ht'=> 200,
                'total_sell_ht'=> 1000,
                'validity_delay'=> 30,
                'due_date'=>  Carbon::parse('2022-01-01') ,
                'owner_id'=>1,
                'created_at'=>  Carbon::now()->subdays(3),
                'concerned_client' =>  Arr::random( $arrayFakeCOncernedClient),       
                'concerned_company' =>    Arr::random($arrayFakeCompany),       
            ]);
        }
    }
}

