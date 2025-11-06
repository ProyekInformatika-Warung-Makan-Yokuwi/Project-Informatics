<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login'); // Menampilkan halaman login
    }

    public function process()
    {
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $adminModel = new AdminModel();
        $user = $adminModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }

        // Jika password belum di-hash (plaintext di database)
        if ($password === $user['password']) {
            // Otomatis buatkan hash baru agar aman di masa depan
            $adminModel->update($user['id'], [
                'password' => password_hash($user['password'], PASSWORD_DEFAULT)
            ]);
        }

        // Cek password hash
        if (password_verify($password, $user['password'])) {
            // Menyimpan data session yang diperlukan
            $sessionData = [
                'isLoggedIn' => true,
                'id'         => $user['id'],
                'username'   => $user['nama'],  // Pastikan 'nama' diset sebagai 'username'
                'email'      => $user['email'],
                'role'       => $user['role'],  // Menyimpan role
            ];
            $session->set($sessionData);  // Menyimpan data session

            // Mengalihkan ke halaman utama setelah login berhasil
            return redirect()->to('/home')->with('success', 'Login berhasil! Selamat datang, ' . $user['nama']);
        } else {
            return redirect()->back()->with('error', 'Password salah.');
        }
    }

    public function logout()
    {
        session()->destroy();  // Menghancurkan session saat logout
        return redirect()->to('/')->with('success', 'Anda telah logout.');
    }
}
