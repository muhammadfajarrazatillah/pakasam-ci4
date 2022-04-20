<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\KecamatanModel;
use App\Models\DesaModel;
use App\Models\RakModel;
use App\Models\WarkahModel;

class Warkah extends ResourceController
{
	protected $helpers = ['custom'];

	function __construct()
	{
		$this->kecamatan = new KecamatanModel();
		$this->desa = new DesaModel();
		$this->rak = new RakModel();
		$this->warkah = new WarkahModel();
	}

	public function index()
	{
		$data['warkah'] = $this->warkah->getAll();
		return view('warkah/index', $data);
	}

	public function new()
	{
		$data['kecamatan'] = $this->kecamatan->findAll();
		$data['desa'] = $this->desa->findAll();
		$data['rak'] = $this->rak->findAll();
		return view('warkah/new', $data);
	}

	public function create()
	{
		$data = $this->request->getPost();
		$save = $this->warkah->insert($data);
		if(!$save) {
			return redirect()->back()->withInput()->with('errors', $this->warkah->errors());
		} else {
			return redirect()->to(site_url('warkah'))->with('succes', 'Data berhasil disimpan!');
		}
	}

	public function edit($id = null)
	{
		$warkah = $this->warkah->find($id);
		if(is_object($warkah)) {
			$data['warkah'] = $warkah;
			$data['kecamatan'] = $this->kecamatan->findAll();
			$data['desa'] = $this->desa->findAll();
			$data['rak'] = $this->rak->findAll();
			return view('warkah/edit', $data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function update($id = null)
	{
		$data = $this->request->getPost();
		$save = $this->warkah->update($id, $data);
		if(!$save) {
			return redirect()->back()->withInput()->with('errors', $this->warkah->errors());
		} else {
			return redirect()->to(site_url('warkah'))->with('warning', 'Data berhasil diubah!');
		}
	}


	public function delete($id = null)
	{
		$this->warkah->delete($id);
		return redirect()->to(site_url('warkah'))->with('danger', 'Data berhasil dihapus!');
	}
}
