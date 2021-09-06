<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'label' => 'Client',
                'description' => 'Role for all clients'
            ],
            [
                'label' => 'Manager',
                'description' => 'Role for all managers'
            ],
            [
                'label' => 'Admin',
                'description' => 'Role for all admin'
            ],
         
            [
                'label' => 'Accountant',
                'description' => 'Role for all accountant'
            ],
        ];


        foreach($roles as $data){
            DB::table('roles')->insert([
                'label' => $data['label'],
                'description'=> $data['description'],               
            ]);
        }
    }
}
