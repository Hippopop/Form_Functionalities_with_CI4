<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class EmailController extends Controller
{
    public function __construct()
    {
        // helper('form');
    }

    public function index()
    {
      return view('email_page');
    }
}
