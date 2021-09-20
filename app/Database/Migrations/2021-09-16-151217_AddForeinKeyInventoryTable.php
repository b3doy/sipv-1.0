<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Database\Migration;

class AddForeinKeyInventoryTable extends Migration
{
    public function up()
    {
        //
    }

    public function down()
    {
        //
    }

    protected function addNewForeignKey(
        string $tableName = 'inventory',
        string $fieldName = 'kategori_id',
        string $relatedTableName = 'kategori',
        string $relatedTableField = 'id',
        string $onUpdate = '',
        string $onDelete = '',
        string $indexMethod = 'btree'
    ): bool {
        if (!$this->db->simpleQuery('ALTER TABLE `' . $tableName . '` ADD CONSTRAINT `' . $tableName . '_' . $fieldName . '_foreign` FOREIGN KEY (`' . $fieldName . '`) REFERENCES `' . $relatedTableName . '` (`' . $relatedTableField . '`) ON DELETE ' . strtoupper($onDelete) . ' ON UPDATE ' . strtoupper($onUpdate) . ';')) {
            $error = $this->db->error();

            throw new DatabaseException('An error occured in "AdvancedMigration" (1).\nCode: ' . $error['code'] . '\nMessage: ' . $error['message']);
        }

        if (empty($error)) {
            if (!$this->db->simpleQuery('ALTER TABLE `' . $tableName . '` ADD INDEX `' . $tableName . '_' . $fieldName . '_foreign`(`' . $fieldName . '`) USING ' . strtoupper($indexMethod) . ';')) {
                $error = $this->db->error();

                throw new DatabaseException('An error occured in "AdvancedMigration" (2).\nCode: ' . $error['code'] . '\nMessage: ' . $error['message']);
            }
        }

        return true;
    }
}
