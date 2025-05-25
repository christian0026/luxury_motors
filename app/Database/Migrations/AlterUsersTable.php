<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'reset_token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'reset_expires' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'email_verified_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'remember_token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'reset_token');
        $this->forge->dropColumn('users', 'reset_expires');
        $this->forge->dropColumn('users', 'email_verified_at');
        $this->forge->dropColumn('users', 'remember_token');
    }
}