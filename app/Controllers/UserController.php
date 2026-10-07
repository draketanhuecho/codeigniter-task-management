<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('users/index', $data);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        $rules = [
            'username'  => 'required|is_unique[users.username]',
            'full_name' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $userModel = new UserModel();
        $userModel->save([
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ]);

        return redirect()->to('/users')->with('message', 'User created successfully.');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        if (!$data['user']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("User not found.");
        }

        return view('users/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required',
            'avatar'    => 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $userModel = new UserModel();
        $userData = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        $file = $this->request->getFile('avatar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $targetPath = FCPATH . 'uploads/';
            
            $file->move($targetPath, $newName);

            \Config\Services::image()
                ->withFile($targetPath . $newName)
                ->resize(150, 150, true, 'height')
                ->save($targetPath . $newName);

            $userData['avatar'] = $newName;
        }

        $userModel->update($id, $userData);

        return redirect()->to('/users')->with('message', 'User profile updated successfully.');
    }
}