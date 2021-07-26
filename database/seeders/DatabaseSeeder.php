<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\MenuAdminSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            MenuAdminSeeder::class,
            SettingSeeder::class,
            MasterCategorySeeder::class,
        ]);
    }
}
