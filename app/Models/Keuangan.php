<?php

namespace App\Models;

use CodeIgniter\Model;

class Keuangan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username', 'fullname', 'jenis_khas', 'groups', 'deskripsi', 'nominal', 'status', 'tanggal', 'total_kas', 'created', 'modified'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'modified';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    function khas()
    {
        $builder = $this->db->table('user');
        $query = $builder->where('username', $this->session->set('username'));
        return $query->get();
    }
    public function detailKas($id = 0)
    {
        $sql = "Select * From kas WHERE id='$id'";
        $query  = $this->db->query($sql);
        $data = $query->getResultArray();
        return $data;
    }
}