<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StockTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'produto_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'stock_quantity' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'stock_in_out' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => true,
            ],
            'stock_suplier' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'reason' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('stock');
    }

    public function down()
    {
        $this->forge->dropTable('stock');
    }
}
