<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Enderecos extends Migration
{
    public function up()
    {
      $this->forge->addField([
        'id'=>[
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true
        ],
        'rua'=>[
            'type' => 'VARCHAR',
            'constraint' => 255
        ],
        'bairro'=>[
            'type' => 'VARCHAR',
            'constraint' => 255
        ],
        'cidade'=>[
            'type' => 'VARCHAR',
            'constraint' => 255
        ],
        'estado'=>[
            'type' => 'VARCHAR',
            'constraint' => 255
        ],
        'cep'=>[
            'type' => 'VARCHAR',
            'constraint' => 255
        ],
        'numero'=>[
            'type' => 'VARCHAR',
            'constraint' => 255
        ],
        'created_at'=>[
            'type' => 'DATETIME'
        ],
        'updated_at'=>[
            'type' => 'DATETIME'
        ],
        'deleted_at'=>[
            'type' => 'DATETIME'
        ]
      ]);
      $this->forge->addKey('id', true);
      $this->forge->createTable('enderecos');
    }

    public function down()
    {
        $this->forge->dropTable('enderecos');
    }
}
