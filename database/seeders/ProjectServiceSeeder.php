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

          
        // Service Seeder for Project 1
        $projectID = 1;
        $projectServices = [          
      
            [
                'service_id' => '1' , // Website Creation
                'quantity' => '1',
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 1400, 
                'start_date' => Carbon::now()->subDays(180), 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'recurrency_payement' => "NONE",           
            ],
            [
                'service_id' => '3' , // Sketching website
                'quantity' => '1',
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 400, 
                'start_date' => Carbon::now()->subDays(180), 
                'is_active' => 0,
                'service_state' => "ARCHIVED",
                'recurrency_payement' => "NONE" ,           
            ],

            [
                'service_id' => 5 , // hosting e-commerce
                'quantity' => '1',
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 150, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],

            [
                'service_id' => 6 , // dns NAME
                'quantity' => '1',
                'unit_cost_ht' => 15, 
                'unit_sell_ht' => 25, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],
            
            [
                'service_id' => 13 , // dns ssl e-commerce
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 45, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],
            
        ];

         $this->seedTable( $projectID, $projectServices);


        // Service Seeder for Project 2
     
        $projectID = 2;
        $projectServices = [          
      
            [
                'service_id' => '1' , // Website Creation
                'quantity' => '1',
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 1400, 
                'start_date' => Carbon::now()->subDays(180), 
                'is_active' => 0,
                'service_state' => 'ARCHIVED',
                'recurrency_payement' => "NONE",           
            ],
            [
                'service_id' => '3' , // Sketching website
                'quantity' => '1',
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 400, 
                'start_date' => Carbon::now()->subDays(180), 
                'is_active' => 0,
                'service_state' => "ARCHIVED",
                'recurrency_payement' => "NONE" ,           
            ],

            [
                'service_id' => 4 , // hosting e-commerce
                'quantity' => '1',
                'unit_cost_ht' => 0, 
                'unit_sell_ht' => 150, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],

            [
                'service_id' => 6 , // dns NAME
                'quantity' => '1',
                'unit_cost_ht' => 15, 
                'unit_sell_ht' => 25, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],
            
            [
                'service_id' => 12 , // dns ssl e-commerce
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 45, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],
            
        ];
        $this->seedTable( $projectID, $projectServices);


         // Service Seeder for Project 3
     
         $projectID = 3;
         $projectServices = [          
       
             [
                 'service_id' => '1' , // Website Creation
                 'quantity' => '1',
                 'unit_cost_ht' => 0, 
                 'unit_sell_ht' => 1400, 
                 'start_date' => Carbon::now()->subDays(180), 
                 'is_active' => 0,
                 'service_state' => 'ARCHIVED',
                 'recurrency_payement' => "NONE",           
             ],
             [
                 'service_id' => '3' , // Sketching website
                 'quantity' => '1',
                 'unit_cost_ht' => 0, 
                 'unit_sell_ht' => 400, 
                 'start_date' => Carbon::now()->subDays(180), 
                 'is_active' => 0,
                 'service_state' => "ARCHIVED",
                 'recurrency_payement' => "NONE" ,           
             ],
 
             [
                 'service_id' => 4 , // hosting standard
                 'quantity' => '1',
                 'unit_cost_ht' => 0, 
                 'unit_sell_ht' => 150, 
                 'start_date' => Carbon::now()->subDays(90), 
                 'is_active' => 1,
                 'service_state' => "RUNNING",
                 'recurrency_payement' => "YEARLY" ,           
             ],
 
             [
                 'service_id' => 6 , // dns NAME
                 'quantity' => '1',
                 'unit_cost_ht' => 15, 
                 'unit_sell_ht' => 25, 
                 'start_date' => Carbon::now()->subDays(90), 
                 'is_active' => 1,
                 'service_state' => "RUNNING",
                 'recurrency_payement' => "YEARLY" ,           
             ],
             
             [
                 'service_id' => 12 , // dns ssl standard
                 'quantity' => '1',
                 'unit_cost_ht' => 20, 
                 'unit_sell_ht' => 45, 
                 'start_date' => Carbon::now()->subDays(90), 
                 'is_active' => 1,
                 'service_state' => "RUNNING",
                 'recurrency_payement' => "YEARLY" ,           
             ],
             
         ];

        $this->seedTable( $projectID, $projectServices);

        // Service Seeder for Project 4
     
        $projectID = 4;
        $projectServices = [          

            [
                'service_id' => 6 , // dns NAME
                'quantity' => '1',
                'unit_cost_ht' => 15, 
                'unit_sell_ht' => 25, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],
            
            [
                'service_id' => 12 , // dns ssl standard
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 45, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],
            
        ];

       $this->seedTable( $projectID, $projectServices);

        // Service Seeder for Project 5

        $projectID = 5;
        $projectServices = [          

            [
                'service_id' => 6 , // dns NAME
                'quantity' => '1',
                'unit_cost_ht' => 15, 
                'unit_sell_ht' => 25, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],
            
            [
                'service_id' => 12 , // dns ssl standard
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 45, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],
            
        ];

        $this->seedTable( $projectID, $projectServices);


        // Service Seeder for Project 6

        $projectID = 6;
        $projectServices = [          

            [
                'service_id' => 6 , // dns NAME
                'quantity' => '1',
                'unit_cost_ht' => 15, 
                'unit_sell_ht' => 25, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],
            
            [
                'service_id' => 12 , // dns ssl standard
                'quantity' => '1',
                'unit_cost_ht' => 20, 
                'unit_sell_ht' => 45, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],
            
            [
                'service_id' => 7 , // dns ssl standard
                'quantity' => 3,
                'unit_cost_ht' => 5, 
                'unit_sell_ht' => 12, 
                'start_date' => Carbon::now()->subDays(90), 
                'is_active' => 1,
                'service_state' => "RUNNING",
                'recurrency_payement' => "YEARLY" ,           
            ],
            
            
        ];

        $this->seedTable( $projectID, $projectServices);
    }

        public function seedTable(Int $projectID , Array $projectServices){

            foreach($projectServices as $data){

                // check if service has reccurency
                // Calcul next Pay date based on the start date and reccurency of payement
                  // Check delay between start date and current date 
                if( $data['recurrency_payement'] != "NONE" ){
                        $npd= $this->calculNPD( $data['recurrency_payement'],  Carbon::parse($data['start_date'])  );                                
                        $billableValue = $this->checkIfBillable($npd) ;
                    
                        if($billableValue == 1 ){
                        $data['payement_state']  = "TO PAY";
                        }
                        else{
                        $data['payement_state'] ="PAYED";
                        }

                        $data['last_payement_date']  = null ;

                } else{
                    $npd = null ;
                    $billableValue = 0;
                    $data['last_payement_date']  =Carbon::parse($data['start_date'])->addDays(30) ;
                    $data['payement_state'] ="PAYED";
                }
                 
             
    
                DB::table('project_services')->insert([
                    'quantity' => $data['quantity'],
                    'unit_cost_ht' => $data['unit_cost_ht'],
                    'unit_sell_ht' => $data['unit_sell_ht'],
                    'is_active' =>  $data['is_active'],
                    'service_state' => $data['service_state'] ,
                    'start_date' => $data['start_date'] ,
                    'last_payement_date' =>      $data['last_payement_date'] ,
                    'payement_state' =>    $data['payement_state'] ,
                    'recurrency_payement' => $data['recurrency_payement'] ,
                    'next_payement_date' => $npd,
                    'is_billable' => $billableValue,               
                    'is_pay' => 1,
                    'service_id' =>  $data['service_id'] ,
                    'project_id'=>  $projectID,      
                ]);
            }
        }
       

  


        public function calculNPD(String $recurrency, Carbon $startDate ){

            switch ($recurrency ) {
                case "YEARLY":
                    return     $startDate->addYear();
                    break;
                case "MONTHLY":
                    return $startDate->addMonth();
                    break;
                case "HALF-YEARLY":
                    return  $npd->addMonth(6);                    
                case "NONE":
                    return null;
                    break;
                default:
              return   null;
                    break;                
            }
        }


        public function checkIfBillable(Carbon $date){
            $currentDate = Carbon::now();

            $delayBeforeNPD =  $currentDate->diffInDays(    $date ); 

            if( $delayBeforeNPD < 30){
                return true;
            }

            else{
                return false;
            }
        }


    }

