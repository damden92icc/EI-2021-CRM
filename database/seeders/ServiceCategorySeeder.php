<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'label' => 'Hosting Solution',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ],
            [
                'label' => 'Security Solution',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ],
            [
                'label' => 'Developpement Solution',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ],
         
            [
                'label' => 'Design Solution',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ],
        ];


        foreach($categories as $data){
            DB::table('service_categories')->insert([
                'label' => $data['label'],
                'description'=> $data['description'],               
            ]);
        }
    }
}
