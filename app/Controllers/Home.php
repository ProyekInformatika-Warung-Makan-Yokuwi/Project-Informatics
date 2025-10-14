<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Selamat Datang di Warung Makan Yokuwi';
        return view('home', $data);
    }
    
    public function daftar_login()
{
    return view('daftar_login');
}

}
