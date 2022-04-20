<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Kecamatan extends ResourcePresenter
{
	protected $modelName = 'App\Models\KecamatanModel';

	public function index()
	{
		$data['kecamatan'] = $this->model->findAll();
		return view('kecamatan/index', $data);
	}

	public function new()
	{
		return view('kecamatan/new');
	}

	public function create()
	{
		$validate = $this->validate([
			'kecamatan'		=> [
				'rules'			 =>'required',
				'errors'		=> [
						'required' => 'Kecamatan tidak boleh kosong.',
				],
			],
		]);
		if(!$validate) {
			return redirect()->back()->withInput();
		}
		$data = $this->request->getPost();
		$this->model->insert($data);
		return redirect()->to(site_url('kecamatan'))->with('succes', 'Data berhasil disimpan!');
	}

	public function edit($id = null)
	{
		$kecamatan = $this->model->where('id_kecamatan', $id)->first();
		if(is_object($kecamatan)) {
			$data['kecamatan'] = $kecamatan;
			return view('kecamatan/edit', $data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function update($id = null)
	{
		$validate = $this->validate([
			'kecamatan'		=> [
				'rules'			 =>'required',
				'errors'		=> [
						'required' => 'Kecamatan tidak boleh kosong',
				],
			],
		]);
		if(!$validate) {
			return redirect()->back()->withInput();
		}
		$data = $this->request->getPost();
		$this->model->update($id, $data);
		return redirect()->to(site_url('kecamatan'))->with('warning', 'Data berhasil diubah!');
	}

	public function delete($id = null)
	{
		$this->model->delete($id);
		return redirect()->to(site_url('kecamatan'))->with('danger', 'Data berhasil dihapus!');
	}
}
