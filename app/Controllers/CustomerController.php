<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerController extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        $data['customers'] = $customerModel->findAll();

        return view('customers/index', $data);
    }

    public function store()
    {
        $rules = [
            'full_name' => 'required|min_length[3]',
            'email'     => 'required|valid_email',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('validation', $this->validator);
        }

        $customerModel = new CustomerModel();

        $customerModel->save([
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
        ]);

        return redirect()
            ->to(base_url('index.php/customers'))
            ->with('message', 'Customer created successfully.');
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();

        $data['customer'] = $customerModel->find($id);

        if (!$data['customer']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Customer not found.'
            );
        }

        return view('customers/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required|min_length[3]',
            'email'     => 'required|valid_email',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('validation', $this->validator);
        }

        $customerModel = new CustomerModel();

        $customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
        ]);

        return redirect()
            ->to(base_url('index.php/customers'))
            ->with('message', 'Customer updated successfully.');
    }
}