<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();

        return view('users/index', ['users' => $userModel->orderBy('id', 'ASC')->findAll()]);
    }

    public function new(): string
    {
        return view('users/form', ['user' => [], 'mode' => 'new']);
    }

    public function create()
    {
        $rules = ['username' => 'required|max_length[50]|is_unique[users.username]', 'full_name' => 'required|max_length[100]'];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $userModel->insert([
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'));
    }

    public function edit(int $id): string
    {
        $user = (new UserModel())->find($id);

        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('users/form', ['user' => $user, 'mode' => 'edit']);
    }

    public function update(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = ['username' => 'required|max_length[50]', 'full_name' => 'required|max_length[100]'];
        $avatar = $this->request->getFile('avatar');

        if ($avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] = 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $usernameInUse = $userModel->where('username', $this->request->getPost('username'))->where('id !=', $id)->first();
        if ($usernameInUse !== null) {
            return redirect()->back()->withInput()->with('errors', ['username' => 'The username is already in use.']);
        }

        $data = ['username' => $this->request->getPost('username'), 'full_name' => $this->request->getPost('full_name')];

        if ($avatar !== null && $avatar->isValid() && ! $avatar->hasMoved()) {
            $avatarName = $avatar->getRandomName();
            service('image')->withFile($avatar)->fit(200, 200, 'center')->save(FCPATH . 'uploads/avatars/' . $avatarName);
            $data['avatar'] = $avatarName;
        }

        $userModel->update($id, $data);

        return redirect()->to(site_url('users'));
    }
}