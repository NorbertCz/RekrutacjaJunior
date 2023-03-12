<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
    
        foreach ($users as $user) {
            $user->customers()->createMany([
                ['name' => 'Customer A'],
                ['name' => 'Customer B'],
                ['name' => 'Customer C'],
            ]);
        }
    }
}
