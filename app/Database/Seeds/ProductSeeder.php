<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category' => 'Eletrônicos',
                'name' => 'Smartphone Galaxy S21',
                'price' => 1999.99,
                'promotion' => 0,
                'stock' => 50,
                'stock_min' => 10,
                'image' => 'galaxy_s21.jpg',
                'color' => 'Preto',
                'marca' => 'Samsung',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
    
            [
                'category' => 'Eletrônicos',
                'name' => 'Smartphone Galaxy S22',
                'price' => 1999.99,
                'promotion' => 0,
                'stock' => 50,
                'stock_min' => 10,
                'image' => 'galaxy_s21.jpg',
                'color' => 'Preto',
                'marca' => 'Samsung',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'category' => 'Eletrônicos',
                'name' => 'Smartphone Galaxy S23',
                'price' => 1999.99,
                'promotion' => 0,
                'stock' => 50,
                'stock_min' => 10,
                'image' => 'galaxy_s21.jpg',
                'color' => 'Preto',
                'marca' => 'Samsung',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'category' => 'Eletrônicos',
                'name' => 'Smartphone Galaxy S24',
                'price' => 1999.99,
                'promotion' => 0,
                'stock' => 50,
                'stock_min' => 10,
                'image' => 'galaxy_s21.jpg',
                'color' => 'Preto',
                'marca' => 'Samsung',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'category' => 'Roupas',
                'name' => 'Camiseta Polo',
                'price' => 39.99,
                'promotion' => 0,
                'stock' => 100,
                'stock_min' => 10,
                'image' => 'camiseta_polo.jpg',
                'color' => 'Azul',
                'marca' => 'Polo Ralph Lauren',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            // Adicione os detalhes para os outros produtos aqui
        ];

        // Insira os dados na tabela de produtos
        $this->db->table('products')->insertBatch($data);
    }
}
