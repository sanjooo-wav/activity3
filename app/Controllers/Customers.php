<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        $customerModel = new CustomerModel();

        return view('customers/index', ['customers' => $customerModel->orderBy('id', 'ASC')->findAll()]);
    }

    public function new(): string
    {
        return view('customers/form', ['customer' => [], 'mode' => 'new']);
    }

    public function create()
    {
        $rules = ['full_name' => 'required|max_length[100]', 'email' => 'required|valid_email|max_length[100]', 'phone' => 'permit_empty|max_length[20]'];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();
        $customerModel->insert([
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'));
    }

    public function edit(int $id): string
    {
        $customer = (new CustomerModel())->find($id);

        if ($customer === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('customers/form', ['customer' => $customer, 'mode' => 'edit']);
    }

    public function update(int $id)
    {
        $customerModel = new CustomerModel();

        if ($customerModel->find($id) === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = ['full_name' => 'required|max_length[100]', 'email' => 'required|valid_email|max_length[100]', 'phone' => 'permit_empty|max_length[20]'];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        ]);

        return redirect()->to(site_url('customers'));
    }
}