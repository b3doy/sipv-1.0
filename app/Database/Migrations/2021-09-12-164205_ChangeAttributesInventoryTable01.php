<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeAttributesInventoryTable01 extends Migration
{
    public function up()
    {
        $fields = [
            'created_at' => [
                'name' => 'created_at',
                'type' => 'datetime',
                'null' => false
            ],
            'updated_at' => [
                'name' => 'updated_at',
                'type' => 'datetime',
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
