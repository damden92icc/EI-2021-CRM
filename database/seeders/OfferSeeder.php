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

        /**
         * Seeder offer for Client Julie 1 
         */

        $clienID = 2;
        $workingFor = [2,3] ; 

        $offers = [
            [
                'label' => 'Offer new website ELM-Agency',
                'description' => 'Offer details about ELM Agency service requierements in orderto deploy a new website in the cloud',
                'reference' => 'O2-OCT-2021-001',
                'offer_state'=>  "ARCHIVED" ,
                'total_cost_ht'=> 52,
                'total_sell_ht'=> 1570,
            ],
            [
                'label' => 'Offer new design  Immo website',
                'description' => ' New design for the website Immo Agency, based on color red , mobile friendly and quote form simple design to ask quote ',
                'reference' => 'O2-OCT-2021-002',
                'offer_state'=>  "SENT" ,
                'total_cost_ht'=> 0,
                'total_sell_ht'=> 400,
            
            ],
            [
                'label' => 'Offer Bati-shop website',
                'description' => 'New offer relative to a new e-commerce website for Batishop. The offer include sketching, developpement and hosting solution to deploy it as soon is possible .',
                'reference' => 'O2-OCT-2021-003',
                'offer_state'=>  "SENT" ,
                'total_cost_ht'=> 20,
                'total_sell_ht'=> 2030,
  
            ],
            [
                'label' => 'Offer website Aristo Painting',
                'description' => 'Developpement and creationdesign of the website Aristo Painting, this offer is based on all standard requierement to deploy the website in the cloud',
                'reference' => 'O2-OCT-2021-004',
                'offer_state'=>  "SENT" ,
                'total_cost_ht'=> 30,
                'total_sell_ht'=> 1775,
            ],
            [
                'label' => 'Offer Transfert website Cameleo',
                'description' => 'Transfert the wordpress website Camaelo from this unknow provider to this company. The website will need an SSL certificate but the DNS will be keep by the client',
                'reference' => 'O2-OCT-2021-005',
                'offer_state'=>  "SENT" ,
                'total_cost_ht'=> 15,
                'total_sell_ht'=> 190,
            ],

            [
                // 6
                'label' => 'Offer Hosting e-commerce DesignSX',
                'description' => 'Offer to host an existing e-commerce plateform using prestashop. This plateform need an additional SSL certificate ',
                'reference' => 'O2-OCT-2021-006',
                'offer_state'=>  "DRAFT" ,
                'total_cost_ht'=> 20,
                'total_sell_ht'=> 210,
            ],

            [
                'label' => ' new website Peach Ecommerce ',
                'description' => 'Offer concern the creation of the new e-shop for Peach Company. The website sell fresh product witth ecolabel. The owner need 3 email adresses to manage their business.',
                'reference' => 'O2-OCT-2021-007',
                'offer_state'=>  "DRAFT" ,
                'total_cost_ht'=> 40,
                'total_sell_ht'=> 265,
            ],

            [
                'label' => 'Offer new e-commerce ParkingLot',
                'description' => 'Creation of new e-commerce website based on provided design. The offer include de developpement and the solutions to deploy it on the cloud', 
                'reference' => 'O2-OCT-2021-008',
                'offer_state'=>  "DRAFT" ,
                'total_cost_ht'=> 35,
                'total_sell_ht'=> 235,
            ],

        ];

        foreach($offers as $data){
            DB::table('offers')->insert([
                'label' => $data['label'],
                'description' => $data['description'],
                'reference'=> $data['reference'],
                'sended_date'=>  Carbon::parse('2021-08-01') ,
                'offer_state'=>  $data['offer_state'],
                'offer_priority_state'=> "Low",
                'total_cost_ht'=>  $data['total_cost_ht'],
                'total_sell_ht'=>  $data['total_sell_ht'],
                'validity_delay'=> 30,
                'due_date'=>  Carbon::parse('2022-01-01') ,
                'owner_id'=>1,
                'created_at'=>  Carbon::now()->subdays(3),
                'concerned_client' =>   $clienID ,       
                'concerned_company' =>    Arr::random($workingFor),       
            ]);
        }


        /**
         * Seeder offer for client  Pierre
         */

        $clienID = 3;
        $workingFor = [4,5] ; 

        $offers = [

                [
                    'label' => 'Offer new design Snacky-XL company',
                    'description' => 'New design for the purpose of a proposition of developpement in the futur. The offer include the sketching of the website in mobile and PC version', 
                    'reference' => '03-OCT-2021-001',
                    'offer_state'=>  "DRAFT" ,
                    'total_cost_ht'=> 0,
                    'total_sell_ht'=> 400,
                ],

                [
                    'label' => 'Offer creation E-shop Clothilde shopping',
                    'description' => 'Creation and developpemet of all design and implementation in order to run a new website in the cloud. This website will need an additional security provide by SSL', 
                    'reference' => 'O3-OCT-2021-002',
                    'offer_state'=>  "DRAFT" ,
                    'total_cost_ht'=> 30,
                    'total_sell_ht'=> 635,
                ],

            ];


        foreach($offers as $data){
            DB::table('offers')->insert([
                'label' => $data['label'],
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",   
                'reference'=> $data['reference'],
                'sended_date'=>  Carbon::parse('2021-08-01') ,
                'offer_state'=>  $data['offer_state'],
                'offer_priority_state'=> "Low",
                'total_cost_ht'=>  $data['total_cost_ht'],
                'total_sell_ht'=>  $data['total_sell_ht'],
                'validity_delay'=> 30,
                'due_date'=>  Carbon::parse('2022-01-01') ,
                'owner_id'=>1,
                'created_at'=>  Carbon::now()->subdays(3),
                'concerned_client' =>   $clienID ,       
                'concerned_company' =>    Arr::random($workingFor),       
            ]);
        }

    }
}

