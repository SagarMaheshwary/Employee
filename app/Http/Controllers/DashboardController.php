<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show Dashboard View
     *
     * @return View
     */
    public function index(){
        return view('dashboard.index');
    }
}
