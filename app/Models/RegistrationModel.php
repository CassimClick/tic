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
    public function getRegisters()
    {
        return $this->registrationTable->select()->get()->getResult();
    }
    //get all user registration 
    public function getRegistersByIds($ids)
    {
        return $this->registrationTable->select()->whereIn('id',$ids)->get()->getResult();
    }
    //get all user registration 
    public function getReport($params)
    {
        return $this->registrationTable->select()->where($params)->get()->getResult();
    }

    //get single reg data
    public function getRegister($id)
    {
        return $this->registrationTable->select()->where(['id' => $id])->get()->getRow();
    }

    //updating application approval status
    public function updateRegistration($id, $approvalState)
    {
        return $this->registrationTable->set(['approved' => $approvalState])->where(['id' => $id])->update();
    }
    //updating application approval status
    public function batchUpdateRegistration($ids, $approvalState)
    {
        return $this->registrationTable->set(['approved' => $approvalState])->whereIn('id' , $ids)->update();
    }

   
}
