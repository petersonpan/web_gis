<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kecamatan extends Migration
{
    public function up()
    {
        $this->forge->AddField([

            'id_kecamatan'          => [
            'type'              => 'INT',
            'constraint'        => 5,
            'unsigned'          =>true,
            'auto_increment'    =>true
            ],

            'nama_kecamatan'        => [
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

        $this->forge->addKey('id_kecamatan',TRUE);
        $this->forge->createTable('Kecamatan',TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Kecamatan');
    }
}

