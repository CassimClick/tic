<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\RegistrationModel;
use App\Controllers\BaseController;

class AdminController extends BaseController
{
    protected $user;
    protected $token;
    protected $adminModel;
    protected $registrationModel;
    protected $email;
    public function __construct()
    {
        $this->user = auth()->user();
        $this->token = csrf_hash();
        $this->adminModel = new AdminModel;
        $this->registrationModel = new RegistrationModel();
        $this->email = \Config\Services::email();
    }
    public function getVariable($var)
    {
        return $this->request->getVar($var, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $registers = $this->registrationModel->getRegisters();
        $approved = array_filter($registers, fn ($reg) => $reg->approved == 1);
        $unApproved = array_filter($registers, fn ($reg) => $reg->approved == 0);
        $data['allRegistrations'] = count($registers);
        $data['approved'] = count($approved);
        $data['unApproved'] = count($unApproved);
        return view('Pages/Backend/Dashboard', $data);
    }

    public function registrations()
    {
        $data['title'] = 'Registrations';
        $data['registers'] = $this->registrationModel->getRegisters();
        return view('Pages/Backend/Registrations', $data);
    }


    public function toggleApproval()
    {
        try {
            $id = $this->getVariable('id');
            $index = $this->getVariable('index');
            $approvalState = $this->getVariable('approvalState');
            $text = $approvalState == 1 ? 'Approved' : 'Un-Approved';

            $this->registrationModel->updateRegistration($id, $approvalState);
            $register = $this->registrationModel->getRegister($id);
            $data['name'] = $register->firstName . ' ' . $register->lastName;

            $message = view('Pages/EmailTemplate', $data);

            if ($register->approved == 1) {
                $buttonLabel = 'Decline';
                $state = 0;
                $className = 'btn-danger';
            } else {
                $buttonLabel = 'Accept';
                $state = 1;
                $className = 'btn-success';
            }

            $button = <<<HTML
            <button type="button" id="actionButton" class="btn $className btn-sm" onclick="toggleApproval('$index','$register->id','$state')">
                   $buttonLabel
                </button>       
        HTML;



            // ================Email configurations==============
            $this->email->setTo($register->email);
            $this->email->setSubject('REGISTRATION VERIFICATION');
            $this->email->setMessage($message);
            if ($register->approved == 1) {

                if ($this->email->send()) {
                    $response = [
                        'status' => 1,
                        'approval' => $text,
                        'data' => $register,
                        'msg' => 'Application is Approved',
                        'token' => $this->token,
                        'approvalState' => $approvalState,
                        'button' => $button,
                        'text' => $text,
                    ];
                } else {
                    $response = [
                        'status' => 0,
                        'button' => $button,
                        'msg' => 'Email Was Not Sent',
                        'token' => $this->token,
                    ];
                }
              
            }else{
                $response = [
                    'status' => 1,
                    'approval' => $text,
                    'data' => $register,
                    'msg' => 'Application is Un-Approved',
                    'token' => $this->token,
                    'approvalState' => $approvalState,
                    'button' => $button,
                    'text' => $text,
                ];
            }


        } catch (\Throwable $th) {
            $response = [
                'status' => 0,
                'msg' => $th->getMessage(),
                'trace' => $th->getTrace(),
                'token' => $this->token,
                'approvalState' => $approvalState,

            ];
        }
        return $this->response->setJSON($response);
    }




    public function getCompanies()
    {
        $companies = $this->adminModel->getCompanies();
        $tr = '';
        foreach ($companies as $company) {



            $tr .= <<<HTML
                    <tr>
                    <td>$company->companyName</td>
                    <td>$company->region</td>
                    <td>$company->phoneNumber</td>
                    <td>$company->email</td>
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td>
                        <button type="button" class="btn rounded-pill btn-sm btn-icon btn-primary" onclick="editCompany('$company->companyId')">
                            <span class="far fa-edit"></span>
                        </button>
                        <button type="button" class="btn rounded-pill  btn-sm btn-icon btn-danger" onclick="deleteCompany('$company->companyId')">
                            <span class="far fa-trash-alt"></span>
                        </button>


                    </td>
                </tr>   
            HTML;
        }

        $table = <<<HTML
            <table id="dataTable" class="table shorting">
             <thead class="table-light">
                 <tr>
                     <th>Company Name</th>
                     <th>Region</th>
                     <th>Phone Number</th>
                     <th>Email</th>
                     <th>Status</th>
                     <th>Action</th>

                    </tr>
             </thead>
             <tbody >
               $tr
             
             </tbody>
         </table>   
         HTML;



        return $table;
    }

    public function sendMail()
    {
        $msg = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxLorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, mollitia.';
        sendEmail('cassims44@gmail.com', 'Hello World', $msg);
    }
}
