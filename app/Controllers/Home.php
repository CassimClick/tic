<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        
    }
    public function index(): string
    {
        $data['title'] = 'Home';
        $data['heading'] = 'TIC';

        return view('Pages/Frontend/Homepage',$data);
    }
}
