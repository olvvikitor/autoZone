<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users=[
            [
                'id_endereco' => '1',
                'name' => 'Joao',
                'username' => 'joao123',
                'email' => 'joao@gmail.com',
                'phone' => '07598633860',
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'roles' => '["user"]',
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_endereco' => '1',
                'name' => 'Emyler',
                'username' => 'emyle123',
                'email' => 'emyle@gmail.com',
                'phone' => '07598633860',
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'roles' => '["admin"]',
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ]
            ];
            $this->db->table('users')->insertBatch($users);
            echo PHP_EOL . 'Inseridos ' . count($users) . ' users' . PHP_EOL;
    }
}
