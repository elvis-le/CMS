<?php

namespace App\Http\Controllers;

use App\Mail\EmailNotification;
use App\Mail\EmailEditContributonNotification;
use App\Mail\StudentEditContributonNotification;
use App\Mail\StudentNotification;
use App\Models\Comment;
use App\Models\Contribution;
use App\Models\AcademicYear;
use App\Models\Faculty;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class StudentController extends Controller
{
    public function home()
    {
        $user = User::where('id', Auth::id())->first();
        $faculty_id = $user->faculty_id;

        $academicYears = AcademicYear::where('faculty_id', $faculty_id)->get();

        return view('/student/index', [
            'academicYear' => $academicYears
        ]);
    }

    public function terms_and_conditions()
    {
        return view('/student/terms-and-conditions');
    }

    public function contact_us()
    {
        return view('/student/contact-us');
    }

    public function academicYear_detail(Request $request)
    {
        $academicYears = AcademicYear::findOrFail($request->id);
        return view('/student/academicYear-detail', ['academicYear' => $academicYears]);
    }

    public function submit_contribution(Request $request)
    {
        $academicYears = AcademicYear::findOrFail($request->id);

        $currentDate = Carbon::now();
        $deadline = Carbon::parse($academicYears->deadline);
        $startDate = Carbon::parse($academicYears->startDate);


            return view('/student/submit-contribution', [
                'academicYear' => $academicYears,
                'currentDate' => $currentDate,
                'startDate' => $startDate,
                'deadline' => $deadline]);
    }

    public function contribution_detail(Request $request)
    {
        $academicYears = AcademicYear::findOrFail($request->academicYear_id);
        $currentDate = Carbon::now();
        $finalDeadline = Carbon::parse($academicYears->finalDeadline);

        $contributions = Contribution::where(['id' => $request->contribution_id,"user_id" => Auth::id(), "academicYear_id" => $request->academicYear_id, 'status' => 0])->get();

        foreach ($contributions as $contribution) {
            $contribution_id = $contribution->id;
        }
        $comments = Comment::where('contribution_id', $contribution_id)->get();
        $user_group = [];
        foreach ($comments as $comment) {
            $userId = $comment->user_id;
            if (!isset($users[$userId])) {
                $users[$userId] = [];
            }

            $user_group[$userId][] = $userId;
        }
        $users = User::all();

        return view('/student/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'currentDate' => $currentDate,
            'finalDeadline' => $finalDeadline,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
        ]);
    }

    public function contribution(Request $request)
    {
        $contribution = Contribution::where(['user_id' => Auth::id(),
        'academicYear_id' => $request->id, 'status' => 0])->get();
        $academicYear = AcademicYear::where('id', $request->id)->first();
        return view('/student/contribution', [
            'contributions' => $contribution,
            'academicYear' => $academicYear,
        ]);
    }

    public function comment(Request $request)
    {
        Comment::create([
            'contribution_id' => $request->contribution_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'comment_date' => now(),
        ]);
        $academicYears = AcademicYear::findOrFail($request->academicYear_id);
        $currentDate = Carbon::now();
        $finalDeadline = Carbon::parse($academicYears->finalDeadline);

        $contributions = Contribution::where(['id' => $request->contribution_id,"user_id" => Auth::id(), "academicYear_id" => $request->academicYear_id, 'status' => 0])->get();

        foreach ($contributions as $contribution) {
            $contribution_id = $contribution->id;
        }
        $comments = Comment::where('contribution_id', $contribution_id)->get();
        $user_group = [];
        foreach ($comments as $comment) {
            $userId = $comment->user_id;
            if (!isset($users[$userId])) {
                $users[$userId] = [];
            }

            $user_group[$userId][] = $userId;
        }
        $users = User::all();

        return view('/student/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'currentDate' => $currentDate,
            'finalDeadline' => $finalDeadline,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
        ]);
    }

    public function contribution_upload(Request $request)
    {

        $files = $request->file('file');
        $image = $request->file('backgroundImage');
        $supabaseUrl = env('SUPABASE_URL');
        $apiKey = env('SUPABASE_KEY');
        $bucketName = env('SUPABASE_BUCKET');
        $url=[];


        $fileImage = null;
        if ($image) {
            $filepath = Str::random(10) . '_' . $image->getClientOriginalName();
            $response = Http::attach(
                'file',
                file_get_contents($image->getRealPath()),
                $filepath
            )->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey
            ])->post("$supabaseUrl/storage/v1/object/$bucketName/{$filepath}");
            if ($response->successful()) {
                $fileImage = "$supabaseUrl/storage/v1/object/public/$bucketName/{$filepath}";
            }
        }


        foreach ($files as $file) {
            $filepath = Str::random(10) . '_' . $file->getClientOriginalName();
                $response = Http::attach(
                    'file',
                    file_get_contents($file->getRealPath()),
                    $filepath
                )->withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey
                ])->post("$supabaseUrl/storage/v1/object/$bucketName/{$filepath}");
                if ($response->successful()) {
                    $url[] = "$supabaseUrl/storage/v1/object/public/$bucketName/{$filepath}";
                }
        }

        $contribution = new Contribution;
        $contribution->user_id = Auth::id();
        $contribution->academicYear_id = $request->id;
        $contribution->title = $request->title;
        $contribution->content = $request->content;
        $contribution->backgroundImage = $fileImage;
        $contribution->location = json_encode($url);
        $contribution->submission_date = now();
        $contribution->condition = 'pending';
        $contribution->save();

        $contribution = Contribution::where(['user_id' => Auth::id(),
            'academicYear_id' => $request->id, 'status' => 0])->get();
        $academicYear = AcademicYear::where('id', $request->id)->first();
        return view('/student/contribution', [
            'contributions' => $contribution,
            'academicYear' => $academicYear,
        ]);
    }

    public function edit_contribution(Request $request)
    {
        $academicYears = AcademicYear::findOrFail($request->id);
        $contributions = Contribution::where(['id' => $request->contribution_id,"user_id" => Auth::id(), "academicYear_id" => $request->id, 'status' => 0])->get();
        $currentDate = Carbon::now();
        $finalDeadline = Carbon::parse($academicYears->finalDeadline);
        $startDate = Carbon::parse($academicYears->startDate);


            return view('/student/contribution-edit', [
                'academicYears' => $academicYears,
                'currentDate' => $currentDate,
                'startDate' => $startDate,
                'contributions' => $contributions,
                'finalDeadline' => $finalDeadline]);
    }

    public function edit_contribution_save(Request $request)
    {
        $files = $request->file;
        $image = $request->file('backgroundImage');
        $supabaseUrl = env('SUPABASE_URL');
        $apiKey = env('SUPABASE_KEY');
        $bucketName = env('SUPABASE_BUCKET');
        $contribution = Contribution::where(['id' => $request->contribution_id,"user_id" => Auth::id(), "academicYear_id" => $request->id, 'status' => 0])->first();
        $url=[];


        $fileImage = null;
        if ($image) {
            $filepath = Str::random(10) . '_' . $image->getClientOriginalName();
            $response = Http::attach(
                'file',
                file_get_contents($image->getRealPath()),
                $filepath
            )->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey
            ])->post("$supabaseUrl/storage/v1/object/$bucketName/{$filepath}");
            if ($response->successful()) {
                $fileImage = "$supabaseUrl/storage/v1/object/public/$bucketName/{$filepath}";
                $contribution->backgroundImage = $fileImage;
            }
        }


        foreach ($files as $file) {
            if ($file instanceof \Illuminate\Http\UploadedFile) {
                $filepath = Str::random(10) . '_' . $file->getClientOriginalName();
                $response = Http::attach(
                    'file',
                    file_get_contents($file->getRealPath()),
                    $filepath
                )->withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey
                ])->post("$supabaseUrl/storage/v1/object/$bucketName/{$filepath}");
                if ($response->successful()) {
                    $url[] = "$supabaseUrl/storage/v1/object/public/$bucketName/{$filepath}";
                }
            }
            else{
                $url[] = $file;
            }
        }

        $contribution->title = $request->title;
        $contribution->content = $request->content;
        $contribution->location = json_encode($url);

        $contribution->save();

        $academicYears = AcademicYear::findOrFail($request->id);
        $currentDate = Carbon::now();
        $finalDeadline = Carbon::parse($academicYears->finalDeadline);

        $contributions = Contribution::where(['id' => $request->contribution_id,"user_id" => Auth::id(), "academicYear_id" => $request->id, 'status' => 0])->get();

        foreach ($contributions as $contribution) {
            $contribution_id = $contribution->id;
        }
        $comments = Comment::where('contribution_id', $contribution_id)->get();
        $user_group = [];
        foreach ($comments as $comment) {
            $userId = $comment->user_id;
            if (!isset($users[$userId])) {
                $users[$userId] = [];
            }

            $user_group[$userId][] = $userId;
        }
        $users = User::all();

        return view('/student/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'currentDate' => $currentDate,
            'finalDeadline' => $finalDeadline,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
        ]);
    }
    public function profile()
    {
        $user = User::where(['id' => Auth::id(), 'status' => 0])->first();
        $faculty = Faculty::where('id', $user->faculty_id)->first();
        return view('/student/profile', [
            'user' => $user,
            'faculty' => $faculty
        ]);
    }

    public function profile_save(Request $request)
    {
        $user = User::where(['id'=> Auth::id()])->first();
        $supabaseUrl = env('SUPABASE_URL');
        $apiKey = env('SUPABASE_KEY');
        $bucketName = env('SUPABASE_BUCKET');

        if($request->old_password != null || $request->new_password != null ){

            $validator = Validator::make($request->all(), [
                'old_password' => ['required'],
                'new_password' => ['required', Rules\Password::defaults()],
                'confirm_new_password' => ['required', 'same:new_password'],
            ]);
            if ($validator->passes()) {
                if (!Hash::check($request->old_password, $user->password)){
                    return redirect()->route('student.profile')->with('error', 'Incorrect password.');
                }
                if (Hash::check($request->old_password, $user->password)) {
                    if ($request->hasFile('image')) {
                        $imageFile = $request->file('image');

                        $response = Http::attach(
                            'file',
                            file_get_contents($imageFile->getRealPath()),
                            $filepath = $imageFile->getClientOriginalName()
                        )->withHeaders([
                            'Authorization' => 'Bearer ' . $apiKey
                        ])->post("$supabaseUrl/storage/v1/object/$bucketName/{$filepath}");
                        $url = "$supabaseUrl/storage/v1/object/public/$bucketName/{$filepath}";

                        if ($response->successful()) {
                            $user->password = Hash::make($request->new_password);
                            $user->name = $request->name;
                            $user->phone = $request->phone;
                            $user->image = $url;
                            $user->save();
                            return redirect()->route('student.profile')->with('notification', 'Changes successfully.');
                        }
                    }
                    $user->password = Hash::make($request->new_password);
                    $user->name = $request->name;
                    $user->phone = $request->phone;
                    $user->save();
                    return redirect()->route('student.profile')->with('notification', 'Changes successfully.');
                }

            } else {
                $errors = $validator->errors();
                if ($errors->has('confirm_new_password')) {
                    return redirect()->route('student.profile')->with('error', 'The new password is not the same.');
                }
                return redirect()->route('student.profile')->with('error', 'Please fill in all required fields.');
            }
        }
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');

            $response = Http::attach(
                'file',
                file_get_contents($imageFile->getRealPath()),
                $filepath = $imageFile->getClientOriginalName()
            )->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey
            ])->post("$supabaseUrl/storage/v1/object/$bucketName/{$filepath}");
            $url = "$supabaseUrl/storage/v1/object/public/$bucketName/{$filepath}";

            if ($response->successful()) {
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->image = $url;
                $user->save();
                return redirect()->route('student.profile')->with('notification', 'Changes successfully.');
            }
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('student.profile')->with('notification', 'Changes successfully.');
    }
}
