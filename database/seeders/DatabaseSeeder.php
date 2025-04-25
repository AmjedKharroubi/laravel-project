<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Animal;
use App\Models\InventoryItem;
use App\Models\FinancialRecord;
use App\Models\Report;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@farm.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create worker user
        User::create([
            'name' => 'Worker',
            'email' => 'worker@farm.com',
            'password' => bcrypt('password'),
            'role' => 'worker',
        ]);

        // Create sample animals
        Animal::factory(20)->create();

        // Create sample inventory items
        InventoryItem::factory(15)->create();

        // Create sample financial records
        FinancialRecord::factory(30)->create();

        // Create sample reports
        Report::factory(5)->create();
    }
}