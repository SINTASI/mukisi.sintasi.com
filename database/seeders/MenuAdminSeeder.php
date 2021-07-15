<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Admin\MenuAdmin;

class MenuAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
