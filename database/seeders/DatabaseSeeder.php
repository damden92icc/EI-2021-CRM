<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
       
            CompanySeeder::class,      
            RoleSeeder::class,      
            UsersSeeder::class,        
            EmployesSeeder::class,
            ServiceSeeder::class,
            QuoteSeeder::class,
            OfferSeeder::class,           
            OfferServiceSeeder::class,
            ProjectSeeder::class,
            ProjectServiceSeeder::class,
            ServiceProvDetailsSeeder::class,
           
            
            
       ]);
    }
}
