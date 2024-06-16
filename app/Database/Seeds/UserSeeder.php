<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
  public function run()
  {
    $user = new User();

    $users = [
      [
        'name' => 'Administrator',
        'email' => 'admin@example.com',
        'password' => password_hash('admin', PASSWORD_DEFAULT),
        'role' => 'admin'
      ],
      [
        'name' => 'User',
        'email' => 'user@example.com',
        'password' => password_hash('user', PASSWORD_DEFAULT),
        'role' => 'user'
      ]
    ];

    $user->insertBatch($users);
  }
}
