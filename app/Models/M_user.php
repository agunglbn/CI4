<?php

namespace App\Models;

use CodeIgniter\Model;
use Faker\Generator;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Entities\User;

class M_user extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields  = [
        'email', 'username', 'fullname', 'mobile', 'groups', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at', 'salt', 'user_img'
    ];
    protected $afterInsert        = ['addToGroup'];
    protected $useTimestamps   = true;
    protected $assignGroup;

    public function createUser($data)
    {
        return $this->db->table('users')->insert($data);
    }

    public function withGroup(String $groupName)
    {
        $group = $this->db->table('auth_groups')->where('name', $groupName)->get()->getFirstRow();

        $this->assignGroup = $group->id;

        return $this;
    }
    protected function addToGroup($data)
    {
        if (is_numeric($this->assignGroup)) {
            $groupModel = model(GroupModel::class);
            $groupModel->addUserToGroup($data['id'], $this->assignGroup);
        }

        return $data;
    }
    public function groupRole()
    {
        $sql = "Select * From auth_groups";
        $query  = $this->db->query($sql);
        $data = $query->getResultArray();
        return $data;
    }
}
