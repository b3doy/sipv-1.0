<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_alter_table_users extends Migration
{
    public function up()
    {
        // add new identity info
        $fields = [
            'telpon'          => ['type' => 'VARCHAR', 'constraint' => 63, 'after' => 'fullname'],
            'alamat'          => ['type' => 'TEXT', 'after' => 'telpon'],
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        // drop new columns
        $this->forge->dropColumn('users', 'telpon');
        $this->forge->dropColumn('users', 'alamat');
    }
}
