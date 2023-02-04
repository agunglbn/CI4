<?php

namespace App\Controllers;

use App\Models\M_user;
use App\Models\Jemaat;
use App\Models\Kategori;
use App\Models\Keuangan;
use App\Models\AuthGroups;
use App\Models\Berita;
use App\Models\Divisi;
use Myth\Auth\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;
use Myth\Auth\Password;

class Admin extends BaseController
{
    protected $session;

    protected $userModel, $divisi, $keuangan, $db, $builder, $model, $jemaat, $validation, $kategori, $berita;
    public function __construct()
    {

        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->model = new M_user;
        $this->keuangan = new Keuangan;
        $this->divisi = new Divisi;
        $this->userModel = new UserModel;
        $this->berita = new Berita;
        $this->jemaat = new Jemaat;
        $this->kategori = new Kategori;
        $this->validation = \Config\Services::validation();
        helper('url', 'text');
    }




    public function index()
    {

        $data['title'] = 'Data User';
        // $users['users'] = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();


        $this->builder->select('users.id as userid,email, username,mobile,fullname,name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id=users.id');
        $this->builder->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id');
        $query =  $this->builder->get();
        $data['users'] = $query->getResult();
        return view('Admin/data_user', $data);
    }
    public function detailUser($id)
    {
        $data['title'] = 'Data User';
        // $users['users'] = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $this->builder->select('users.id as userid,email, username,user_img,mobile,fullname,name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id=users.id');
        $this->builder->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query =  $this->builder->get();
        $data['user'] = $query->getRow();
        return view('Admin/detailUser', $data);
    }

    public function newUser()
    {

        $data = [
            'title' => 'Add New User',
            'validation' => \Config\Services::validation(),
            'group_role' => $this->model->groupRole(),
            'divisi' => $this->divisi->findAll()
        ];
        return view('Admin/addNewUser', $data);
    }
    public function tambah()
    {
        //Validasi 
        $rules = $this->validate([
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'mobile' => 'required|max_length[15]',
            'fullname' =>  'required|min_length[3]',
            'password_hash'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password_hash]',
            'role' => 'required',
        ]);
        // Jika Validation Fail
        if (!$rules) {
            session()->setFlashdata('error', 'Data User Tidak Dapat Ditambahkan !!!');
            return redirect()->back()->withInput();
        }
        // Ubah Url Title

        // $slug = url_title($this->request->getVar('username'), '-', true);

        // Jika Data Valid

        $rule_role = $this->request->getVar('role');
        $this->model->withGroup($rule_role)->insert([
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'mobile' => $this->request->getVar('mobile'),
            'divisi' => $this->request->getVar('divisi'),
            'fullname' => $this->request->getVar('fullname'),
            'password_hash' => Password::hash($this->request->getVar('password_hash')),
            'active' => 1,
            'groups' => $this->request->getVar('role'),
        ]);
        // $data = [
        //     'username' => $this->request->getVar('username'),
        //     'email' => $this->request->getVar('email'),
        //     'mobile' => $this->request->getVar('mobile'),
        //     'divisi' => $this->request->getVar('divisi'),
        //     'fullname' => $this->request->getVar('fullname'),
        //     'password_hash' => password_hash('password_hash', PASSWORD_DEFAULT),
        // ];
        // $user = $this->userModel
        //     ->withGroup('admin')
        //     ->insert($data);
        return redirect()->to(base_url('/admin'))->with('success', 'Data User Berhasil Ditambahkan');
    }

    // Delete User 
    function DeleteUser($id)
    {
        $data['user'] = $this->model->where('id', $id)->delete();
        // $jemaat = $this->jemaat->find($id);
        // $this->jemaat->delete($id);
        return redirect()->back()->with('success', 'Data Success be Delete !!');
    }
    // Data Jemaat

    public function jemaat()
    {

        $data = ([
            'title' => 'Data Jemaat HKBP Beringin Indah',
            'jemaat'  => $this->jemaat->orderBy('nama_jemaat', 'asc') //ASC dan DESC   
                ->findAll(), //     $userModel->where('status', 'active')
            // ->orderBy('last_login', 'asc')
            // ->findAll();

        ]);
        return view('Diakonia/data_jemaat', $data);
    }

    public function newJemaat()
    {
        $builder = $this->db->table('sektor');
        $query = $builder->get()->getResult();
        $data = [
            'title' => 'Add New Jemaat',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategori->findAll(),
            'sektor' => $query,

        ];
        return view('Diakonia/addNewJemaat', $data);
    }
    public function addNewJemaat()
    {
        //Validasi 
        $rules = [
            'nama_jemaat' => 'required|alpha_numeric_space|min_length[3]|max_length[30]',
            'email'    => 'required|valid_email|is_unique[jemaat.email]',
            'nohp' => 'required|max_length[15]',
            'alamat' =>  'required|min_length[3]',
            'kategori' => 'required',
            'pekerjaan' => 'required',
            // 'kepala_keluarga' =>  'required|alpha_numeric_space|min_length[3]|max_length[128]',
            // 'nohp_kp' => 'required|max_length[15]',
            'sektor'     => 'required',
            'jk' => 'required',
            'pekerjaan' => 'required',
            'img' => 'uploaded[img]|max_size[img,2064]|is_image[img]|mime_in[img,image/jpeg,image/jpg,image/png]',

        ];


        $error = [
            'nama_jemaat' => [
                'required' => 'Nama jemaat tidak boleh kosong !!',
                'min_length' => 'Minimal karakter 3 huruf !!',
                'max_length' => 'Maximal Karakter 128 huruf !!'
            ],
            'email' => [
                'required' => 'Email tidak boleh kosong !!',
                'valid_email' => 'Email tidak sesuai ketentuan !!',
                'is_unique' => 'Email telah digunakan !!'
            ],
        ];
        if (!$this->validate($rules, $error)) {
            session()->setFlashdata('error', 'Data Jemaat Tidak Dapat Ditambahkan !!!');
            return redirect()->back()->withInput();
        }

        // Ubah Url Title
        // $slug_username = url_title($this->request->getVar('nama_jemaat'), '-', true);
        // Jika Data Valid
        $img = $this->request->getFile('img');
        $filename = $img->getRandomName();

        $success =  $this->jemaat->insert([
            'nama_jemaat' => $this->request->getVar('nama_jemaat'),
            'email' => $this->request->getVar('email'),
            'nohp' => $this->request->getVar('nohp'),
            'alamat' => $this->request->getVar('alamat'),
            'sektor' => $this->request->getVar('sektor'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'umur' => $this->request->getVar('umur'),
            'kepala_keluarga' => $this->request->getVar('kepala_keluarga'),
            'nohp_kp' => $this->request->getVar('nohp_kp'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'img' => $filename,

        ]);
        $img->move('assets/vendors/images', $filename);
        if ($success) {
            session()->setFlashdata('success', 'Data Jemaat Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/admin/jemaat'));
        }
    }

    public function detailJemaat($id)
    {
        $data = ([
            'title' => 'Detail Dan Edit Jemaat',
            'jemaat'  => $this->jemaat->detailJemaat($id),
            'kategori' => $this->kategori->findAll(),
            'validation' => \Config\Services::validation(),

        ]);
        if (empty($data['jemaat'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data' . $id . 'Tidak Ditemukan');
        }
        // dd($data);

        return view('Diakonia/detail_jemaat', $data);
    }

    public function updateJemaat($id = 0)
    {
        //Cek Email 
        $email = $this->jemaat->find($id, ($this->request->getVar('email')));
        if ($email['email'] == $this->request->getVar('email')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|valid_email|is_unique[jemaat.email]';
        }

        //Validasi 
        $rules = [
            'nama_jemaat' => 'required|alpha_numeric_space|min_length[3]|max_length[128]',
            'email'    => $rule_email,
            'nohp' => 'required|max_length[15]',
            'alamat' =>  'required|min_length[3]',
            'sektor'     => 'required',
            'jk' => 'required',
            'kategori' => 'required',
            'pekerjaan' => 'required',
            'kepala_keluarga' =>  'required|alpha_numeric_space|min_length[3]|max_length[128]',
            'nohp_kp' => 'required|max_length[15]',
            'img' => 'max_size[img,2064]|is_image[img]|mime_in[img,image/jpeg,image/jpg,image/png]',

        ];

        $error = [
            'nama_jemaat' => [
                'required' => 'Nama jemaat tidak boleh kosong !!',
                'min_length' => 'Minimal karakter 3 huruf !!',
                'max_length' => 'Maximal Karakter 128 huruf !!'
            ],

            'email' => [
                'required' => 'Email Tidak Boleh Kosong !!',
                'is_unique' => 'Email telah digunakan, gunakan email yang lain !!',
                'valid_email' => 'Email yang digunakan tidak sesuai !!'
            ],
            'img' => [
                'is_image' => 'Gambar tidak sesuai !!',
                'max_size' => 'Ukuran gambar Maximal 2 Mb !!!',
                'mime_in' => 'Gambar harus jpg/jpeg/png !!',
            ],

        ];


        if (!$this->validate($rules, $error)) {
            session()->setFlashdata('error', 'Data Jemaat Tidak Dapat Diubah !!!');
            return redirect()->back()->withInput();
        }

        // Ubah Url Title
        // $slug_username = url_title($this->request->getVar('nama_jemaat'), '-', true);

        // Jika Data Valid
        $img = $this->request->getFile('img');
        $rule_img = $this->jemaat->find($id);
        // Validasi Gambar diubah atau tidak
        if ($img->getError() == 4) {
            $filename = $this->request->getVar('gambar_lama');
        } else if ($rule_img['img'] == null) {
            $filename = $img->getRandomName();
            // Arahkan Gambar Ke Direktori
            $img->move('assets/vendors/images', $filename);
        } else {
            $filename = $img->getRandomName();

            // Arahkan Gambar Ke Direktori
            $img->move('assets/vendors/images', $filename);

            // Hapus Gambar Lama
            unlink('assets/vendors/images/' . $this->request->getPost('gambar_lama'));
        }


        $success =  $this->jemaat->update($id, [
            'nama_jemaat' => $this->request->getVar('nama_jemaat'),
            'email' => $this->request->getVar('email'),
            'nohp' => $this->request->getVar('nohp'),
            'alamat' => $this->request->getVar('alamat'),
            'sektor' => $this->request->getVar('sektor'),
            'kategori' => $this->request->getVar('kategori'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'umur' => $this->request->getVar('umur'),
            'nohp_kp' => $this->request->getVar('nohp_kp'),
            'kepala_keluarga' => $this->request->getVar('kepala_keluarga'),
            'img' => $filename,

        ]);

        if ($success) {
            session()->setFlashdata('success', 'Data Jemaat Berhasil Diubah!!');
            return redirect()->to(base_url('/admin/jemaat'));
        }
    }

    public function deleteJemaat($id = null)
    {
        $data['jemaat'] = $this->jemaat->where('id', $id)->delete();
        // $jemaat = $this->jemaat->find($id);
        // $this->jemaat->delete($id);
        return redirect()->back()->with('success', 'Data Jemaat Berhasil Dihapus !!');
    }

    // Berita

    public function berita()
    {
        $data = ([
            'title' => 'Data Berita',
            'berita' => $this->berita->getBerita(),

        ]);
        return view('admin/berita', $data);
    }

    public function formBerita()
    {
        $data = ([
            'title' => 'Form Tambah Berita',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategori->findAll(),
        ]);
        return view('admin/AddNewBerita', $data);
    }

    public function TambahBerita()
    {
        // Validasi Form Data
        $rules = [
            'judul_berita' => 'required|alpha_numeric_space',
            'isi_berita' => 'required',
            'kategori_berita' => 'required',
            'img' => 'uploaded[img]|max_size[img,2064]|is_image[img]|mime_in[img,image/jpeg,image/jpg,image/png]',
            'status' => 'required',


        ];
        $error = [
            'judul_berita' => [
                'required' => 'Judul Berita tidak boleh kosong !!',
            ],

            'isi_berita' => [
                'required' => 'Isi Berita tidak boleh kosong !!',
            ],
            'kategori' => [
                'required' => 'Kategori Berita tidak boleh kosong !!',
            ],
            'img' => [
                'uploaded' => 'Gambar tidak boleh kosong !!',
                'max_size' => 'Ukuran gambar Maximal 2 Mb !!!',
                'mime_in' => 'Gambar harus jpg/jpeg/png !!',
            ],
            'status' => [
                'required' => 'Status tidak boleh kosong !!',

            ]
        ];

        if (!$this->validate($rules, $error)) {
            session()->setFlashdata('error', 'Data Berita Tidak Dapat Ditambahkan !!!');
            return redirect()->back()->withInput();
        }
        $img = $this->request->getFile('img');
        $filename = $img->getRandomName();
        $slug_username = url_title($this->request->getVar('judul_berita'), '-', true);

        // Kiri Field Database Kanan Field Name Form 
        $success =  $this->berita->insert([
            'username' => $this->request->getVar('username'),
            'slug' => $slug_username,
            'role' => $this->request->getVar('user'),
            'judul_berita' => $this->request->getVar('judul_berita'),
            'isi_berita' => $this->request->getVar('isi_berita'),
            'kategori_berita' => $this->request->getVar('kategori_berita'),
            'status' => $this->request->getVar('status'),
            'img' => $filename,
        ]);
        $img->move('assets/vendors/img_berita/', $filename);
        // $img->move('assets/vendors/img_berita/', $filename);
        // $builder = $this->db->table("berita");
        // $success = $builder->insert($data);
        // $success = $this->berita->insert_berita($data);
        if ($success) {
            session()->setFlashdata('success', 'Data Berita Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/admin/berita'));
        }
    }

    // Detail Berita 
    public function detailBerita($id)
    {

        $data = ([
            'title' => 'Detail Berita',
            'berita'  => $this->berita->detailBerita($id),
            'kategori' => $this->kategori->findAll(),
            'validation' => \Config\Services::validation(),

        ]);
        if (empty($data['berita'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data' . $id . 'NOT FOUND !!');
        }
        // dd($data);

        return view('Admin/detail_berita', $data);
    }

    public function deleteBerita($id = null)
    {
        $this->berita->delete($id);
        session()->setFlashdata('success', 'News Data Success Deleted!!');
        return redirect()->to('/admin/berita');
    }
    public function updateStatusBerita($id)
    {

        $rules = [
            'status' => 'required',
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'News Data Cannot Be Changed !!!');
            return redirect()->back()->withInput();
        }
        $success = $this->berita->update($id, [
            'status' => $this->request->getVar('status'),
        ]);

        if ($success) {
            session()->setFlashdata('success', 'News Data Changed Success !!!');
            return redirect()->to(base_url('/admin/berita'));
        }
    }


    public function formUpdateBerita($id = null)
    {
        $data = ([
            'title' => 'Detail Berita',
            'berita'  =>  $this->berita->detailBerita($id),
            'kategori' => $this->kategori->findAll(),
            'validation' => $this->validation,

        ]);
        if (empty($data['berita'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data' . $id . 'Tidak Ditemukan');
        }
        // dd($data);

        return view('Admin/updateBerita', $data);
    }

    public function updateBerita($id = 0)
    {
        //Validasi 
        if (!$this->validate(
            [
                'judul_berita' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Judul Berita Data tidak boleh kosong !',
                        'alpha_numeric_punct' => 'Gunakan Tanda Penghubung yang sesuai !'
                    ]
                ],
                'isi_berita' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Isi Berita Tidak Boleh Kosong !'
                    ],
                ],
                'img' => [
                    'rules' => 'max_size[img,2064]|is_image[img]|mime_in[img,image/jpeg,image/jpg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar tidak boleh melebihi 2Mb !',
                        'is_image' => 'Jenis file tidak sesuai gunakan format jpg/jpeg/png !',
                        'mime_in' => 'File tidak sesuai format ketentuan !'
                    ]
                ]

            ]
        )) {
            session()->setFlashdata('error', 'News Data Cannot Be Changed !!!');
            return redirect()->back()->withInput();
        }

        $img = $this->request->getFile('img');
        $rule_img = $this->berita->find($id);

        // Validasi Gambar diubah atau tidak
        if ($img->getError() == 4) {
            $filename = $this->request->getVar('gambar_lama');
        } else if ($rule_img['img'] == null) {

            $filename = $img->getRandomName();
            // Arahkan Gambar Ke Direktori
            $img->move('assets/vendors/img_berita', $filename);
        } else {
            $filename = $img->getRandomName();

            // Arahkan Gambar Ke Direktori
            $img->move('assets/vendors/img_berita', $filename);

            // Hapus Gambar Lama
            unlink('assets/vendors/img_berita/' . $this->request->getPost('gambar_lama'));
        }


        $success =  $this->berita->update($id, [
            'usename' => $this->request->getVar('username'),
            'judul_berita' => $this->request->getVar('judul_berita'),
            'isi_berita' => $this->request->getVar('isi_berita'),
            'kategori_berita' => $this->request->getVar('kategori_berita'),
            'status' => $this->request->getVar('status'),
            'img' => $filename,

        ]);

        if ($success) {
            session()->setFlashdata('success', 'News Data Changed Success!!');
            return redirect()->to(base_url('/admin/berita'));
        }
    }

    //  Keuangan //

    public function kas()
    {
        // $total = $this->db->table('kas')->select('(SELECT SUM(kas.nominal) FROM kas WHERE kas.jenis_khas=2) AS total', false);
        // $query = $total->get();
        $pengeluaran = $this->keuangan->where('jenis_khas', 2,)->where('status', 2)->select('sum(nominal) as total')->first();
        $pemasukan = $this->keuangan->where('jenis_khas', 1)->select('sum(nominal) as total')->first();


        $data = ([
            'title' => 'Data Kas Beringin Indah',
            'keuangan'  => $this->keuangan->where('jenis_khas', 1)->orderBy('created', 'desc') //ASC dan DESC   
                ->findAll(),
            // 'keuangan'  => $this->keuangan->where(['username' => user()->username])->orderBy('username', 'asc') //ASC dan DESC   
            //     ->findAll(),
            'pengeluaran' => $this->keuangan->where('jenis_khas', 2)->orderBy('created', 'desc') //ASC dan DESC   
                ->findAll(),

            'total_pengeluaran' => $pengeluaran['total'],
            'total_pemasukan' => $pemasukan['total'],
            'total_kas' => $pemasukan['total'] - $pengeluaran['total'],
            'kategori' => $this->kategori->findAll(),
            'validation' => $this->validation,

        ]);
        return view('Admin/keuangan', $data);
    }

    public function TambahKhas()
    {

        //Validasi 
        if (!$this->validate(
            [
                'jenis_khas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Silahkan Piliha Salah Satu !',
                    ]
                ],
                'deskripsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Data Tidak Boleh Kosong !'
                    ],
                ],
                'nominal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nilai Tidak Boleh Kosong !'
                    ],
                ],
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Tidak Boleh Kosong !'
                    ],
                ],
                // 'img' => [
                //     'rules' => 'max_size[img,2064]|is_image[img]|mime_in[img,image/jpeg,image/jpg,image/png]',
                //     'errors' => [
                //         'max_size' => 'Ukuran gambar tidak boleh melebihi 2Mb !',
                //         'is_image' => 'Jenis file tidak sesuai gunakan format jpg/jpeg/png !',
                //         'mime_in' => 'File tidak sesuai format ketentuan !'
                //     ]
                // ]

            ]
        )) {
            session()->setFlashdata('error', 'Data cannot be added !!!');
            return redirect()->back()->withInput();
        }
        //<?php echo number_format($khas['nominal'], 0, ',', '.'); --> nampilkan Data Number
        $success =  $this->keuangan->insert([
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'jenis_khas' => $this->request->getVar('jenis_khas'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'nominal' =>  str_replace(".", "", $this->request->getVar('nominal')), //Mengubah Tanda Titik Menjadi Integer
            'tanggal' => $this->request->getVar('tanggal'),
            'groups' => $this->request->getVar('groups'),

        ]);

        if ($success) {
            session()->setFlashdata('success', 'Data Success be added !!!');
            return redirect()->back()->withInput();
        }
    }

    public function UpdateKas($id)
    {
        //Validasi 
        if (!$this->validate(
            [
                'jenis_khas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Silahkan Piliha Salah Satu !',
                    ]
                ],
                'deskripsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Data Tidak Boleh Kosong !'
                    ],
                ],
                'nominal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nilai Tidak Boleh Kosong !'
                    ],
                ],
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Tidak Boleh Kosong !'
                    ],
                ],
                // 'img' => [
                //     'rules' => 'max_size[img,2064]|is_image[img]|mime_in[img,image/jpeg,image/jpg,image/png]',
                //     'errors' => [
                //         'max_size' => 'Ukuran gambar tidak boleh melebihi 2Mb !',
                //         'is_image' => 'Jenis file tidak sesuai gunakan format jpg/jpeg/png !',
                //         'mime_in' => 'File tidak sesuai format ketentuan !'
                //     ]
                // ]

            ]
        )) {
            session()->setFlashdata('error', 'Data cannot be Updated !!');
            return redirect()->back()->withInput();
        }
        //<?php echo number_format($khas['nominal'], 0, ',', '.'); --> nampilkan Data Number
        $success =  $this->keuangan->update($id, [
            'fullname' => $this->request->getVar('fullname'),
            'jenis_khas' => $this->request->getVar('jenis_khas'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'nominal' =>  str_replace(".", "", $this->request->getVar('nominal')), //Mengubah Tanda Titik Menjadi Integer
            'tanggal' => $this->request->getVar('tanggal'),
            'groups' => $this->request->getVar('groups'),
        ]);

        if ($success) {
            session()->setFlashdata('success', 'Data Success be Updated !!');
            return redirect()->back()->withInput();
        }
    }

    public function deleteKas($id)
    {
        if (!$this->request->getVar('confirm_delete')) {
            // Tampilkan form konfirmasi
            return redirect()->back()->withInput();
        } else {
            // Proses delete data
            $success =  $this->keuangan->where('id', $id)->delete();
            if ($success) {
                session()->setFlashdata('success', 'Data Success Be Added !');
            } else {
                session()->setFlashdata('error', 'Data Can Not Deleted !');
            }
            return redirect()->back()->withInput();
        }
    }

    function updateStatusKas($id)
    {
        $rules = [
            'status' => 'required',
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data Cannot Be Changed !!!');
            return redirect()->back()->withInput();
        }
        $success = $this->keuangan->update($id, [
            'status' => $this->request->getVar('status'),
        ]);

        if ($success) {
            session()->setFlashdata('success', 'Data Changed Success !!!');
            return redirect()->to(base_url('/Kas'));
        }
    }

    // Belajar Looping
    // function looping()
    // {
    //     for ($i = 1; $i <= 100; $i++) {
    //         if ($i % 3 == 0 && $i % 5 == 0) {
    //             echo "Fazz bazz<br>";
    //         } elseif ($i % 3 == 0) {
    //             echo "Fazz<br> ";
    //         } elseif ($i % 5 == 0) {
    //             echo "Bazz<br>";
    //         } else {
    //             echo "$i<br>";
    //         }
    //     }
    // }
}