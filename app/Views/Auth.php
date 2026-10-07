<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        // Kung naka-login na, i-redirect agad sa customers dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/customers');
        }

        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Hanapin ang user sa database gamit ang username
        $user = $model->where('username', $username)->first();

        if ($user) {
            // Verify ang plaintext password laban sa stored hashed password
            if (password_verify($password, $user['password'])) {
                // Regenerate session ID para sa security (Session Fixation Prevention)
                $session->regenerate(true);

                // Set session data
                $sessionData = [
                    'user_id'    => $user['id'],
                    'username'   => $user['username'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);

                return redirect()->to('/customers');
            }
        }

        // Kapag mali ang username o password
        $session->setFlashdata('error', 'Invalid Username or Password');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}