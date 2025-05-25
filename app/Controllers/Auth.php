<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url', 'text']);
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]'
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $remember = $this->request->getPost('remember');

            $user = $this->userModel->where('email', $email)->first();

            if (!$user || !password_verify($password, $user['password'])) {
                return redirect()->back()->withInput()->with('error', 'Invalid email or password');
            }

            // Set user session
            $this->setUserSession($user);

            if ($remember) {
                $this->setRememberMe($user['id']);
            }

            // Redirect to dashboard if admin, homepage if regular user
            return redirect()->to($user['is_admin'] ? '/admin/dashboard' : '/')->with('message', 'Welcome back!');
        }

        $data = [
            'title' => 'Login | Luxury Motors'
        ];

        return view('auth/login', $data);
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[100]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]',
                'password_confirm' => 'required|matches[password]',
                'phone' => 'permit_empty|min_length[10]|max_length[20]'
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $userData = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'phone' => $this->request->getPost('phone'),
                'is_admin' => 0,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->userModel->insert($userData);

            return redirect()->to('/login')->with('message', 'Registration successful! Please login.');
        }

        $data = [
            'title' => 'Register | Luxury Motors'
        ];

        return view('auth/register', $data);
    }

    public function logout()
    {
        session()->destroy();
        $this->destroyRememberMe();
        return redirect()->to('/')->with('message', 'You have been logged out');
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

    protected function setRememberMe($userId)
    {
        $token = bin2hex(random_bytes(32));
        
        $this->userModel->update($userId, [
            'remember_token' => $token
        ]);

        $cookie = [
            'name'   => 'remember_me',
            'value'  => $token,
            'expire' => 30 * 86400, // 30 days
            'httponly' => true,
            'secure' => true
        ];

        $this->response->setCookie($cookie);
    }

    protected function destroyRememberMe()
    {
        if (isset($_COOKIE['remember_me'])) {
            $token = $_COOKIE['remember_me'];
            $user = $this->userModel->where('remember_token', $token)->first();
            
            if ($user) {
                $this->userModel->update($user['id'], ['remember_token' => null]);
            }
            
            $this->response->deleteCookie('remember_me');
        }
    }
}