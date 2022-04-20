<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'nama_user' => 'Sarinah',
			'username' => 'Sarinah',
			'password' => password_hash('Warkah', PASSWORD_BCRYPT),
		];
		$this->db->table('users')->insert($data);
	}
}
