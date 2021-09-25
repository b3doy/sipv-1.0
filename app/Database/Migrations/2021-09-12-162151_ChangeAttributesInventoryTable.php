<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeAttributesInventoryTable extends Migration
{
    public function up()
    {
        $fields = [
            'kategori' => [
                'name' => 'kategori',
                'type' => 'VARCHAR',
                'constraint' => 99,
                'null' => false
            ],
            'stok' => [
                'name' => 'stok',
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ]
        ];
        $this->forge->modifyColumn('inventory', $fields);
    }

    public function down()
    {
        //
    }
}
