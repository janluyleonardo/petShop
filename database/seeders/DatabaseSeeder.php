<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\User;
use App\Models\InventorySeeder;
use App\Models\User;
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
        User::factory(1)->create();
        Inventory::factory(50)->create();
        // $this->call(InventorySeeder::class);
    }
}
