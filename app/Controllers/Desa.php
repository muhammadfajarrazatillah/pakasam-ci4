<?php

namespace App\Controllers;

use App\Models\DesaModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Desa extends ResourcePresenter
{
	// function __construct()
	// {
	// 	$this->desa = new DesaModel();
	// }

	protected $modelName = 'App\Models\DesaModel';

	public function index()
	{
		$data['desa'] = $this->model->findAll();
		return view('desa/index', $data);
	}

	public function new()
	{
		return view('desa/new');
	}

	public function create()
	{
		$validate = $this->validate([
			'desa'				=> [
				'rules'			 =>'required',
				'errors'		=> [
						'required' => 'Desa tidak boleh kosong.',
				],
			],
		]);
		if(!$validate) {
			return redirect()->back()->withInput();
		}

		$data = $this->request->getPost();
		$this->model->insert($data);
		return redirect()->to(site_url('desa'))->with('succes', 'Data berhasil disimpan!');
	}

	public function edit($id = null)
	{
		$desa = $this->model->where('id_desa', $id)->first();
		if(is_object($desa)) {
			$data['desa'] = $desa;
			return view('desa/edit', $data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function update($id = null)
	{
		$validate = $this->validate([
			'desa'				=> [
				'rules'			 =>'required',
				'errors'		=> [
						'required' => 'Desa tidak boleh kosong',
				],
			],
		]);
		if(!$validate) {
			return redirect()->back()->withInput();
		}
		$data = $this->request->getPost();
		$this->model->update($id, $data);
		return redirect()->to(site_url('desa'))->with('warning', 'Data berhasil diubah!');
	}

	public function delete($id = null)
	{
		$this->model->delete($id);
		return redirect()->to(site_url('desa'))->with('danger', 'Data berhasil dihapus!');
	}
}
