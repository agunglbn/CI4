<?php

namespace App\Models;

use CodeIgniter\Model;

class Berita extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'berita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username', 'role', 'judul_berita', 'isi_berita', 'slug',
        'kategori_berita', 'status', 'created', 'modified', 'img', 'jenis_berita', 'created_at', 'modified_at'
    ];

    // Dates
    protected $useTimestamps = TRUE;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'modified_at';
    protected $deletedField  = '';


    // protected $db;
    // public function __construct()
    // {
    //     $this->db = db_connect();
    // }
    public function getBerita($id = false)
    {

        $builder = $this->db->table('berita')->where('kategori_berita !=', 'Renungan')
            ->where('jenis_berita !=', 0)->where('jenis_berita !=', 3)->orderBy('kategori_berita', 'asc');
        $query = $builder->get();
        return $query->getResult();
    }

    public function detailBerita($id = 0)
    {
        // if ($slug = false) {
        //     return $this->findAll();
        // }
        // return $this->where(['slug' => $slug])->first();
        $sql = "Select * From berita WHERE id='$id'";
        $query  = $this->db->query($sql);
        $data = $query->getResultArray();
        return $data;
    }

    public function getBeritaKategori($kategori)
    {
        // return $this->select('berita.id as judul_berita,nama_kategori,username,role,isi_berita,kategori_berita,
        // created,modified,img')
        //     ->join('kategori', 'kategori.nama_kategori = berita.kategori_berita')
        //     ->where('kategori.nama_kategori')
        //     ->findAll();
        return $this->select('berita.id, berita.judul_berita,berita.isi_berita,berita.created,
             berita.kategori_berita,berita.username,berita.slug,berita.role,berita.img,berita.modified,kategori.nama_kategori')
            ->join('kategori', 'kategori.nama_kategori = berita.kategori_berita')
            ->where('kategori.nama_kategori', $kategori)->paginate(2, 'berita');
    }
    // public function getBeritaKategori($kategori)
    // {
    //     return $this->select('berita.id as judul_berita,nama_kategori,username,role,isi_berita,kategori_berita,created,modified,img')
    //         ->join('kategori', 'kategori.nama_kategori = berita.kategori_berita')
    //         ->where('kategori.nama_kategori', $kategori)
    //         ->findAll();
    // }
}
