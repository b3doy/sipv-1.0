<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToInventoryTable extends Migration
{
    public function up()
    {
        $fields = [
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 155,
                'after'      => 'barcode'
            ]
        ];
        $this->forge->addColumn('inventory', $fields);
    }

    public function down()
    {
        //
    }
}
