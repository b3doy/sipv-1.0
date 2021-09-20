<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePenjualanTemp extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'        => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'faktur_penjualan_detail' => [
                'type'          => 'VARCHAR',
                'constraint'    => 20,
            ],
            'barcode_penjualan_detail' => [
                'type'          => 'VARCHAR',
                'constraint'    => 50,
            ],
            'harga_beli_penjualan_detail' => [
                'type'          => 'DOUBLE',
                'constraint'    => '11,2',
                'default'       => 0.00
            ],
            'harga_jual_penjualan_detail' => [
                'type'          => 'DOUBLE',
                'constraint'    => '11,2',
                'default'       => 0.00
            ],
            'jumlah_penjualan_detail' => [
                'type'          => 'DOUBLE',
                'constraint'    => '11,2',
                'default'       => 0.00
            ],
            'sub_total_penjualan_detail' => [
                'type'          => 'double',
                'constraint'    => '11,2',
                'default'       => 0.00
            ]
        ]);

        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('penjualan_temp');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan_temp');
    }
}
