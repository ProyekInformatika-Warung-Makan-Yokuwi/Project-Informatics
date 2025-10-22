<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function process()
    {
        $session = session();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Data login valid
        $users = [
            'admin'   => ['password' => 'admin123', 'role' => 'Admin'],
            'pemilik' => ['password' => 'passpemilik123', 'role' => 'Pemilik'],
        ];

        if (array_key_exists($username, $users)) {
            $userData = $users[$username];

            if ($password === $userData['password']) {
                // Simpan session
                $session->set([
                    'isLoggedIn' => true,
                    'username'   => $username,
                    'role'       => $userData['role'],
                ]);

                // Tampilkan halaman “Login Berhasil”
                $data = [
                    'title' => 'Login Berhasil',
                    'username' => $username,
                    'role' => $userData['role'],
                ];

                return view('login_success', $data);
            } else {
                $session->setFlashdata('error', 'Password yang Anda masukkan salah.');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->back();
        }
    }
}
