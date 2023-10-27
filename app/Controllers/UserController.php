<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AdminModel;
use App\Controllers\BaseController;
use CodeIgniter\Shield\Entities\User;

class UserController extends BaseController
{
    protected $user;
    protected $token;
    protected $adminModel;
    protected $userModel;
    public function __construct()
    {
        $this->user = auth()->user();
        $this->token = csrf_hash();
        $this->userModel = new UserModel();
        $this->adminModel = new AdminModel;
    }
    public function getVariable($var)
    {
        return $this->request->getVar($var, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    public function users()
    {
        $data['title'] = 'Users';
        $data['user'] = $this->user;

        //get all companies if user is super admin and get a specific company if its not
        $companies = $this->user->inGroup('superadmin')
            ? $this->adminModel->getCompanies()
            : [
                (object) [
                    'companyId' => $this->user->company_id,
                    'companyName' => $this->adminModel->findCompany($this->user->company_id)->companyName ?? null,
                ]
            ];

        $data['companies'] =  $companies;
        $data['users'] = $this->getUsers();
        if (!$this->user->inGroup('superadmin', 'companyadmin')) return redirect()->to('dashboard');

        return view('Pages/Admin/Users', $data);
    }

    public function createUser()
    {
        try {
            // Get the User Provider (UserModel by default)
            // $users = auth()->getProvider();
            $users = $this->userModel;
            $firstName = $this->getVariable('firstName');
            $lastName = $this->getVariable('lastName');
            $userId = $this->getVariable('companyId');
            $email = $this->getVariable('email');
            $phoneNumber = $this->getVariable('phoneNumber');
            $password = $this->getVariable('password');
            $passwordConfirm = $this->getVariable('passwordConfirm');
            $userGroup = $this->getVariable('userGroup');

            $userData = new User([
                'username' => $firstName . ' ' . $lastName,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'phone_number' => $phoneNumber,
                'company_id' => $userId,
                'company_id' => $userId,
                'email'    => $email,
                'password' =>  $password,
            ]);

            // $response = [
            //     'status' => 1,
            //     'msg' => 'User Created',
            //     'token' => $this->token,
            //     'users' => $userData,
            // ];

            // return  $this->response->setJSON($response);
            if ($users->save($userData)) {
                // To get the complete user object with ID, we need to get from the database
                $user = $users->findById($users->getInsertID());

                // Add to default group
                $user->addGroup($userGroup);
                $user->activate();
                $response = [
                    'status' => 1,
                    'msg' => 'User Created',
                    'token' => $this->token,
                    'users' => $this->getUsers(),
                ];
            }
        } catch (\Throwable $th) {
            $response = [
                'status' => 0,
                'msg' => $th->getMessage(),
                'token' => $this->token,
                'users' => $this->getUsers(),
            ];
        }
        return  $this->response->setJSON($response);
    }


    public function getUsers()
    {
        $params = [];
        if ($this->user->inGroup('companyadmin')) {
            $params['company_id'] = $this->user->company_id;
        }

        $appUsers = $this->userModel->where($params)->orderBy('username', 'ASC')->findAll();

        $isAdmin = $this->user->inGroup('superadmin');

        $users = array_filter($appUsers, function ($user) use ($isAdmin) {
            $group =  !empty($user->groups) ?  $user->groups[0] :  ['xxx'];
            if ($isAdmin && $group === 'companyadmin') {
                return true;
            } elseif (!$isAdmin && $group !== 'superadmin') {
                return true;
            }
            return false;
        });



        $tr = '';
        foreach ($users as $user) {
            $group = implode(',', $user->groups);
            $company = $this->adminModel->findCompany($user->company_id);
            $companyName =  !empty($company) ? $company->companyName : 'Bitlevo';
            $active = <<<HTML
              <span class="badge bg-label-primary me-1">Active</span>       
            HTML;
            $inActive = <<<HTML
              <span class="badge bg-label-danger me-1">Inactive</span>       
            HTML;
            $status = $user->active == 1 ? $active : $inActive;
            $tr .= <<<HTML
                 <tr>
                 <td>$user->username</td>
                 <td>$companyName</td>
                 <td>$user->email</td>
                 <td>$user->phone_number</td>
                 <td>$group</td>
                 <td>$status</td>
                 
                 <td>
                     <button type="button" class="btn rounded-pill btn-sm btn-icon btn-primary" onclick="editUser('$user->id')">
                         <span class="far fa-edit"></span>
                     </button>
                     <button type="button" class="btn rounded-pill  btn-sm btn-icon btn-danger" onclick="deleteUser('$user->id')">
                         <span class="far fa-trash-alt"></span>
                     </button>


                 </td>
             </tr>   
         HTML;
        }

        $table = <<<HTML
       <table id="dataTable" class="table shorting">
         <thead>
             <tr>
                 <th>Name</th>
                 <th>Company</th>
                 <th>Email</th>
                 <th>Phone Number</th>
                 <th>User Group</th>
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


    public function editUser()
    {
        try {
            $id = $this->getVariable('id');

            $user = $this->userModel->findById($id);
            $user->group = $user->groups[0];
            $user->mail = $user->email;


            $response = [
                'status' => 1,
                'token' => $this->token,
                'user' => $user,
            ];
        } catch (\Throwable $th) {
            $response = [
                'status' => 0,
                'msg' =>  $th->getMessage(),
                'token' => $this->token,

            ];
        }

        return  $this->response->setJSON($response);
    }
    public function deleteUser()
    {
        try {
            $id = $this->getVariable('id');

            $request = $this->userModel->where(['id' => $id])->delete();
            if ($request) {
                $response = [
                    'status' => 1,
                    'msg' => 'User Deleted Successfully',
                    'token' => $this->token,
                    'users' => $this->getUsers(),
                ];
            }
        } catch (\Throwable $th) {
            $response = [
                'status' => 0,
                'msg' =>  $th->getMessage(),
                'token' => $this->token,

            ];
        }

        return  $this->response->setJSON($response);
    }
    public function updateUser()
    {
        try {
            $userId = $this->getVariable('userId');
            $firstName = $this->getVariable('firstName');
            $lastName = $this->getVariable('lastName');
            $companyId = $this->getVariable('companyId');
            $email = $this->getVariable('email');
            $phoneNumber = $this->getVariable('phoneNumber');
            $userGroup = $this->getVariable('userGroup');

            $userData = [
                'username' => $firstName . ' ' . $lastName,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'phone_number' => $phoneNumber,
                'company_id' => $companyId,
                'email'    => $email,

            ];

            $user = $this->userModel->findById($userId);

            $user->fill($userData);
            $this->userModel->save($user);
            $user->syncGroups($userGroup);



            $response = [
                'status' => 1,
                'token' => $this->token,
                'users' => $this->getUsers(),
                'msg' => 'User Updated Successfully',
            ];
        } catch (\Throwable $th) {
            $response = [
                'status' => 0,
                'msg' =>  $th->getMessage(),
                'token' => $this->token,
                'token' => $this->token,
                'users' => $this->getUsers(),

            ];
        }

        return  $this->response->setJSON($response);
    }
}
