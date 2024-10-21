<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '8989898989',
            'password' => bcrypt('Admin@1234'),
            'category' => 'Admin'
        ]);

        $admin->assignRole('Admin');


        $HR = User::create([
            'name' => 'HR',
            'email' => 'hr@gmail.com',
            'phone' => '8989898989',
            'password' => bcrypt('HR@1234'),
            'category' => 'HR'
        ]);
        $HR->assignRole('HR');

        $employee = User::create([
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'phone' => '8989898989',
            'password' => bcrypt('Employee@1234'),
            'category' => 'Employee',
        ]);

        $employee->assignRole('Employee');
    }
}
