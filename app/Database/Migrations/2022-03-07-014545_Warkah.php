<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Warkah extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_warkah'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'di_208'       => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
			'no_hak'       => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
			'tahun'       => [
				'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'jenis_arsip'       => [
				'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
			'jenis_hak'       => [
				'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
			'pemilik'       => [
				'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
			'id_kecamatan'	=> [
                'type'           	=> 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
			'id_desa'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
			'id_rak'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'keterangan'       => [
				'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
		]);
		$this->forge->addKey('id_warkah', true);
		$this->forge->addForeignKey('id_rak', 'rak', 'id_rak');
        $this->forge->createTable('warkah');
	}

	public function down()
	{
		$this->forge->dropForeignKey('id_rak', 'rak', 'id_rak');
		$this->forge->dropTable('warkah');
	}
}
