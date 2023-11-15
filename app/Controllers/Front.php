<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Front extends BaseController
{
    protected $db;
    public function __construct()
    {

        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('berita');
        $pager = \Config\Services::pager();
    }
    public function index()
    {
        $data = ([
            'gereja' => $this->berita->where('status', '1')->where('jenis_berita =', 10)->find(),
            'berita' =>  $this->berita->where('status', '1')
                ->where('kategori_berita !=', 'Renungan')->where('jenis_berita !=', 0)->where('jenis_berita !=', '10')
                ->where('jenis_berita !=', 3)
                ->orderBy('created', 'desc')->limit(5) //ASC dan DESC   
                ->find(),
            'gallery' =>  $this->gallery->where('status', '1')->orderBy('created', 'desc')->limit(12) //ASC dan DESC   
                ->findAll(),
            'kategori' =>  $this->kategori->findAll(),
            'events' => $this->berita->where('jenis_berita', '3')->where('status', '1')
                ->orderBy('created', 'desc')->limit(5)->findall(),
            'validation' => \Config\Services::validation(),


        ]);
        return view('front/content', $data);
    }

    public function blogs()
    {
        // $this->builder = $this->db->table('kategori');
        // $this->builder->select('kategori.id as id, judul_berita,nama_kategori,username,role,isi_berita,kategori_berita,
        // created,modified,img');
        // $this->builder->join('berita', 'berita.kategori_berita = kategori.nama_kategori');
        // $query =  $this->builder->get();
        $data = ([
            'slider' => $this->berita->where('jenis_berita', '1')->where('status', 1)->orderBy('created', 'desc')->limit(3)->find(),
            'kategori' =>  $this->kategori->findAll(),
            'stensilan' => $this->berita->where('jenis_berita', '0')->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->find(),
            'berita' => $this->berita->where('jenis_berita !=', '0')->where('jenis_berita !=', '10')->where('status', 1)->orderBy('created', 'desc')->paginate(5, 'recent'),
            'pager' => $this->berita->pager,


        ]);
        return view('blogs/content', $data);
    }


    public function detailKategori($kategori = null)
    {
        // $this->builder->select('berita.id as id, judul_berita,nama_kategori,username,role,isi_berita,kategori_berita,
        // created,modified,img');
        // $this->builder->join('kategori', 'kategori.nama_kategori = berita.kategori_berita');
        // $this->builder->where('nama_kategori', $kategori);
        // $query =  $this->builder->get();

        $data = ([
            // 'slider' => $this->berita->where('jenis_berita', '1')->orderBy('created', 'desc')->limit(3)->find(),
            'getkategori' =>  $this->berita->getBeritaKategori($kategori),
            'pager' => $this->berita->pager,
            'kategori' =>  $this->kategori->findAll(),
            'stensilan' => $this->berita->where('jenis_berita', '0')->where('status', 1)->orderBy('created', 'desc')->limit(5)->find(),

            // 'getkategori' =>  $query->getRow(),
        ]);
        return view('blogs/detail_kategori', $data);
    }
    public function warta()
    {

        $data = ([
            // 'slider' => $this->berita->where('jenis_berita', '1')->orderBy('created', 'desc')->limit(3)->find(),
            'stensilan' => $this->berita->getWarta(),
            'pager' => $this->berita->pager,
            'kategori' =>  $this->kategori->findAll(),
            // 'stensilan' => $this->berita->where('jenis_berita', '0')->where('status', 1)->orderBy('created', 'desc')->limit(5)->find(),
            'lastnews' => $this->berita->where('jenis_berita !=0')->where('kategori_berita !=', 'Renungan')->where('jenis_berita !=', '10')
                ->orderBy('created_at', 'desc')->limit(5)->find(),
            // 'getkategori' =>  $query->getRow(),
        ]);
        return view('blogs/warta', $data);
    }
    public function downloadwarta($id)
    {
        $data = $this->berita->find($id);
        return $this->response->download('assets/vendors/img_berita/stensilan/' . $data['img'], null);
    }
    public function detailBerita($id = null)
    {
        $data = ([
            'kategori' =>  $this->kategori->findAll(),
            'stensilan' => $this->berita->where('jenis_berita', '0')->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->find(),
            'berita' => $this->berita->detailBerita($id),
            'lastnews' => $this->berita->where('jenis_berita !=0')->where('kategori_berita !=', 'Renungan')->where('jenis_berita !=', '10')
                ->orderBy('created_at', 'desc')->limit(5)->find(),

        ]);
        return view('blogs/detail_berita', $data);
    }

    public function message()
    {

        // Mendapatkan alamat IP pengguna saat ini
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        // Validasi Form Kritik
        if (!$this->validate(
            [
                'name' => [
                    'rules' => 'required|alpha_numeric_space|max_length[60]|min_length[3]',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong !',
                        'alpha_numeric_space' => 'Gunakan karakter tampa tanda spesial !',
                        'max_length' => 'Penggunaan karakter nama terlalu panjang Max 60 !',
                        'min_length' => 'Penggunaan karakter nama terlalu pendek Min 3!'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email|',
                    'errors' => [
                        'required' => 'Email tidak boleh kosong !',
                        'valid_email' => 'Email yang dimasukkan tidak valid !'

                    ]
                ],
                'message' => [
                    'rules' => 'required|alpha_numeric_space|max_length[100]',
                    'errors' => [
                        'required' => 'Pesan tidak boleh kosong !',
                        'alpha_numeric_space' => 'Gunakan karakter tampa tanda spesial !',
                        'max_length' => 'Penggunaan karakter nama terlalu panjang Max 100 !',
                    ]
                ],
            ]
        )) {
            session()->setFlashdata('error', 'Silahkan isi dengan benar !');
            return redirect()->back()->withInput();
        }
        // Memeriksa apakah pengguna sudah mengisi form pada hari ini
        $today = date('Y-m-d');
        $previousSubmission = $this->responses->where('ip_address', $ipAddress)
            ->where('tanggal', $today)
            ->first();

        if ($previousSubmission) {
            // Jika pengguna telah mengisi form hari ini, tampilkan pesan error atau arahkan ke halaman lain
            return redirect()->back()->with('error', 'Anda telah mengisi form hari ini.');
        }
        $salt = uniqid('', true);
        $succes = $this->responses->insert([
            'salt' => $salt,
            'nama' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'subject' => $this->request->getVar('subject'),
            'message' => htmlspecialchars($this->request->getVar('message')),
            'ip_address' => $ipAddress,
            'tanggal' => $today,
        ]);

        if ($succes) {
            session()->setFlashdata('success', 'Saran anda telah dikirim Terimakasih !');
            return redirect()->to(base_url('/front'));
        }
    }

    public function tes()
    {
        $dateString = '2023-05-20 15:30:00';
        $time = new Time($dateString);
        $day = $time->format('F');
        echo $day;  // Contoh: Kamis
    }
    // public function tescoding()
    // {
    // $tes = "Total Pembelian Bulan ini Rp. 625.000";

    // $x = explode(" ", $tes);
    // //print_r($x);
    // echo $x[5];

    // Menghitung Nilai 7
    // $output = 0;
    // for ($i = 0; $i <= 1000; $i++) {
    //     $nilai = str_split($i);
    //     for ($a = 0; $a < count($nilai); $a++) {
    //         if ($nilai[$a] == 7) {
    //             $output++;
    //             echo $i . "<br/>";
    //         }
    //     }
    // }
    // echo $output;


    // }
}