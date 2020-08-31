<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return [
            [
                'label' => 'Beranda',
                'path' => '/',
                'icon' => 'el-icon-pie-chart'
            ],
            [
                'label' => 'Order',
                'path' => '/order',
                'icon' => 'el-icon-order'
            ],
            [
                'label' => 'Dipo',
                'path' => '/dipo',
                'icon' => 'el-icon-school'
            ],
            [
                'label' => 'Jalur',
                'path' => '/jalur',
                'icon' => 'el-icon-guide'
            ],
            [
                'label' => 'Jenis Pekerjaan',
                'path' => '/jenis-pekerjaan',
                'icon' => 'el-icon-s-tools'
            ],
            [
                'label' => 'Sarana',
                'path' => '/sarana',
                'icon' => 'el-icon-truck'
            ],
            [
                'label' => 'User',
                'path' => '/user',
                'icon' => 'el-icon-user'
            ],
        ];
    }
}
