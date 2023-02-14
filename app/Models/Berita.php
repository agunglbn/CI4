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
        'kategori_berita', 'status', 'created', 'modified', 'img', 'jenis_berita'
    ];

    // Dates
    protected $useTimestamps = TRUE;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'modified';
    protected $deletedField  = '';


    // protected $db;
    // public function __construct()
    // {
    //     $this->db = db_connect();
    // }
    public function getBerita($id = false)
    {

        $builder = $this->db->table('berita')->where('jenis_berita', 1);
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
}
