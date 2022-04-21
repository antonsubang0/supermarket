<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keranjang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_keranjang'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'qty_barang' => [
                'type' => 'INT',
                'null' => 3,
            ],
        ]);
        $this->forge->addKey('id_keranjang', true);
        $this->forge->createTable('keranjang');
    }

    public function down()
    {
        $this->forge->dropTable('keranjang');
    }
}
