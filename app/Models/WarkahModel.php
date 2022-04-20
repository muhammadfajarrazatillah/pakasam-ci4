<?php

namespace App\Models;

use CodeIgniter\Model;

class WarkahModel extends Model
{
	protected $table			     = 'warkah';
	protected $primaryKey       = 'id_warkah';
	protected $returnType        = 'object';
	protected $allowedFields	= ['di_208', 'no_hak', 'tahun', 'jenis_arsip', 'jenis_hak', 'pemilik','id_kecamatan','id_desa','id_rak', 'keterangan'];

	protected $validationRules    = [
		'no_hak'     		    => 'required',
		'tahun'     		    => 'required',
		'id_rak'     			  => 'required',
    ];

    protected $validationMessages = [
		'no_hak'        => [
            'required' => 'Nomor Hak/Surat Perintah Membayar tidak boleh kosong.',
        ],
		'tahun'        => [
            'required' => 'Tahun tidak boleh kosong.',
        ],
		'id_rak'        => [
            'required' => 'Rak belum dipilih.',
        ],
    ];

	function getAll() {
		$builder = $this->db->table('warkah');
		$builder->join('kecamatan', 'kecamatan.id_kecamatan = warkah.id_kecamatan', 'left');
		$builder->join('desa', 'desa.id_desa = warkah.id_desa', 'left');
		$builder->join('rak', 'rak.id_rak = warkah.id_rak');
		$query = $builder->get();
		return $query->getResult();
	}
}
