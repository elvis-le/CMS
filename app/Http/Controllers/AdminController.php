<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Contribution;
use App\Models\Faculty;
use App\Models\Magazine;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function home()
    {
        return view('/administrators/home', [
        ]);
    }

    public function student_manage()
    {
        $user = User::where(['roles_id' => 4, 'status' => 0])->get();
        return view('/administrators/student', [
            'user' => $user
        ]);
    }

    public function academic_year_manage()
    {
        $magazine = Magazine::where('status', 0)->get();
        return view('/administrators/academic-year', [
            'magazine' => $magazine
        ]);
    }

    public function marketing_coordinator_manage()
    {
        $user = User::where(['roles_id' => 2, 'status' => 0])->get();
        //lấy danh sách giáo viên year thuộc khoa của giáo viên
        return view('/administrators/marketing-coordinator', [
            'user' => $user
        ]);
    }


}
