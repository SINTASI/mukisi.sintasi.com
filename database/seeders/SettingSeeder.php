<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'key' => 'name',
                'value' => config('app.name'),
            ],
            [
                'key' => 'description',
                'value' => '',
            ],
            [
                'key' => 'title_header',
                'value' => config('app.name'),
            ],
            [
                'key' => 'bg_menu_kiri',
                'value' => '/template/images/pictures/6.jpg',
            ],
            [
                'key' => 'caption_menu_kiri',
                'value' => 'Selamat Datang',
            ],
            [
                'key' => 'color_primary',
                'value' => '#1b55bf',
            ],
            [
                'key' => 'color_secondary',
                'value' => '#1740bf',
            ]
        ];

        foreach ($data as $value) {
            if (!Setting::where('key', $value['key'])->exists()) {
                Setting::create($value);
            } else {
                Setting::where('key', $value['key'])->update($value);
            }
        }
    }
}
