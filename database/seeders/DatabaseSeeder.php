<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        // Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@nusago.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        //Mobile User
        User::create([
            'name' => 'User Mobile',
            'email' => 'usermobile@nusago.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

        //10 Employees data
        for ($i = 1; $i <=10; $i++) {
            Employee::create([
                'name' => "karyawan $i",
                'email' => "karyawan$i@nusago.com",
                'phone' => "0812345678$i",
                'address' => "Jl. Jalan apa hayo No.$i",
                'position' => $i % 2 == 0 ? 'Staff HRD' : 'Staff IT',
                'department' => $i % 2 == 0 ? 'HRD' : 'IT',
            ]);
        }
    }
}
