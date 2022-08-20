<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type'               =>'INT',
                'constraint'         =>5,
                'unsigned'           =>true,
                'auto_increment'     =>true
            ],
            'username'=>[
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],

            'password'=>[
                'type'           => 'VARCHAR',
                'constraint'     => 5,
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

        //  membuat primary key
         $this->forge->addKey('id_admin', TRUE);

        //  membuat table admin
         $this->forge->createTable('Admin', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Admin');
    }
}
