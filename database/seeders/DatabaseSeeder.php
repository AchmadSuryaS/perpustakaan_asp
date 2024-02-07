<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create([
            "name" => "admin",
        ]);

        Role::create([
            "name" => "petugas",
        ]);

        Role::create([
            "name" => "user",
        ]);

        Category::create([
            "category_name" => "Fiksi"
        ]);

        Category::create([
            "category_name" => "Non Fiksi"
        ]);

        Category::create([
            "category_name" => "Novel"
        ]);

        Category::create([
            "category_name" => "Pendidikan"
        ]);

        User::create([
            "name" => 'admin',
            "email" => 'admin@gmail.com',
            "username" => 'admin',
            "role_id" => 1,
            "password" => Hash::make('admin1303')
        ]);

        User::create([
            "name" => 'petugas',
            "email" => 'petugas@gmail.com',
            "username" => 'petugas',
            "role_id" => 2,
            "password" => Hash::make('petugas1303')
        ]);

        User::create([
            "name" => 'user',
            "email" => 'user@gmail.com',
            "username" => 'user',
            "role_id" => 3,
            "password" => Hash::make('user1303')
        ]);
    }
}
