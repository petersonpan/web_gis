<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Fasilitas extends Migration
{
    public function up()
    {
        $this->forge->AddField([

            'id_Fasilitas'          => [
            'type'              => 'INT',
            'constraint'        => 5,
            'unsigned'          =>true,
            'auto_increment'    =>true
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

        $this->forge->addKey('id_Fasilitas',TRUE);
        $this->forge->createTable('fasilitas',TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('fasilitas');
    }
}

