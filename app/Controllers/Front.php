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
            'berita' =>  $this->berita->where('status', '1')->orderBy('created', 'desc')->limit(5) //ASC dan DESC   
                ->find(),
            'gallery' =>  $this->gallery->where('status', '1')->orderBy('created', 'desc')->limit(12) //ASC dan DESC   
                ->findAll(),
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
            'slider' => $this->berita->where('jenis_berita', '1')->orderBy('created', 'desc')->limit(3)->find(),
            'kategori' =>  $this->kategori->findAll(),
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
}
