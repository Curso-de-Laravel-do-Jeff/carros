<?php

namespace App\Http;

use App\Core\Support\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('home');
    }
}
