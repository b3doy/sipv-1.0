<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

use function PHPSTORM_META\type;

class CreateTableInventory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'plu' => [
                'type'          => 'VARCHAR',
                'constraint'    => 155,
            ],
            'nama_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'barcode' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'harga_beli' => [
                'type'          => 'INT',
                'constraint'    => 12,
            ],
            'margin' => [
                'type'          => 'INT',
                'constraint'    => 5,
            ],
            'harga_jual' => [
                'type'          => 'INT',
                'constraint'    => 12,
            ],
            'created_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ], 'deleted_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('inventory');
    }

    public function down()
    {
        $this->forge->dropTable('inventory');
    }
}
