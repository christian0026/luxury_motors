<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AdminAuth extends Controller
{
    public function login()
    {
        if (session()->get('is_admin_logged_in')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('login');
    }

    public function loginPost()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $userModel = new UserModel();
        $admin = $userModel->getAdminByEmail($email);
        if ($admin && password_verify($password, $admin['password'])) {
            session()->set([
                'admin_id' => $admin['id'],
                'admin_name' => $admin['name'],
                'is_admin_logged_in' => true
            ]);
            return redirect()->to('/admin/dashboard');
        } else {
            return view('login', ['error' => 'Invalid email or password.']);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
} 