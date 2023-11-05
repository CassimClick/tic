<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Libraries\PdfLibrary;
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

    public function reports()
    {
        $data['title'] = 'Report';

        return view('Pages/Backend/Reports', $data);
    }


    public function batchToggleApproval()
    {
        try {
            $approvalState = $this->getVariable('approvalState');
            $registerIds = $this->getVariable('registerIds');
            $text = $approvalState == 1 ? 'Approved' : 'Un-Approved';


            //  return $this->response->setJSON([
            //    'status' => 0,
            //    'data' => $registerIds,
            //    'token' => $this->token
            //  ]);
            //  exit;

            $this->registrationModel->batchUpdateRegistration($registerIds, $approvalState);
            $registeredMembers = $this->registrationModel->getRegistersByIds($registerIds);


          

            
            $registers = array_map(function($reg){
                return (object)[
                    'name' => $reg->firstName . ' '.$reg->lastName,
                    'email' => $reg->email
                ];
            },$registeredMembers);

            
            
            if($approvalState == 1){
                foreach ($registers as $register) {
                    $data['name'] = $register->name;
                    
                $message = view('Pages/EmailTemplate', $data);
                // ================Email configurations==============
                $this->email->setTo($register->email);
                $this->email->setSubject('REGISTRATION VERIFICATION');
                $this->email->setMessage($message);
                $this->email->send();
                }
              }




            if ($approvalState == 1) {

             
                    $response = [
                        'status' => 1,
                        'approval' => $text,
                        // 'data' => $register,
                        'msg' => 'Application is Approved',
                        'token' => $this->token,
                        'approvalState' => $approvalState,
                       
                        'text' => $text,
                    ];
                
              
            }else{
                $response = [
                    'status' => 1,
                    'approval' => $text,
                    // 'data' => $register,
                    'msg' => 'Application is Un-Approved',
                    'token' => $this->token,
                    'approvalState' => $approvalState,
                
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


 




    public function generateReports()
    {
         try {
            $approvalState = $this->getVariable('approvalState');
            $month = $this->getVariable('month');
            $year = $this->getVariable('year');
            
    
            $params=[
                'approved' => $approvalState,
                'MONTH(createdAt)' => $month,
                'YEAR(createdAt)' => $year,
            ];
            $registersReport = $this->registrationModel->getReport($params);
            //  return $this->response->setJSON([
            //    'status' => 0,
            //    'data' => $registersReport,
            //    'token' => $this->token,
            //    'params' => $params,
            //  ]);
            //  exit;
            $tr = '';
            foreach ($registersReport as $report) {
    
                $status  = $report->approved == 1? 'Approved' : 'Un-Approved';
    
                $tr .= <<<HTML
                        <tr>
                        <td>$report->firstName </td>
                        <td>$report->middleName </td>
                        <th>$status</th>
                        <td>$report->email </td>
                        <td>$report->companyName </td>
                        <td>$report->phoneNumber </td>
                        <td>$report->alternativePhoneNumber </td>
                        <td>$report->passportNumber </td>
                        <td>$report->nidaNumber </td>
                        <td>$report->nationalityType </td>
                        <td>$report->country </td>
                        <td>$report->areaOfInterest </td>
            
                        <td>$report->physicalAddress </td>
                        <td>$report->typeOfBusiness </td>
                        <td>$report->sector </td>
                        <td>$report->registrationBody </td>
                        <td>$report->registrationBody </td>
                     
                        <td>$report->createdAt </td>
                        
                    </tr>   
                HTML;
            }
    
            $report = <<<HTML
                <table id="basic-datatable" class="table dt-responsive nowrap table-sm">
                 <thead class="table-light">
                     <tr>
                       <th>First Name</th>
                        <th>Last Name</th>
                        <th>Status</th>
                        <th>email</th>
                        <th>Company Name</th>
                        <th>Phone Number</th>
                        <th>Alternative Phone Number</th>
                        <th>Passport Number</th>
                        <th>Nida Number</th>
                        <th>Nationality Type</th>
                        <th>country</th>
                        <th>AreaOf Interest</th>
                        <th>Physical Address</th>
                        <th>TypeOf Business</th>
                        <th>Sector</th>
                        <th>Registration Body</th>
                        <th>Status</th>
                        <th>Date</th>
    
                        </tr>
                 </thead>
                 <tbody >
                   $tr
                 
                 </tbody>
             </table>   
             HTML;
    
            $link = base_url("admin/downloadReport/$approvalState/$month/$year");
    
              $response = [
               'report' => $report,
               'token' => $this->token,
               'params' => $params,
               'link' => $link
             ];
                } catch (\Throwable $th) {
                    $response = [
                        'status' => 0,
                        'msg' => $th->getMessage(),
                        'token' => $this->token
                    ];
                }
            return $this->response->setJSON($response);
        //  exit;
    }

    public function downloadReport($approvalState,$month,$year){

        $monthName = date('F', mktime(0, 0, 0, $month, 1));
        
        $state = $approvalState == 1 ? "Approved": "Un-Approved";
        $title = "$state Applicants report $monthName $year";
        $params=[
            'approved' => $approvalState,
            'MONTH(createdAt)' => $month,
            'YEAR(createdAt)' => $year,
        ];
        $data['registers'] = $this->registrationModel->getReport($params);
        
        $pdfLibrary = new PdfLibrary();
        $pdfLibrary->renderPdf(orientation: 'L', view: 'ReportTemplates/ReportPdf', data: $data, title: $title);

    }


}
