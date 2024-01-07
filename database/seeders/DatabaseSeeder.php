<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::create([
      'name' => 'Ali Azhar',
      //   'username' => 'aliazhar',
      'email' => 'aliazhar.idx@gmail.com',
      'password' => Hash::make('123'),
      'role' => 'owner'
    ]);

    User::create([
      'name' => 'Ahmad Jaenal',
      //   'username' => 'aliazhar_admin',
      'email' => 'ahmad@gmail.com',
      'password' => Hash::make('123'),
    ]);

    User::create([
      'name' => 'Adinda Regita',
      //   'username' => 'aliazhar_member',
      'email' => 'adin@gmail.com',
      'password' => Hash::make('123'),
    ]);

    User::create([
      'name' => 'Stefan Setiadi',
      //   'username' => 'aliazhar_member',
      'email' => 'stefan@gmail.com',
      'password' => Hash::make('123'),
    ]);

    User::create([
      'name' => 'Muhammad Gilang',
      //   'username' => 'aliazhar_member',
      'email' => 'gilang@gmail.com',
      'password' => Hash::make('123'),
    ]);

    User::create([
      'name' => 'Azka Zaki',
      //   'username' => 'aliazhar_member',
      'email' => 'azka@gmail.com',
      'password' => Hash::make('123'),
    ]);
  }
}
