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
          
        // Service Seeder for Quote 1 - New website Paul&Co
       
        $quoteID = 1;
        $quoteDatas = [
            [
                'service_id' => 1,
                'quantity' => 1
            ],
            [
                'service_id' => 3,
                'quantity' => 1
            ],
            [
                'service_id' => 4,
                'quantity' => 1
            ],
            [
                'service_id' => 6,
                'quantity' => 1
            ]
        ];           

        foreach($quoteDatas as $data){
            DB::table('quote_services')->insert([
                'quantity' => $data['quantity'],
                'service_id' =>  $data['service_id'] ,
                'quote_id'=>   $quoteID,       
            ]);
        }
    
        // Service Seeder for Quote 2 - Online coffee shop

        $quoteID = 2;
        $quoteDatas = [
            [
                'service_id' => 1,
                'quantity' => 1
            ],
            [
                'service_id' => 4,
                'quantity' => 1
            ],
            [
                'service_id' => 6,
                'quantity' => 1
            ]
        ];           

        foreach($quoteDatas as $data){
            DB::table('quote_services')->insert([
                'quantity' => $data['quantity'],
                'service_id' =>  $data['service_id'] ,
                'quote_id'=>   $quoteID,       
            ]);
        }

        // Service Seeder for Quote 3 - Transfert and upgrade Pizza-shopa'

        $quoteID = 3;
        $quoteDatas = [
            [
                'service_id' => 11,
                'quantity' => 1
            ],
            [
                'service_id' => 5,
                'quantity' => 1
            ],
            [
                'service_id' => 12,
                'quantity' => 1
            ],
            [
                'service_id' => 6,
                'quantity' => 1
            ]
        ];           

        foreach($quoteDatas as $data){
            DB::table('quote_services')->insert([
                'quantity' => $data['quantity'],
                'service_id' =>  $data['service_id'] ,
                'quote_id'=>   $quoteID,       
            ]);
        }

           // Service Seeder for Quote 4 - New website templated for terence-view 

           $quoteID = 4;
           $quoteDatas = [
               [
                   'service_id' => 3,
                   'quantity' => 1
               ],

           ];           
   
           foreach($quoteDatas as $data){
               DB::table('quote_services')->insert([
                   'quantity' => $data['quantity'],
                   'service_id' =>  $data['service_id'] ,
                   'quote_id'=>   $quoteID,       
               ]);
           }

           // Service Seeder for Quote 5 - New wordpress for sunny.be '

           $quoteID = 5;
           $quoteDatas = [
                [
                    'service_id' => 4,
                    'quantity' => 1
                ],  
                [
                    'service_id' => 6,
                    'quantity' => 1
                ],          
                [
                    'service_id' => 12,
                    'quantity' => 1
                ],
                [
                    'service_id' => 10,
                    'quantity' => 1
                ],

           ];           
   
           foreach($quoteDatas as $data){
               DB::table('quote_services')->insert([
                   'quantity' => $data['quantity'],
                   'service_id' =>  $data['service_id'] ,
                   'quote_id'=>   $quoteID,       
               ]);
           }


           // Service Seeder for Quote 6 - Ecommerce website for Calton Hotel

           $quoteID = 6;
           $quoteDatas = [
                [
                    'service_id' => 5,
                    'quantity' => 1
                ],  
                [
                    'service_id' => 11,
                    'quantity' => 1
                ],          
                [
                    'service_id' => 12,
                    'quantity' => 1
                ],

           ];           
   
           foreach($quoteDatas as $data){
               DB::table('quote_services')->insert([
                   'quantity' => $data['quantity'],
                   'service_id' =>  $data['service_id'] ,
                   'quote_id'=>   $quoteID,       
               ]);
           }



           // Client 2

            // Service Seeder for Quote 7 - New design for futur website

            $quoteID = 7;
            $quoteDatas = [
                [
                    'service_id' => 3,
                    'quantity' => 1
                ],  

            ];           
    
            foreach($quoteDatas as $data){
                DB::table('quote_services')->insert([
                    'quantity' => $data['quantity'],
                    'service_id' =>  $data['service_id'] ,
                    'quote_id'=>   $quoteID,       
                ]);
            }

            // Service Seeder for Quote 8 - Transfert into a performante plateform

            $quoteID = 8;
            $quoteDatas = [
                [
                    'service_id' => 4,
                    'quantity' => 1
                ],  
                [
                    'service_id' => 11,
                    'quantity' => 1
                ],  
                [
                    'service_id' => 12,
                    'quantity' => 1
                ],  
            ];           
    
            foreach($quoteDatas as $data){
                DB::table('quote_services')->insert([
                    'quantity' => $data['quantity'],
                    'service_id' =>  $data['service_id'] ,
                    'quote_id'=>   $quoteID,       
                ]);
            }
    
            // Service Seeder for Quote 9 - New website presentation H&L ice

            $quoteID = 9;
            $quoteDatas = [
                [
                    'service_id' => 1,
                    'quantity' => 1
                ],  
                [
                    'service_id' => 3,
                    'quantity' => 1
                ],  
                [
                    'service_id' => 4,
                    'quantity' => 1
                ],  
                [
                    'service_id' => 6,
                    'quantity' => 1
                ],  

            ];           
    
            foreach($quoteDatas as $data){
                DB::table('quote_services')->insert([
                    'quantity' => $data['quantity'],
                    'service_id' =>  $data['service_id'] ,
                    'quote_id'=>   $quoteID,       
                ]);
            }
    
}
}