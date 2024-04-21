<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\EmailCreatePassword;
use App\Models\Contribution;
use App\Models\Faculty;
use App\Models\AcademicYear;
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

    public function student_add()
    {
        $faculty = Faculty::where('status', 0)->get();
        return view('/administrators/student-add', [
            'faculty' => $faculty
        ]);
    }


    public function student_save(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $year = $request->year;
        $roles_id = $request->roles_id;
        $faculty_id = $request->faculty;

        Mail::to($email)->send(new EmailCreatePassword($name, $email, $phone,$year, $roles_id, $faculty_id));

        return redirect(route('admin.student', absolute: false));
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
        $academicYear = AcademicYear::where('status', 0)->get();
        return view('/administrators/academic-year', [
            'academicYear' => $academicYear
        ]);
    }



    public function marketing_coordinator_manage()
    {
        $user = User::where(['roles_id' => 2, 'status' => 0])->get();
        return view('/administrators/marketing-coordinator', [
            'user' => $user
        ]);
    }

    public function marketing_coordinator_add()
    {
        $faculty = Faculty::where('status', 0)->get();
        return view('/administrators/marketing-coordinator-add', [
            'faculty' => $faculty
        ]);
    }

    public function marketing_coordinator_save(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $password = Str::random(12);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'phone' => $request->phone,
            'roles_id' => $request->role,
            'faculty_id' => $request->faculty,
        ]);

        if ($user->email_verified_at === null) {
            $user->sendEmailVerificationNotification();
        }

        $user->update([
            'password'=>Hash::make($password)
        ]);

        return redirect(route('admin.mc', absolute: false));
    }

    public function marketing_coordinator_edit(Request $request)
    {
        $user = User::where(['id' => $request->id, 'status' => 0])->first();
        $faculty = Faculty::where('status', 0)->get();
        return view('/administrators/marketing-coordinator-edit', [
            'user' => $user,
            'faculty' => $faculty
        ]);
    }

    public function marketing_coordinator_edit_save(Request $request): RedirectResponse
    {
        $user = User::find($request->id);

        if (!$user) {

            abort(404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->roles_id = $request->role;
        $user->faculty_id = $request->faculty;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return Redirect::route('admin.mc');
    }

    public function marketing_coordinator_delete(Request $request)
    {
        User::where('id', $request->id)->update(["status"=>1]);
        $user = User::where(['roles_id' => 2, 'status' => 0])->get();
        return view('/administrators/marketing-coordinator', [
            'user' => $user
        ]);
    }

    public function create_password(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $year = $request->year;
        $roles_id = $request->roles_id;
        $faculty_id = $request->faculty_id;

        return view('/administrators/create-password',[
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'year' => $year,
            'roles_id' => $roles_id,
            'faculty_id' => $faculty_id,
        ]);
    }

    public function create_password_account(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $email_verified_at = now();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => $email_verified_at,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'years_of_university' => $request->year,
            'roles_id' => $request->roles_id,
            'faculty_id' => $request->faculty_id,
        ]);

        return view('login');
    }

}
