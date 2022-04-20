<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Users extends ResourcePresenter
{
	protected $modelName = 'App\Models\UsersModel';

	public function index()
	{
		$data['users'] = $this->model->findAll();
		return view('users/index', $data);
	}

	public function new()
	{
		return view('users/new');
	}

	public function create()
	{
		$data = $this->request->getPost();
		$save = $this->model->insert($data);
		if(!$save) {
			return redirect()->back()->withInput()->with('errors', $this->model->errors());
		} else {
			return redirect()->to(site_url('users'))->with('succes', 'Data berhasil disimpan!');
		}
	}

	public function edit($id = null)
	{
		$users = $this->model->where('id_user', $id)->first();
		if(is_object($users)) {
			$data['users'] = $users;
			return view('users/edit', $data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function update($id = null)
	{
		$data = $this->request->getPost();
		$save = $this->model->update($id, $data);
		if(!$save) {
			return redirect()->back()->withInput()->with('errors', $this->model->errors());
		} else {
			return redirect()->to(site_url('users'))->with('warning', 'Data berhasil diubah!');
		}
	}

	public function delete($id = null)
	{
		$this->model->delete($id);
		return redirect()->to(site_url('users'))->with('danger', 'Data berhasil dihapus!');
	}
}
