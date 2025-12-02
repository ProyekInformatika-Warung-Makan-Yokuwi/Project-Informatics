<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimeToPesanan extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pesanan', [
            'waktuPemesanan' => [
                'type' => 'TIME',
                'null' => true,
                'after' => 'tanggalPemesanan'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('pesanan', 'waktuPemesanan');
    }
}
