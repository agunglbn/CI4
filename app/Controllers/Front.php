<?php

namespace App\Controllers;

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
            'berita' =>  $this->berita->where('status', '1')->where('kategori_berita !=', 'Renungan')->where('jenis_berita !=', 0)->where('jenis_berita !=', 3)
                ->orderBy('created', 'desc')->limit(5) //ASC dan DESC   
                ->find(),
            'gallery' =>  $this->gallery->where('status', '1')->orderBy('created', 'desc')->limit(12) //ASC dan DESC   
                ->findAll(),
            'kategori' =>  $this->kategori->findAll(),
            'events' => $this->berita->where('jenis_berita', '3')->where('status', '1')->orderBy('created', 'desc')->limit(5)->find(),

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
            'stensilan' => $this->berita->where('jenis_berita', '0')->where('status', 1)->orderBy('created', 'desc')->limit(5)->find(),
            'berita' => $this->berita->where('jenis_berita !=', '0')->where('status', 1)->orderBy('created', 'desc')->paginate(5, 'recent'),
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
            // 'getkategori' =>  $query->getRow(),
        ]);
        return view('blogs/detail_kategori', $data);
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