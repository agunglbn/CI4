<?php

namespace App\Controllers;




class Users extends BaseController
{


    public function __construct()
    {
    }


    public function index()
    {
        if (in_groups('user')) {
            $data['title'] = 'Dashboard User';
            return view('User/dashboard', $data);
        } elseif (in_groups('admin')) {
            $data['title'] = 'Dashboard Admin';
            return view('Admin/dashboard', $data);
        } elseif (in_groups('parataon')) {
            $data['title'] = 'Dashboard Parataon';
            return view('User/dashboard', $data);
        } elseif (in_groups('diakonia')) {
            $data['title'] = 'Dashboard Diakonia';
            return view('User/dashboard', $data);
        } else {
            $data['title'] = 'Dashboard  User';
            return view('User/dashboard', $data);
        }
    }
    public function profile()
    {
        $data['title'] = 'Profile ';
        return view('profile', $data);
    }


    function financeDiakon()
    {
        $data = ([
            'title' => 'Finance Diakonia',
            'keuangan'  => $this->keuangan->where(['groups' => user()->groups])->orderBy('username', 'asc') //ASC dan DESC   
                ->findAll(),
            'kategori' => $this->kategori->findAll(),
            'validation' => $this->validation,

        ]);
        return view('Diakonia/finance_diakon', $data);
    }

    function inventory()
    {

        $data = ([
            'title' => 'Data Inventory Beringin Indah',
            'inventory' => $this->inventory->where(['groups' => user()->groups])->orderBy('created', 'asc') //ASC dan DESC   
                ->findAll(),
            'peminjaman' => $this->peminjaman->orderBy('created', 'asc')->findAll(),
            'validation' => $this->validation,

        ]);
        return view('Parataon/inventory', $data);
    }

    function addInventory()
    {

        // Validasi

        if (!$this->validate(
            [
                'nama_barang' =>
                [
                    'rules' => 'required|alpha_numeric_space',
                    'erros' => [
                        'required' => 'Data cannot be empty !',
                        'alpha_numeric_space' => 'Do not use symbols !!'
                    ]
                ],
                'tanggal' =>
                [
                    'rules' => 'required',
                    'erros' => [
                        'required' => 'Data cannot be empty !',

                    ]
                ],
            ]
        )) {
            session()->setFlashdata('error', 'News Data Cannot Be Changed !!!');
            return redirect()->back()->withInput();
        }

        // Input Data 
        $success = $this->inventory->insert([
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'tanggal' => $this->request->getVar('tanggal'),
            'groups' => $this->request->getVar('groups'),
        ]);

        if ($success) {
            session()->setFlashdata('success', 'Data Success Be Added !');
            return redirect()->back()->withInput();
        }
    }

    function updateInventory($id)
    {
        // Validasi

        if (!$this->validate(
            [
                'nama_barang' =>
                [
                    'rules' => 'required|alpha_numeric_space',
                    'erros' => [
                        'required' => 'Data cannot be empty !',
                        'alpha_numeric_space' => 'Do not use symbols !!'
                    ]
                ],
                'tanggal' =>
                [
                    'rules' => 'required',
                    'erros' => [
                        'required' => 'Data cannot be empty !',

                    ]
                ],
            ]
        )) {
            session()->setFlashdata('error', 'News Data Cannot Be Changed !!!');
            return redirect()->back()->withInput();
        }

        // Input Data 
        $success = $this->inventory->update($id, [
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'tanggal' => $this->request->getVar('tanggal'),
            'groups' => $this->request->getVar('groups'),

        ]);

        if ($success) {
            session()->setFlashdata('success', 'Data Success Be Added !');
            return redirect()->back()->withInput();
        }
    }

    function deleteInventory($id)
    {
        if (!$this->request->getVar('confirm_delete')) {
            // Tampilkan form konfirmasi
            return redirect()->back()->withInput();
        } else {
            // Proses delete data
            $success =  $this->inventory->where('id', $id)->delete();
            if ($success) {
                session()->setFlashdata('success', 'Data Success Be Added !');
            } else {
                session()->setFlashdata('error', 'Data Can Not Deleted !');
            }
            return redirect()->back()->withInput();
        }
    }

    // Administrasi Keuangan dan Peminjaman Parataon


    function financeParataon()
    {
        $data = ([
            'title' => 'Finance Parataon',
            'keuangan'  => $this->keuangan->where(['groups' => user()->groups])->orderBy('created', 'asc') //ASC dan DESC   
                ->findAll(),
            'kategori' => $this->kategori->findAll(),
            'validation' => $this->validation,

        ]);
        return view('Parataon/finance_parataon', $data);
    }
    public function updateStatusPeminjaman($id)
    {

        $rules = [
            'status' => 'required',
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'News Data Cannot Be Changed !!!');
            return redirect()->back()->withInput();
        }
        $success = $this->peminjaman->update($id, [
            'status' => $this->request->getVar('status'),
        ]);

        if ($success) {
            session()->setFlashdata('success', 'News Data Changed Success !!!');
            return redirect()->to(base_url('/users/inventory'));
        }
    }
}
