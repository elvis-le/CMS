<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketingManagerController extends Controller
{
    public function home()
    {
        return view('marketing-manager.home', [
        ]);
    }
}
