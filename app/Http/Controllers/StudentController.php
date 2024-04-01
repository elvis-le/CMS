<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function home()
    {
        $user = User::where('id', Auth::id())->first();
        $faculty_id = $user->faculty_id;

        $magazines = Magazine::where('faculty_id', $faculty_id)->get();

        return view('/index', [
            'magazine' => $magazines
        ]);
    }
}
