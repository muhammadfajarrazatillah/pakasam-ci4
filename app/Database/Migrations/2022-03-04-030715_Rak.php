<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rak extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_rak'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'rak'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
			'tingkat'       => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
			'blok'       => [
				'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
		]);
		$this->forge->addKey('id_rak', true);
        $this->forge->createTable('rak');
	}

	public function down()
	{
		$this->forge->dropTable('rak');
	}
}
