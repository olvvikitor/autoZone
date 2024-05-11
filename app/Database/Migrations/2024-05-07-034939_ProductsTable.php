<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductsTable extends Migration
{
    public function up()
    {
        //Criação de tabela de produtos
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'category' =>[
                'type'           => 'VARCHAR',
                'constraint'     => 101,
                'null'           => true
            ]
            ,
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'price' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
            ],
            'promotion' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
                'null'           => true,
                'default' => 0.00
            ],
            'stock' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'null'           => true,
                'default' => 0
            ],
            'stock_min' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'null'           => true,
                'default' => 10
            ],
            'image' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
            ],
            'color' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
            ],
            'marca'=> [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
            ],

            'created_at' => [
                'type'           => 'DATETIME',
            ],

            'updated_at' => [
                'type'           => 'DATETIME',
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
