<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type' => 'INT',
        'unsigned' => true,
        'auto_increment' => true
      ],
      'name' => [
        'type' => 'VARCHAR',
        'constraint' => 100
      ],
      'email' => [
        'type' => 'VARCHAR',
        'constraint' => 100
      ],
      'password' => [
        'type' => 'VARCHAR',
        'constraint' => 255
      ],
      'role' => [
        'type' => 'ENUM',
        'constraint' => ['admin', 'user'],
        'default' => 'user'
      ],
      'created_at' => [
        'type' => 'DATETIME',
        'null' => true
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true
      ]
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('users');
  }

  public function down()
  {
    $this->forge->dropTable('users');
  }
}
