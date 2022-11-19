<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'Master'],
            ['name' => 'Admin'],
            ['name' => 'Teacher'],
            ['name' => 'Customer'],
        ];
        Role::insert($roles);

        $users = [
            [ 'name' => 'Rully Aprilia Zandra', 'username' => 'zandra', 'password' => bcrypt('zandra'), 'role_id' => 1, 'admin' => 'Rully Aprilia Zandra', ],
            [ 'name' => 'Elva Lidya Saferlin', 'username' => 'elva', 'password' => bcrypt('elva'), 'role_id' => 2, 'admin' => 'Rully Aprilia Zandra', ],
            [ 'name' => 'Ganesha Solomon', 'username' => 'ganesh', 'password' => bcrypt('ganesh'), 'role_id' => 3, 'admin' => 'Elva Lidya Saferlin', ],
            [ 'name' => 'Zora Daireann El Zandra', 'username' => 'zora', 'password' => bcrypt('zora'), 'role_id' => 4, 'admin' => 'Elva Lidya Saferlin', ],
        ];
        User::insert($users);
    }
}
