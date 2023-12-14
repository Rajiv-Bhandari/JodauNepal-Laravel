<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Enums\UserType;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Technician',
            'email' => 'technician@gmail.com',
            'address' => 'Nepal',
            'contactno' => '1234556644',
            'password' => bcrypt('12345678'),
            'usertype' => UserType::Technician, 
        ]);
    }
}
