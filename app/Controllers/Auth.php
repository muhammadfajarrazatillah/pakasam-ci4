<?php

namespace App\Controllers;

class Auth extends BaseController
{
	public function index()
	{
		return redirect()->to(site_url('login'));
	}

	public function login()
    {
        if(session('id_user')) {
            return redirect()->to(site_url('home'));
        }
		return view('auth/login');
	}

    public function loginProcess()
    {
        $post = $this->request->getPost();
        $query = $this->db->table('users')->getWhere(['username' => $post['username']]);
        $user = $query->getRow();
        if($user) {
            if(password_verify($post['password'], $user->password)) {
                $params = array(
                    'id_user' => $user->id_user,
                    'level' => $user->level,
                );
                session()->set($params);
                return redirect()->to(site_url('home'))->with('error', 'Password yang Anda masukan salah!');
            } else {
                return redirect()->back()->with('error', 'Password yang Anda masukan salah!');
            }
        } else {
            return redirect()->back()->with('error', 'Username yang Anda masukan salah!');
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('login'));
    }
}
