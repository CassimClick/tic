<?php

namespace App\Controllers;


use CodeIgniter\Events\Events;
use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Controllers\RegisterController;
use CodeIgniter\Shield\Exceptions\ValidationException;
use PHPUnit\Util\Printer;

class AuthController extends RegisterController
{

    protected $userModel;
    public function __construct()
    {
        helper(['form','text']);
        $this->userModel = new UserModel();
    }

    public function getVariable($var)
    {
        return $this->request->getVar($var, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    public function register()
    {
        $data['title'] = 'Register';
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->registerRedirect());
        }

        // Check if registration is allowed
        if (!setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
                ->with('error', lang('Auth.registerDisabled'));
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }

        return $this->view('Pages/Backend/Auth/Register', $data);
    }
    public function createAccount(): RedirectResponse
    {

        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->registerRedirect());
        }

        // Check if registration is allowed
        if (!setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
                ->with('registerError', lang('Auth.registerDisabled'));
        }

        $users = $this->userModel;

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();
        //add first name and last name to the rules
        $rules['first_name'] = [
            'label'  => lang('Auth.firstNameLabel'),
            'rules'  => ['required', 'min_length[3]', 'max_length[255]'],
        ];
        $rules['last_name'] = [
            'label'  => lang('Auth.firstNameLabel'),
            'rules'  => ['required', 'min_length[3]', 'max_length[255]'],
        ];
        //remove username filld from the rules
        unset($rules['username']);

        $postData = $this->request->getPost();
        //add user_is as a random string
        $postData['unique_id'] = randomString();
        if (!$this->validateData($postData, $rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = ['first_name', 'last_name', 'email', 'password'];
        $user              = $this->getUserEntity();


        // echo '<pre>';
        // // print_r($this->request->getPost($allowedPostFields));
        // print_r($postData);
        // echo '</pre>';
        // exit;
        $user->fill($this->request->getPost($allowedPostFields));

        // Workaround for email only registration/login
        if ($user->username === null) {
            $user->username = null;
        }

        try {
            $users->save($user);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('registerError', $users->errors());
        }

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        $users->addToDefaultGroup($user);

        Events::trigger('register', $user);

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        $authenticator->startLogin($user);

        // If an action has been defined for register, start it up.
        $hasAction = $authenticator->startUpAction('register', $user);
        if ($hasAction) {
            return redirect()->to('auth/a/show');
        }

        // Set the user active
        $user->activate();

        $authenticator->completeLogin($user);

        // Success!
        return redirect()->to(config('Auth')->registerRedirect())
            ->with('message', lang('Auth.registerSuccess'));
    }



    public function login()
    {
        $data['title'] = 'Login';
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }

        return $this->view('Pages/Backend/Auth/Login',$data);
    }



    public function loginAction(): RedirectResponse
    {
        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = [
            'email' => [
                'label' => 'email',
                'rules' => 'required',
            ],
            'password' => [
                'label'  => 'Auth.password',
                'rules'  => 'required|strong_password',

            ],
        ];

        if (!$this->validateData($this->request->getPost(), $rules)) {
            return redirect()->back()->withInput()->with('validationError', $this->validator->getErrors());
        }

        $credentials             = $this->request->getPost(setting('Auth.validFields'));
        $credentials             = array_filter($credentials);
        $credentials['password'] = $this->request->getPost('password');
        $remember                = (bool) $this->request->getPost('remember');

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();



        // Attempt to login
        $result = $authenticator->remember($remember)->attempt($credentials);
        if (!$result->isOK()) {
            return redirect()->route('login')->withInput()->with('loginError', 'Invalid Credentials');
        }

        // If an action has been defined for login, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show')->withCookies();
        }

        return redirect()->to(config('Auth')->loginRedirect())->withCookies();
    }

    public function logoutAction(){
        if (auth()->loggedIn()) {
            auth()->logout();
           return redirect()->to(config('Auth')->logoutRedirect());
        }  
    }
}
