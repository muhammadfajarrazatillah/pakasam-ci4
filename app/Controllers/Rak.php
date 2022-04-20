<?php

namespace App\Controllers;

use App\Models\RakModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Rak extends ResourcePresenter
{
	protected $modelName = 'App\Models\RakModel';

	public function index()
	{
		$data['rak'] = $this->model->findAll();
		return view('rak/index', $data);
	}

	public function new()
	{
		return view('rak/new');
	}

	public function create()
	{
		$data = $this->request->getPost();
		$save = $this->model->insert($data);
		if(!$save) {
			return redirect()->back()->withInput()->with('errors', $this->model->errors());
		} else {
			return redirect()->to(site_url('rak'))->with('succes', 'Data berhasil disimpan!');
		}
	}

	public function edit($id = null)
	{
		$rak = $this->model->where('id_rak', $id)->first();
		if(is_object($rak)) {
			$data['rak'] = $rak;
			return view('rak/edit', $data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function update($id = null)
	{
		$validate = $this->validate([
			'rak'		=> [
				'rules'			 =>'required',
				'errors'		=> [
						'required' => 'Rak tidak boleh kosong',
				],
			],
		]);
		if(!$validate) {
			return redirect()->back()->withInput();
		}
		$data = $this->request->getPost();
		$this->model->update($id, $data);
		return redirect()->to(site_url('rak'))->with('warning', 'Data berhasil diubah!');
	}

	public function delete($id = null)
	{
		$this->model->delete($id);
		return redirect()->to(site_url('rak'))->with('danger', 'Data berhasil dihapus!');
	}
}
