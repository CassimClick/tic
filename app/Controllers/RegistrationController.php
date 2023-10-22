<?php

namespace App\Controllers;

class RegistrationController extends BaseController
{
    protected $token;
    public function __construct()
    {
        $this->token = csrf_hash();
    }

    // a method for getting variable and sanitize them to prevent xss attack
    public function getVariable($var)
    {
        return $this->request->getVar($var, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    public function index(): string
    {
        $data['title'] = 'Registration';
        $data['heading'] = 'Registration';

        return view('Pages/Frontend/Registration', $data);
    }


    public function registration()
    {
        try {
            $nationality = $this->getVariable('nationalityType');
            $formData = [
                'firstName' => $this->getVariable('firstName'),
                'middleName' => $this->getVariable('middleName'),
                'lastName' => $this->getVariable('lastName'),
                'phoneNumber' => $this->getVariable('phoneNumber'),
                'alternativePhoneNumber' => $this->getVariable('alternativePhoneNumber'),
                'companyName' => $this->getVariable('companyName'),
                'sector' => $this->getVariable('sector'),
                'nationalityType' => $nationality,
                'country' => $nationality == 'Tanzanian' ? 'Tanzania' : $this->getVariable('country'),
                'nidaNumber' => $this->getVariable('nidaNumber'),
                'passportNumber' => $this->getVariable('passportNumber'),
                'email' => $this->getVariable('email'),
                'registrationBody' => $this->getVariable('registrationBody'),
            ];

            $statusCode = 200;
            $response = [
                'status' => 0,
                'data' => $formData,
                'token' => $this->token
            ];
        } catch (\Throwable $th) {
            $statusCode = 500;
            $response = [
                'status' => 0,
                'msg' => $th->getMessage(),
                'token' => $this->token
            ];
        }
        return $this->response->setJSON($response)->setStatusCode($statusCode);
    }
}
