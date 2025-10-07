<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Selamat Datang di Warung Makan Yokuwi';
        return view('home', $data);
    }
}
