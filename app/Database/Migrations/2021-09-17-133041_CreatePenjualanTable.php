<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenjualanTable extends Migration
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
            'faktur_penjualan' => [
                'type'        => 'VARCHAR',
                'constraint' => 20,
                'null'        => false
            ],
            'tanggal_penjualan' => [
                'type'        => 'DATE',
                'null'        => false
            ],
            'kode_konsumen_penjualan' => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'diskon_persen_penjualan' => [
                'type'          => 'DOUBLE',
                'constraint'    => '11,2',
                'default'       => 0.00
            ],
            'diskon_nominal_penjualan' => [
                'type'          => 'DOUBLE',
                'constraint'    => '11,2',
                'default'       => 0.00
            ],
            'total_kotor_penjualan' => [
                'type'          => 'DOUBLE',
                'constraint'    => '11,2',
                'default'       => 0.00
            ],
            'total_bersih_penjualan' => [
                'type'          => 'DOUBLE',
                'constraint'    => '11,2',
                'default'       => 0.00
            ]
        ]);

        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('penjualan');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan');
    }
}
