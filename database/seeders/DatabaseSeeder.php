<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Grade;
use App\Models\Course;
use App\Models\Classroom;
use App\Models\Instrument;
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

        $instruments = [
            [ 'name' => 'Piano Klasik', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Piano Pop', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Keyboard', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Vocal', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Biola', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Gitar', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Drum', 'admin' => 'Rully Aprilia Zandra' ],
        ];
        Instrument::insert($instruments);

        $grades = [
            [ 'name' => 'Prepatory', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Prepatory A', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Prepatory B', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => '1 A', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => '1 B', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => '2 A', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => '2 B', 'admin' => 'Rully Aprilia Zandra' ],
        ];
        Grade::insert($grades);

        $courses = [
            [ 'instrument_id' => 1, 'grade_id' => 1, 'price' => 300000, 'admin' => 'Rully Aprilia Zandra' ],
            [ 'instrument_id' => 1, 'grade_id' => 2, 'price' => 350000, 'admin' => 'Rully Aprilia Zandra' ],
            [ 'instrument_id' => 2, 'grade_id' => 1, 'price' => 300000, 'admin' => 'Rully Aprilia Zandra' ],
            [ 'instrument_id' => 2, 'grade_id' => 2, 'price' => 350000, 'admin' => 'Rully Aprilia Zandra' ],
        ];
        Course::insert($courses);

        $classrooms = [
            [ 'name' => 'Ruang 1', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Ruang 2', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Ruang 3', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Ruang 5', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Ruang 6', 'admin' => 'Rully Aprilia Zandra' ],
            [ 'name' => 'Ruang 7', 'admin' => 'Rully Aprilia Zandra' ],
        ];
        Classroom::insert($classrooms);
    }
}
