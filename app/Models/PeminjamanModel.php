<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class PeminjamanModel extends Model
{
	protected $table			     = 'peminjaman';
	protected $primaryKey       = 'id_peminjaman';
	protected $returnType        = 'object';
	protected $allowedFields	= ['id_warkah', 'id_kecamatan', 'id_desa', 'id_rak', 'tanggal', 'tanggal_kembali', 'status'];

	protected $validationRules    = [
		'no_hak'     		    => 'required',
		'tanggal'     		    => 'required',
    ];

    protected $validationMessages = [
		'no_hak'        => [
            'required' => 'Nomor Hak/Surat Ukur/Surat Perintah Membayar tidak boleh kosong.',
        ],
		'tanggal'        => [
            'required' => 'Tanggal tidak boleh kosong.',
        ],
    ];

	function getAll() {
		$builder = $this->db->table('peminjaman');
		$builder->join('kecamatan', 'kecamatan.id_kecamatan = peminjaman.id_kecamatan', 'left');
		$builder->join('desa', 'desa.id_desa = peminjaman.id_desa','left');
		$builder->join('rak', 'rak.id_rak = peminjaman.id_rak');
		$builder->join('warkah', 'warkah.id_warkah = peminjaman.id_warkah', 'left');
		$query = $builder->get();
		return $query->getResult();
	}

	public function tampil_bulan_peminjaman()
    {
		$builder = $this->db->table('peminjaman');
        $builder->select('MONTH(tanggal) as bulan, MONTHNAME(tanggal) as nama_bulan, YEAR(tanggal) as tahun');
        $builder->groupBy('MONTH(tanggal), YEAR(tanggal)');
        $query = $builder->get();
		return $query->getResult();
    }

    public function tampil_peminjaman_filter($filter)
    {
		$builder = $this->db->table('peminjaman');
		$builder->join('kecamatan', 'kecamatan.id_kecamatan = peminjaman.id_kecamatan', 'left');
		$builder->join('desa', 'desa.id_desa = peminjaman.id_desa', 'left');
		$builder->join('warkah', 'warkah.id_warkah = peminjaman.id_warkah', 'left');
		$builder->orderBy('tanggal', 'DESC');

		$bulan = null;
		$tahun = null;

		if($filter) {
			$bulan = substr($filter, 0, -4);
			$tahun = substr($filter, 2);
			$builder->where('MONTH(tanggal)', $bulan);
			$builder->where('YEAR(tanggal)', $tahun);
		}

		$query = $builder->get();
		return $query->getResult();
	}
}