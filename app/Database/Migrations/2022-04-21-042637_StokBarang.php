<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StokBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'harga_barang' => [
                'type' => 'INT',
                'constraint'     => 7,
            ],
            'jmlh_stok_barang' => [
                'type' => 'INT',
                'null' => 3,
            ],
            'img_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'datetime',
            ],
            'updated_at' => [
                'type' => 'datetime',
            ],
            'deleted_at' => [
                'type' => 'datetime',
            ],
        ]);
        $this->forge->addKey('id_barang', true);
        $this->forge->createTable('stok_barang');
    }

    public function down()
    {
        $this->forge->dropTable('stok_barang');
    }
}
