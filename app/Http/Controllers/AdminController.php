<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        return view('/administrators/home', [
        ]);
    }

    public function student_manage()
    {
        $user = User::where('roles_id', 4)->get();
        //lấy danh sách học sinh thuộc khoa của giáo viên
        return view('/administrators/student', [
            'user' => $user
        ]);
    }

    public function academic_year_manage()
    {
        //lấy danh sách âcdemic year thuộc khoa của giáo viên
        return view('/administrators/student', [
        ]);
    }


    public function marketing_coordinator_manage()
    {
        //lấy danh sách giáo viên year thuộc khoa của giáo viên
        return view('/administrators/student', [
        ]);
    }

}
