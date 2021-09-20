<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSupplierColumnToInventoryTable extends Migration
{
    public function up()
    {
        $fields = [
            'kode_supplier' => [
                'type'       => 'VARCHAR',
                'constraint' => 155,
                'after'      => 'stok'
            ]
        ];
        $this->forge->addColumn('inventory', $fields);
    }

    public function down()
    {
        //
    }
}
