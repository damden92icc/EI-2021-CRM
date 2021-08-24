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
                'reference' => 'A201545',
                'project_state' => 'in progress'
            ],
            [
                'label' => 'Project Website XYZ',
                'reference' => 'A2015445',
                'project_state' => 'in progress'
            
            ],
            [
                'label' => 'Project Website ATD',
                'reference' => 'B201545',
                'project_state' => 'in progress'
  
            ],
            [
                'label' => 'Project website Aristo',
                'reference' => 'CA201545',
                'project_state' => 'in progress'
            ],
            [
                'label' => 'Project website Y&T ',
                'reference' => 'CA2X01545',
                'project_state' => 'in progress'
            ],
        ];

        $arrayFakeCompany = [ 2, 3, 4, 5];
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
