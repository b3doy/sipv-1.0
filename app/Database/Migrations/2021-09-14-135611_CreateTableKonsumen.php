<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableKonsumen extends Migration
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
            'kode_konsumen' => [
                'type'          => 'VARCHAR',
                'constraint'    => 155,
            ],
            'nama_konsumen' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'alamat' => [
                'type'          => 'TEXT',
            ],
            'telpon_konsumen' => [
                'type'          => 'VARCHAR',
                'constraint'    => 99,
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
        $this->forge->createTable('konsumen');
    }

    public function down()
    {
        $this->forge->dropTable('konsumen');
    }
}
