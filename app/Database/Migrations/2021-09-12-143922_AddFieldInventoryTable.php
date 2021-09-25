<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldInventoryTable extends Migration
{
    public function up()
    {
        $fields = [
            'stok' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'after'      => 'harga_jual'
            ]
        ];
        $this->forge->addColumn('inventory', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('inventory', 'stok');
    }
}
