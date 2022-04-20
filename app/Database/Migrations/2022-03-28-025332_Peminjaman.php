<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_peminjaman'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
			'id_warkah'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
				'unsigned'       => true,
            ],
			'tanggal'       => [
				'type'       => 'DATE',
            ],
		]);
		$this->forge->addKey('id_peminjaman', true);
		$this->forge->addForeignKey('id_warkah', 'warkah', 'id_warkah');
        $this->forge->createTable('peminjaman');
	}

	public function down()
	{
		$this->forge->dropForeignKey('id_warkah', 'warkah', 'id_warkah');
		$this->forge->dropTable('peminjaman');
	}
}
