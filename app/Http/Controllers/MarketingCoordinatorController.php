<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketingCoordinatorController extends Controller
{
    public function home()
    {
        return view('marketing-coordinator.home', [
        ]);
    }
}
