<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $firstNames = ['Alice', 'Bob', 'Charlie', 'Diana', 'Ethan', 'Fiona', 'George', 'Hannah', 'Ian', 'Julia', 'Kevin', 'Luna', 'Max', 'Nora', 'Oscar', 'Penny', 'Quinn', 'Ryan', 'Sophia', 'Tyler'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Garcia', 'Miller', 'Davis', 'Rodriguez', 'Martinez', 'Hernandez', 'Lopez', 'Gonzalez', 'Wilson', 'Anderson', 'Thomas', 'Taylor', 'Moore', 'Jackson', 'Martin'];

        for ($i = 0; $i < 20; $i++) {
            $firstName = $firstNames[$i];
            $lastName = $lastNames[$i];
            $email = strtolower($firstName) . '.' . strtolower($lastName) . '@example.com';

            User::create([
                'name' => $firstName . ' ' . $lastName,
                'email' => $email,
                'password' => Hash::make('password'),
                'isArtisan' => false,
            ]);
        }
    }
}
