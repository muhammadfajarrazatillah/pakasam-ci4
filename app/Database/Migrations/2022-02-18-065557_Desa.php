<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Desa extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_desa'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'desa'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_desa', true);
        $this->forge->createTable('desa');
	}

	public function down()
	{
		$this->forge->dropTable('desa');
	}
}
