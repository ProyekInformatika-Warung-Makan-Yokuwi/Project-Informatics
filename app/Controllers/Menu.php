<?php

namespace App\Controllers;
use App\Models\MenuModel;

class Menu extends BaseController
{
    public function index()
    {
        $menuModel = new MenuModel();
        $data['menuList'] = $menuModel->findAll();
        $data['title'] = 'Daftar Menu Yokuwi';

        return view('menu', $data);
    }
}
