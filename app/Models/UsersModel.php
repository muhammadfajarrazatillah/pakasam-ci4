<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
	protected $table			     = 'users';
	protected $primaryKey       = 'id_user';
	protected $returnType        = 'object';
	protected $allowedFields	= ['nama_user', 'username', 'password', 'level'];
	protected $beforeInsert      = ['hashPassword'];
	protected $beforeUpdate    = ['hashPassword'];
	
	protected $validationRules    = [
		'nama_user'     		    	=> 'required',
		'username'     			=> 'required|min_length[3]|is_unique[users.nama_user]',
		'password'     			=> 'required|min_length[3]',
        'passkonf'     			=> 'required|matches[password]',
		'level'     			=> 'required',
    ];

    protected $validationMessages = [
		'nama_user'        => [
            'required' => 'Nama tidak boleh kosong.',
        ],
		'username'        => [
            'required' => 'Username tidak boleh kosong.',
			'min_lengt' => 'Username minimal 3 karakter.',
			'is_unique' => 'Username tidak boleh sama.',
        ],
		'password'        => [
            'required' => 'Password tidak boleh kosong.',
			'min_lengt' => 'Password minimal 3 karakter.',
        ],
		'passkonf'        => [
            'required' => 'Konfirmasi Password tidak boleh kosong.',
			'matches' => 'Konfirmasi Password tidak sesuai dengan Password.',
        ],
		'level'        => [
            'required' => 'Level belum dipilih.',
        ],
    ];

	protected function hashPassword(array $data) {
		if (isset($data['data']['password']))
		$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
				return $data;
		}
	
}
