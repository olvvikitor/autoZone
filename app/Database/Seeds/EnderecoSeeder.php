<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    public function run()
    {
        $enderecos = [
            [
                'rua' => 'rua',
                'bairro' => 'bairro',
                'cidade' => 'cidade',
                'estado' => 'estado',
                'cep' => 'cep',
                'numero' => 'numero',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'rua' => 'rua',
                'bairro' => 'bairro',
                'cidade' => 'cidade',
                'estado' => 'estado',
                'cep' => 'cep',
                'numero' => 'numero',
                'created_at' => date('Y-m-d H:i:s'),
            ]

        ];
        $this ->db->table('enderecos' )->insertBatch($enderecos);
        echo PHP_EOL . 'Inseridos' . count($enderecos) .'enderecos' . PHP_EOL;
    }
}
