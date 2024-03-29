<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ObjectWisata extends Migration
{
    public function up()
    {
        $this->forge->AddField([

            'id_wisata'             => [
                'type'                  => 'INT',
                'constraint'            => 5,
                'auto_increment'        => true
            ],

            'nama_wisata'           => [
                'type'              => 'VARCHAR',
                'constraint'        => 50,
            ],

            'id_jenis'              => [
                'type'              => 'BIGINT',
                'constraint'        => '5',
            ],
            'nama_tempat'             => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],

            'nama_fasilitas'          => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],

            'longitude'             => [
                'type'             => 'VARCHAR',
                'constraint'       => 50,
            ],

            'latitude'              => [
                'type'             => 'VARCHAR',
                'constraint'       => 50,
            ],

            'foto'                  => [
                'type'              => 'VARCHAR',
                'constraint'        => 50,
            ],

            'keterangan'           => [
                'type'              => 'TEXT',
                'null'              => true,
            ],

            'created_at'            => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],

            'updated_at'            => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);

        $this->forge->addKey('id_wisata', TRUE);
        $this->forge->createTable('object_wisata', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('objectwisata');
    }
}
