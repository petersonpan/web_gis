<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Uploads extends Migration
{
    public function up()
    {
        $this->forge->AddField([

            'id_upload'          => [
            'type'              => 'INT',
            'constraint'        => 5,
            'unsigned'          =>true,
            'auto_increment'    =>true
            ],

            'judul'        => [
                'type'          => 'VARCHAR',
                'constraint'    => 50,
                ],
        ]);

        $this->forge->addKey('id_upload',TRUE);
        $this->forge->createTable('uploads',TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('uploads');
    }
}

