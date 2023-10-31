<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public $db;
    public $usersTable;
    public $companyTable;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->usersTable = $this->db->table('users');
        $this->companyTable = $this->db->table('companies');
    }



    public function createCompany($data){
        return $this->companyTable->insert($data);
    }

   

    public function findCompany($companyId){
        return $this->companyTable->select()->where(['companyId' =>$companyId])->get()->getRow();
    }


}
