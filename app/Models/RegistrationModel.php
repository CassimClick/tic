<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model
{
    protected $db;
    protected $registrationTable;

    public function __construct()
    {

        $this->db = \Config\Database::connect(); //database connection
        $this->registrationTable = $this->db->table('registration');
    }


    //save user registration form data
    public function register($data)
    {
        return $this->registrationTable->insert($data);
    }

    //get all user registration 
    public function getRegisters(){
        return $this->registrationTable->select()->get()->getResult();
    }

}
