<?php

use App\Models\ProfileModel;

  function company(){
    $profileModel = new ProfileModel();
    $company = $profileModel->findCompany();
    return $company;
  }

?>