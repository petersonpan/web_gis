<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisWisata extends Migration
{
    public function up()
    {
        $this->forge->AddField([

            'id_jenis'          => [
            'type'              => 'INT',
            'constraint'        => 5,
            'unsigned'          =>true,
            'auto_increment'    =>true
            ],

            'nama_jenis'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 50,
                ],
            'keterangan'        => [
                'type'          => 'text',
                'null'          => true,
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

        $this->forge->addKey('id_jenis',TRUE);
        $this->forge->createTable('jenis_Wisata',TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('jenis_Wisata');
    }
}

