<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Auth extends BaseController
{
    protected $userModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url', 'session']);
    }

    public function login()
    {
        // Check if already logged in
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }

        if ($this->request->getMethod() === 'post') {
            // Manual CSRF check
            if (! $this->request->getPost('csrf_test_name') || 
                ! hash_equals(session()->get('csrf_test_name'), $this->request->getPost('csrf_test_name'))) {
                return redirect()->back()->withInput()->with('error', 'Invalid CSRF token');
            }

            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]'
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $this->userModel->where('email', $email)->first();

            if (! $user || ! password_verify($password, $user['password'])) {
                return redirect()->back()->withInput()->with('error', 'Invalid email or password');
            }

            // Set user session
            $this->setUserSession($user);

            // Redirect to appropriate page
            $redirectUrl = $user['is_admin'] ? '/admin/dashboard' : '/';
            return redirect()->to($redirectUrl)->with('message', 'Welcome back!');
        }

        $data = [
            'title' => 'Login | Luxury Motors',
            'config' => config('App')
        ];

        return view('auth/login', $data);
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            // Manual CSRF check
            if (! $this->request->getPost('csrf_test_name') || 
                ! hash_equals(session()->get('csrf_test_name'), $this->request->getPost('csrf_test_name'))) {
                return redirect()->back()->withInput()->with('error', 'Invalid CSRF token');
            }

            $rules = [
                'name' => 'required|min_length[3]|max_length[100]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]',
                'password_confirm' => 'required|matches[password]'
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $userData = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'is_admin' => ($this->userModel->countAll() === 0) ? 1 : 0,
                'created_at' => date('Y-m-d H:i:s')
            ];

            try {
                if ($this->userModel->save($userData)) {
                    return redirect()->to('/login')->with('message', 'Registration successful! Please login.');
                }
                return redirect()->back()->withInput()->with('error', 'Registration failed. Please try again.');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Registration error: ' . $e->getMessage());
            }
        }

        $data = [
            'title' => 'Register | Luxury Motors',
            'config' => config('App')
        ];

        return view('auth/register', $data);
    }

    protected function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'is_admin' => $user['is_admin'],
            'logged_in' => true
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('message', 'You have been logged out');
    }
}