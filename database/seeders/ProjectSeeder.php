<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Arr;

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
                'label' => 'Project Website Fimz',
                'reference' => 'A201EPM545',
                'project_state' => 'in progress'
            ],
            [
                'label' => 'Project Website XYZ',
                'reference' => 'A201578MEZ445',
                'project_state' => 'in progress'
            
            ],
            [
                'label' => 'Project Website ATD',
                'reference' => 'B2PMPGDS1545',
                'project_state' => 'in progress'
  
            ],
            [
                'label' => 'Project website Aristo',
                'reference' => 'CA89785ZLP201545',
                'project_state' => 'in progress'
            ],
            [
                'label' => 'Project website Y&T ',
                'reference' => 'CA2X54878601545',
                'project_state' => 'in progress'
            ],

            [
                'label' => 'Project Ecom. Hmz',
                'reference' => 'A201AZA745545',
                'project_state' => 'in progress'
            ],
            [
                'label' => 'Project Hosting CRM XYZ',
                'reference' => 'A2015ZA7ZA445',
                'project_state' => 'in progress'
            
            ],
            [
                'label' => 'Project Website XYZ',
                'reference' => '78MPB20E1545',
                'project_state' => 'in progress'
  
            ],
            [
                'label' => 'Project website Paula',
                'reference' => 'CA201EJHYR545',
                'project_state' => 'in progress'
            ],
            [
                'label' => 'Project website G&T ',
                'reference' => 'CA2AX01Z445545',
                'project_state' => 'in progress'
            ],
            [
                'label' => 'Project Hosting CRM XYZ',
                'reference' => 'A2015ZA785445',
                'project_state' => 'in progress'
            
            ],
            [
                'label' => 'Project Website Atea',
                'reference' => 'B27840E1545',
                'project_state' => 'in progress'
  
            ],
            
        ];

        $arrayFakeCompany = [ 2, 3, 4];
        foreach($offers as $data){
            DB::table('projects')->insert([
                'label' => $data['label'],
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",   
                'reference'=> $data['reference'],
                'project_state' => $data['project_state'],
                'start_date'=>  Carbon::parse('2000-01-01') ,               
                'owner_id'=>1,
                'concerned_company' =>    Arr::random($arrayFakeCompany),       
            ]);
        }
    }
}
