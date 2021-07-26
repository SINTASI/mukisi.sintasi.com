<?php

namespace Database\Seeders;

use App\Models\MasterCategory;
use Illuminate\Database\Seeder;

class MasterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=MasterCategorySeeder
     * @return void
     */
    public function run()
    {
        $data =
            [
                [
                    'name' => 'Rumah Sakit',

                ],
                [
                    'name' => 'Institusi Pendidikan',
                ],
                [
                    'name' => 'Klinik',
                ],
                [
                    'name' => 'Lab',
                ],
                [
                    'name' => 'Apotek',
                ],
                [
                    'name' => 'NGO Kesehatan',
                ]
            ];

        foreach ($data as $value) {
            if (!MasterCategory::where('name', $value['name'])->exists()) {
                MasterCategory::create($value);
            } else {
                MasterCategory::where('name', $value['name'])->update($value);
            }
        }
    }
}
