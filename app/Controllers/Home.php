<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Welcome || SIP-1.0'
        ];
        return view('index', $data);
    }
}
