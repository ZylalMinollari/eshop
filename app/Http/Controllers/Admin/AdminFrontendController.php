<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminFrontendController extends Controller
{
    public function index () {
        return view('admin.index');
    }
}
