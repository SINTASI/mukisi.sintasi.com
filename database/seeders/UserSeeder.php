<?php

namespace Database\Seeders;

use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'Administrator']);

        $data = [
            [
                'username' => 'angga',
                'name' => 'Angga Saputra',
                'email' => 'masalikzxc@gmail.com',
                'password' => bcrypt(123123123)
            ]
        ];

        foreach ($data as $value) {
            $user = User::where('username', $value['username']);
            if (!$user->exists()) {
                User::create($value)->assignRole('admin');
            } else {
                $user->update($value);
                $user->first()->assignRole('admin');
            }
        }
    }
}
