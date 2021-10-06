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


        // Service Seeder for Offer 1 
        $offerID = 1;
        $offerData = [   
            
        [
            'service_id' => 1, 
            'quantity' => '1',
            'unit_cost_ht' => 0, 
            'unit_sell_ht' => 1000,        
        ],
        [
            'service_id' => 3, 
            'quantity' => 1,
            'unit_cost_ht' => 0, 
            'unit_sell_ht' => 400,        
        ],
        
        [
            'service_id' => 4, 
            'quantity' => 1,
            'unit_cost_ht' => 30, 
            'unit_sell_ht' => 120,        
        ],

        [
            'service_id' => 6, 
            'quantity' => 1,
            'unit_cost_ht' =>12, 
            'unit_sell_ht' => 20,        
        ],     
        [
            'service_id' => 12, 
            'quantity' => 1,
            'unit_cost_ht' =>10, 
            'unit_sell_ht' => 30,        
        ],         
    ];

        foreach($offerData as $data){
            DB::table('offer_services')->insert([
                'quantity' => $data['quantity'],
                'unit_cost_ht' =>  $data['unit_cost_ht'],
                'unit_sell_ht' => $data['unit_sell_ht'],
                'service_id' => $data['service_id'],
                'offer_id'=>   $offerID,
            ]);
        }
    


        // Service Seeder for Offer 2
        $offerID = 2;
        $offerData = [   
            
        [
            'service_id' => 3, 
            'quantity' => 1,
            'unit_cost_ht' => 0, 
            'unit_sell_ht' => 400,        
        ],
     
        ];

        foreach($offerData as $data){
            DB::table('offer_services')->insert([
                'quantity' => $data['quantity'],
                'unit_cost_ht' =>  $data['unit_cost_ht'],
                'unit_sell_ht' => $data['unit_sell_ht'],
                'service_id' => $data['service_id'],
                'offer_id'=>   $offerID,
            ]);
        }

        // Service Seeder for Offer 3
        $offerID = 3;
        $offerData = [   
            
            [
                'service_id' => 1, 
                'quantity' => 1,
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 1400,        
            ],

            [
                'service_id' => 3, 
                'quantity' => 1,
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 400,        
            ],

            [
                'service_id' => 5, 
                'quantity' => 1,
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 150,        
            ],

            [
                'service_id' => 6, 
                'quantity' => 1,
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 20,        
            ],

            [
                'service_id' => 13, 
                'quantity' => 1,
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 60,        
            ],

        ];

        foreach($offerData as $data){
            DB::table('offer_services')->insert([
                'quantity' => $data['quantity'],
                'unit_cost_ht' =>  $data['unit_cost_ht'],
                'unit_sell_ht' => $data['unit_sell_ht'],
                'service_id' => $data['service_id'],
                'offer_id'=>   $offerID,
            ]);
        }

        // Service Seeder for Offer 4
        $offerID = 4;
        $offerData = [   
            [
                'service_id' => 1, 
                'quantity' => 1,
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 1200,        
            ],
            [
                'service_id' => 3, 
                'quantity' => 1,
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 400,        
            ],
    
            [
                'service_id' => 4, 
                'quantity' => 1,
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 120,        
            ],

            [
                'service_id' => 6,  // DNS
                'quantity' => 1,
                'unit_cost_ht' => 15, 
                'unit_sell_ht' => 25,        
            ],
            [
                'service_id' => 12,  // SSL standard
                'quantity' => 1,
                'unit_cost_ht' => 15, 
                'unit_sell_ht' => 30,        
            ],
        ];

        foreach($offerData as $data){
            DB::table('offer_services')->insert([
                'quantity' => $data['quantity'],
                'unit_cost_ht' =>  $data['unit_cost_ht'],
                'unit_sell_ht' => $data['unit_sell_ht'],
                'service_id' => $data['service_id'],
                'offer_id'=>   $offerID,
            ]);
        }


        // Service Seeder for Offer 5
        $offerID = 5;
        $offerData = [   
            [
                'service_id' => 11, // transfert web to this company
                'quantity' => 1,
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 60,        
            ],
            [
                'service_id' => 4, // Hosting CMS 
                'quantity' => 1,
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 100,        
            ],
            [
                'service_id' => 12,  // SSL standard
                'quantity' => 1,
                'unit_cost_ht' => 15, 
                'unit_sell_ht' => 30,        
            ],
     
        ];

        foreach($offerData as $data){
            DB::table('offer_services')->insert([
                'quantity' => $data['quantity'],
                'unit_cost_ht' =>  $data['unit_cost_ht'],
                'unit_sell_ht' => $data['unit_sell_ht'],
                'service_id' => $data['service_id'],
                'offer_id'=>   $offerID,
            ]);
        }

            // Service Seeder for Offer 6
            $offerID = 6;
            $offerData = [   
                [
                    'service_id' => 11, // transfert web to this company
                    'quantity' => 1,
                    'unit_cost_ht' => 0, 
                    'unit_sell_ht' => 60,        
                ],
                [
                    'service_id' => 45, // Hosting  ecomm
                    'quantity' => 1,
                    'unit_cost_ht' => 0, 
                    'unit_sell_ht' => 100,        
                ],
                [
                    'service_id' => 13,  // SSL ecomm
                    'quantity' => 1,
                    'unit_cost_ht' => 20, 
                    'unit_sell_ht' => 50,        
                ],
         
            ];
    
            foreach($offerData as $data){
                DB::table('offer_services')->insert([
                    'quantity' => $data['quantity'],
                    'unit_cost_ht' =>  $data['unit_cost_ht'],
                    'unit_sell_ht' => $data['unit_sell_ht'],
                    'service_id' => $data['service_id'],
                    'offer_id'=>   $offerID,
                ]);
            }


            // Service Seeder for Offer 7
            $offerID = 7;
            $offerData = [   
                [
                    'service_id' => 1, // Website Creation
                    'quantity' => 1,
                    'unit_cost_ht' => 0, 
                    'unit_sell_ht' => 60,        
                ],
                [
                    'service_id' => 45, // Hosting  ecomm
                    'quantity' => 1,
                    'unit_cost_ht' => 0, 
                    'unit_sell_ht' => 100,        
                ],
                [
                    'service_id' => 13,  // SSL ecomm
                    'quantity' => 1,
                    'unit_cost_ht' => 20, 
                    'unit_sell_ht' => 50,        
                ],
                [
                    'service_id' => 7,  // email add
                    'quantity' => 3,
                    'unit_cost_ht' => 5, 
                    'unit_sell_ht' => 10,        
                ],
                [
                    'service_id' => 6,  // DNS
                    'quantity' => 1,
                    'unit_cost_ht' => 15, 
                    'unit_sell_ht' => 25,        
                ],
            ];
    
            foreach($offerData as $data){
                DB::table('offer_services')->insert([
                    'quantity' => $data['quantity'],
                    'unit_cost_ht' =>  $data['unit_cost_ht'],
                    'unit_sell_ht' => $data['unit_sell_ht'],
                    'service_id' => $data['service_id'],
                    'offer_id'=>   $offerID,
                ]);
            }

             // Service Seeder for Offer 8
             $offerID = 8;
             $offerData = [   
                 [
                     'service_id' => 1, // Website Creation
                     'quantity' => 1,
                     'unit_cost_ht' => 0, 
                     'unit_sell_ht' => 60,        
                 ],
                 [
                     'service_id' => 45, // Hosting  ecomm
                     'quantity' => 1,
                     'unit_cost_ht' => 0, 
                     'unit_sell_ht' => 100,        
                 ],
                 [
                     'service_id' => 13,  // SSL ecomm
                     'quantity' => 1,
                     'unit_cost_ht' => 20, 
                     'unit_sell_ht' => 50,        
                 ],
                 [
                    'service_id' => 6,  // DNS
                    'quantity' => 1,
                    'unit_cost_ht' => 15, 
                    'unit_sell_ht' => 25,        
                ],
             ];
     
             foreach($offerData as $data){
                 DB::table('offer_services')->insert([
                     'quantity' => $data['quantity'],
                     'unit_cost_ht' =>  $data['unit_cost_ht'],
                     'unit_sell_ht' => $data['unit_sell_ht'],
                     'service_id' => $data['service_id'],
                     'offer_id'=>   $offerID,
                 ]);
             }


                // Service Seeder for Offer 9
                $offerID = 9;
                $offerData = [   
                    [
                        'service_id' => 3, // Website sketching
                        'quantity' => 1,
                        'unit_cost_ht' => 0, 
                        'unit_sell_ht' => 400,        
                    ],
                    
                ];
        
                foreach($offerData as $data){
                    DB::table('offer_services')->insert([
                        'quantity' => $data['quantity'],
                        'unit_cost_ht' =>  $data['unit_cost_ht'],
                        'unit_sell_ht' => $data['unit_sell_ht'],
                        'service_id' => $data['service_id'],
                        'offer_id'=>   $offerID,
                    ]);
                }

                // Service Seeder for Offer 10
                $offerID = 10;
                $offerData = [   
                    [
                        'service_id' => 1, // Website Creation
                        'quantity' => 1,
                        'unit_cost_ht' => 0, 
                        'unit_sell_ht' => 60,        
                    ],
                    [
                        'service_id' => 3, // Website sketching
                        'quantity' => 1,
                        'unit_cost_ht' => 0, 
                        'unit_sell_ht' => 400,        
                    ],
                    [
                        'service_id' => 6,  // DNS
                        'quantity' => 1,
                        'unit_cost_ht' => 15, 
                        'unit_sell_ht' => 25,        
                    ],
                    [
                        'service_id' => 12,  // SSL standard
                        'quantity' => 1,
                        'unit_cost_ht' => 15, 
                        'unit_sell_ht' => 30,        
                    ],
                    [
                        'service_id' => 4,  // SSL standard
                        'quantity' => 1,
                        'unit_cost_ht' => 0, 
                        'unit_sell_ht' => 120,        
                    ],
                ];
        
                foreach($offerData as $data){
                    DB::table('offer_services')->insert([
                        'quantity' => $data['quantity'],
                        'unit_cost_ht' =>  $data['unit_cost_ht'],
                        'unit_sell_ht' => $data['unit_sell_ht'],
                        'service_id' => $data['service_id'],
                        'offer_id'=>   $offerID,
                    ]);
                }
    }
}
