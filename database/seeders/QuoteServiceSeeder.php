<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class QuoteServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           // Service Seeder for Project 1
            
        $quoteSeeder = [    [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',    
            'quote_id' => 1,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'quote_id' => 1,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',      
            'quote_id' => 1,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',          
            'quote_id' => 1,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',           
            'quote_id' => 1,
       
        ],


        
          // Service Seeder for Project 2
        
          [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',          
            'quote_id' => 2,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',          
            'quote_id' => 2,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',         
            'quote_id' => 2,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',         
            'quote_id' => 2,
       
        ],

        [
            'service_id' => 9 , // Update website
            'quantity' => '5',           
            'quote_id' => 2,
       
        ],

          // Service Seeder for Project 3
       
        
          [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
           
            'quote_id' => 3,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',            
            'quote_id' => 3,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',            
            'quote_id' => 3,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',            
            'quote_id' => 3,
       
        ],

        [
            'service_id' => 10 , // Transfert to this company
            'quantity' => '5',           
            'quote_id' => 3,
       
        ],


        // Service Seeder for Project 4
        
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',           
            'quote_id' => 4,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',     
            'quote_id' => 4,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',           
            'quote_id' => 4,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'quote_id' => 4,
       
        ],

        // Service Seeder for Project 5
                    
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'quote_id' => 5,

        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',       
            'quote_id' => 5,

        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'quote_id' => 5,

        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'quote_id' => 5,

        ],
        
          // Service Seeder for Project 6
        
          [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'quote_id' => 6,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'quote_id' => 6,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'quote_id' => 6,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'quote_id' => 6,
        ],

        
          // Service Seeder for Project 7
        
          [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'quote_id' => 7,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'quote_id' => 7,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'quote_id' => 7,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'quote_id' => 7,
       
        ],

        [
            'service_id' => 9 , // Update website
            'quantity' => '5',
            'quote_id' => 7,
       
        ],

          // Service Seeder for Project 8
       
        
          [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'quote_id' => 8,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'quote_id' => 8,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'quote_id' => 8,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'quote_id' => 8,
       
        ],

        [
            'service_id' => 10 , // Transfert to this company
            'quantity' => '5',
            'quote_id' => 8,
       
        ],


        // Service Seeder for Project 9
        
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'quote_id' => 9,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'quote_id' => 9,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'quote_id' => 9,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'quote_id' => 9,
       
        ],

        // Service Seeder for Project 10
                    
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'quote_id' => 10,

        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'quote_id' => 10,

        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'quote_id' => 10,

        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'quote_id' => 10,

        ],


        // Service Seeder for Project 11
        
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'quote_id' => 11,
       
        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'quote_id' => 11,
       
        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'quote_id' => 11,
       
        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'quote_id' => 11,
       
        ],

        // Service Seeder for Project 12
                    
        [
            'service_id' => '1' , // Hosting  CMS Plateform 
            'quantity' => '1',
            'quote_id' => 12,

        ],

        [
            'service_id' => '4' , // DNS Name
            'quantity' => '1',
            'quote_id' => 12,

        ],

        [
            'service_id' => 5 , // DNS Name
            'quantity' => '5',
            'quote_id' => 12,

        ],

        [
            'service_id' => 8 , // Debugg website
            'quantity' => '5',
            'quote_id' => 12,

        ],
        
    ];


    foreach($quoteSeeder as $data){
        DB::table('quote_services')->insert([
            'quantity' => $data['quantity'],
            'service_id' =>  $data['service_id'] ,
            'quote_id'=>   $data['quote_id']          
        ]);
    }
    
}
}