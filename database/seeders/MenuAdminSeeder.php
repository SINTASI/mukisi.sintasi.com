<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Admin\MenuAdmin;

class MenuAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=MenuAdminSeeder
     * @return void
     */
    public function run()
    {

        MenuAdmin::insert([
            [
                'name' => 'ANGGOTA',
                'link' => '/admin/post',
                'seq_no' => 1
            ],
            [
                'name' => 'POST',
                'link' => '/admin/post',
                'seq_no' => 2
            ],
            [
                'name' => 'SLIDER',
                'link' => '/admin/slider',
                'seq_no' => 3
            ],
            [
                'name' => 'SETTING',
                'link' => '/admin/setting',
                'seq_no' => 4
            ]
        ]);

        $master = MenuAdmin::insertGetId([
            'name' => 'Master',
            'link' => '/admin/master'
        ]);

        $data = [
            [
                'name' => 'Menu',
                'icon' => 'dns',
                'parent' => $master,
                'link' => '/admin/master/menu'
            ],
            [
                'name' => 'Role',
                'icon' => 'dns',
                'parent' => $master,
                'link' => '/admin/master/role'
            ],
            [
                'name' => 'Permission',
                'icon' => 'dns',
                'parent' => $master,
                'link' => '/admin/master/permission'
            ]
        ];

        MenuAdmin::insert($data);
    }
}


// $table->string('name')->nullable();
// $table->string('icon')->nullable();
// $table->string('color')->nullable();
// $table->bigInteger('parent')->nullable()->default(0);
// $table->integer('seq_no')->nullable()->default(1);
// $table->boolean('active')->default(true);
