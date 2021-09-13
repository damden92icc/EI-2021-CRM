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
        // Service Seeder for Project 1
            
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 1,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 1,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 1,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 1,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 1,
       
        ],


        
          // Service Seeder for Project 2
        
          [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 2,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 2,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 2,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 2,
       
        ],

        [
            'service_id' => 9 , // Update website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 2,
       
        ],

          // Service Seeder for Project 3
       
        
          [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 3,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 3,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 3,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 3,
       
        ],

        [
            'service_id' => 10 , // Transfert to this company
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 3,
       
        ],


        // Service Seeder for Project 4
        
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 4,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 4,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 4,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 4,
       
        ],

        // Service Seeder for Project 5
                    
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 5,

        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 5,

        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 5,

        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 5,

        ],
        
          // Service Seeder for Project 6
        
          [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 6,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 6,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 6,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 6,
       
        ],

        
          // Service Seeder for Project 7
        
          [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 7,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 7,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 7,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 7,
       
        ],

        [
            'service_id' => 9 , // Update website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 7,
       
        ],

          // Service Seeder for Project 8
       
        
          [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 8,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 8,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 8,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 8,
       
        ],

        [
            'service_id' => 10 , // Transfert to this company
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 8,
       
        ],


        // Service Seeder for Project 9
        
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 9,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 9,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 9,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 9,
       
        ],

        // Service Seeder for Project 10
                    
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 10,

        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 10,

        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 10,

        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 10,

        ],


        // Service Seeder for Project 11
        
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 11,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 11,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 11,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 11,
       
        ],

        // Service Seeder for Project 12
                    
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 200, 
            'offer_id' => 12,

        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'unit_cost_ht' => 20, 
            'unit_sell_ht' => 40, 
            'offer_id' => 12,

        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'unit_cost_ht' => 4, 
            'unit_sell_ht' => 9, 
            'offer_id' => 12,

        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'unit_cost_ht' => 100, 
            'unit_sell_ht' => 250, 
            'offer_id' => 12,

        ],
    ];

        foreach($offers as $data){
            DB::table('offer_services')->insert([
                'quantity' => $data['quantity'],
                'unit_cost_ht' =>  $data['unit_cost_ht'],
                'unit_sell_ht' => $data['unit_sell_ht'],
                'service_id' => $data['service_id'],
                'offer_id'=>       $data['offer_id'],
            ]);
        }
    }
}
