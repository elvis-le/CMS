<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\EmailCreatePassword;
use App\Models\Contribution;
use App\Models\Faculty;
use App\Models\Magazine;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Validation\Rules;


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

    public function student_edit(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $faculty = Faculty::where('status', 0)->get();
        return view('/administrators/student-edit', [
            'user' => $user,
            'faculty' => $faculty
        ]);
    }

    public function student_edit_save(Request $request): RedirectResponse
    {
        $user = User::find($request->id);

        if (!$user) {
            abort(404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->roles_id = $request->role;
        $user->years_of_university = $request->year;
        $user->faculty_id = $request->faculty;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return Redirect::route('admin.student');
    }

    public function student_delete(Request $request)
    {
        User::where('id', $request->id)->update(["status"=>1]);
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
        return view('/administrators/marketing-coordinator', [
            'user' => $user
        ]);
    }


}