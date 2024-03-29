<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TempatWisata extends Migration
{
    public function up()
    {
        $this->forge->AddField([

            'id_tempat'          => [
                'type'              => 'INT',
                'constraint'        => 5,
                'auto_increment'    => true
            ],

            'nama_tempat'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 50,
            ],
            'id_kecamatan'        => [
                'type'          => 'BIGINT',
                'constraint'    => '5',
            ],
            'keterangan_tempat'        => [
                'type'          => 'text',
                'null'          => true,
            ],

            'jarak' => [
                'type' => 'text',
                'null' => true
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'NULL' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'NULL' => true,
            ],

        ]);


        $this->forge->addKey('id_tempat', TRUE);
        $this->forge->createTable('tempat_wisata', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tempat_wisata');
    }
}