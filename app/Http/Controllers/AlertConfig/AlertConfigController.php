<?php

namespace App\Http\Controllers\AlertConfig;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlertConfigController extends Controller
{
        public function index()
    {
        return view('email_config.index');
    }
}
