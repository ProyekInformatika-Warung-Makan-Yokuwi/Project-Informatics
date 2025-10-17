<?php

namespace App\Controllers;

// Gunakan BaseController untuk mewarisi helper dan request
use App\Controllers\BaseController;

class Login extends BaseController
{
    /**
     * Fungsi ini akan menangani data yang dikirim dari form login.
     * Dipanggil oleh: POST /login/process
     */
    public function process()
    {
        // Panggil service session
        $session = session();

        // Ambil data dari form input
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // --- DATA ADMIN YANG BENAR ---
        // Kita set username dan password untuk admin di sini
        $users = [
            'admin' => ['password' => 'admin123', 'role' => 'Admin'],
            // Anda bisa tambahkan user lain jika perlu
            'pemilik' => ['password' => 'passpemilik123', 'role' => 'Pemilik'],
        ];

        // 1. Cek apakah username yang dimasukkan ada di dalam data kita
        if (array_key_exists($username, $users)) {
            $userData = $users[$username];

            // 2. Jika username ada, cek apakah passwordnya cocok
            if ($password === $userData['password']) {
                // --- LOGIN BERHASIL ---

                // Siapkan data untuk disimpan di session
                $sessionData = [
                    'isLoggedIn' => true,
                    'username'   => $username,
                    'role'       => $userData['role'],
                ];
                $session->set($sessionData);

                // Redirect ke halaman menu setelah berhasil login
                return redirect()->to(base_url('menu'));
            } else {
                // --- LOGIN GAGAL (Password salah) ---
                $session->setFlashdata('error', 'Password yang Anda masukkan salah.');
                return redirect()->back(); // Kembali ke halaman login
            }
        } else {
            // --- LOGIN GAGAL (Username tidak ditemukan) ---
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->back(); // Kembali ke halaman login
        }
    }
}