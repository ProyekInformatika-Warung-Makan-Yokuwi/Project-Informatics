<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhoneToPesanan extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pesanan', [
            'nomorTelepon' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
                'after' => 'namaPelanggan'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('pesanan', 'nomorTelepon');
    }
}
