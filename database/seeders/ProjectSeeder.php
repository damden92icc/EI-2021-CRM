<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
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
                'label' => 'Project  Website Alteria Corp.',
                'reference' => 'P1-OCT-2021-001',
                'description' => "Website to present Alteria company and service. Their service include to sell product over the website by providing brand design and attractive promotion on different produt. ",   
                'project_state' => 'RUNNING'   ,    
                'concerned_company' =>  2       , // H&M
            ],
            [
                'label' => 'Project Website Dance Station AL',
                'description' => 'Website to show off all lesson they are possible to have in the Art Station. This project was made from screatch and running with all standard features',
                'reference' => 'P2-OCT-2021-002',
                'project_state' => 'RUNNING' ,   
                'concerned_company' =>2        // H&M 
            ],
 
            [
                'label' => 'Project Website Mining Hairstayle',
                'description' => 'Website describing all service provide by the hairstyle company. The project was started from scratch . This project requiere the standards service to running in the cloud.',
                'reference' => 'P2-OCT-2021-003',
                'project_state' => 'RUNNING' ,    
                'concerned_company' => 2       , // H&M
            ],

            [
                'label' => 'Hosting Website Coco Clothing ',
                'description' => 'Website using a wordpress plateform and homeade by their owner. The service provided concern only the hosting and the security associate.',
                'reference' => 'P3-OCT-2021-001',
                'project_state' => 'RUNNING'    ,
                'concerned_company' => 3        // King Burger Dog
            ],

            [
                'label' => 'Hosting Website NKL Agency ',
                'description' => 'Website using a wordpress plateform and homeade by their owner. The service included only the hosting and security by providing an SSL Certificate',
                'reference' => 'P3-OCT-2021-002',
                'project_state' => 'RUNNING' ,   
                'concerned_company' => 3 ,   // King Burger Dog       
            ],

            [
                'label' => 'Hosting And email Immo Trevor  ',
                'description' => 'Website using a wordpress plateform and homeade by their owner. The service include the complete digital solution for the domaine and the hosting requiered.',
                'reference' => 'P4-OCT-2021-001',
                'project_state' => 'RUNNING'  ,
                'concerned_company' => 4 , // Pizza Folia         
            ],
            
        ];

        foreach($offers as $data){
            DB::table('projects')->insert([
                'label' => $data['label'],
                'description' => $data['description'],
                'reference'=> $data['reference'],
                'project_state' => $data['project_state'],
                'start_date'=>  Carbon::now()->subDays(200) ,               
                'owner_id'=>1,
                'concerned_company' =>  $data['concerned_company'],       
                'created_at' => Carbon::now()->subDays(201)
            ]);
        }
    }
}
