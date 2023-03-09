<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kategori';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kategori'];



    // public function getSektor()
    // {
    //     $builder = $this->db->table('sekWtor');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }


}