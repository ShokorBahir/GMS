<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function __invoke()
    {
        return view('front.home');
    }
}
