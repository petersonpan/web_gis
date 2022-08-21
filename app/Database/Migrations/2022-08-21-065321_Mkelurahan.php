<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mkelurahan extends Migration
{
    public function up()
    {
        $this->forge->AddField([

            'id_kelurahan'          => [
            'type'              => 'INT',
            'constraint'        => 5,
            'unsigned'          =>true,
            'auto_increment'    =>true
            ],

            'nama_kelurahan'        => [
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

        $this->forge->addKey('id_kelurahan',TRUE);
        $this->forge->createTable('kelurahan',TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('kelurahan');
    }
}

