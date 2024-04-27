<?php

namespace App\Http\Controllers;

use App\Mail\EmailApprovedContribution;
use App\Mail\StudentApprovedContribution;
use App\Mail\EmailOthersApprovedContribution;
use App\Mail\EmailRejectedContribution;
use App\Mail\EmailOthersRejectedContribution;
use App\Mail\StudentRejectedContribution;
use App\Mail\EmailCommentContribution;
use App\Mail\EmailOthersCommentContribution;
use App\Mail\StudentCommentContribution;
use App\Models\Comment;
use App\Models\Contribution;
use App\Models\Faculty;
use App\Models\AcademicYear;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Writer\Pdf;
use PhpOffice\PhpWord\PhpWord;
use Dompdf\Dompdf;
use Illuminate\Validation\Rules;


class MarketingCoordinatorController extends Controller
{

    public function home()
    {
        $user = User::where('id', Auth::id())->first();
        $users = User::where('roles_id', 4)->get();
        $academicYears = AcademicYear::all();
        $contributions = Contribution::where('faculty_id', $user->faculty_id)->get();
        $academicYears_year = [];
        foreach ($academicYears as $academicYear){
            $startDate = $academicYear->startDate;

            $startDateObject = new DateTime($startDate);

            $year = $startDateObject->format('Y');

                if (!in_array($year, $academicYears_year)){
                    $academicYears_year[] = $year;
                }


        }

        return view('/marketing-coordinator/home', [
            'contributions' => $contributions,
            'academicYears_year' => $academicYears_year,
            'academicYears' => $academicYears,
            'users' => $users,
        ]);
    }

    public function academicYear()
    {
        $user = User::where(['id' => Auth::id(), 'status' => 0])->first();
        $academicYears = AcademicYear::where(['status' => 0])->get();
        return view('/marketing-coordinator/academicYear', [
            'academicYear' => $academicYears
        ]);
    }

    public function profile()
    {
        $user = User::where(['id' => Auth::id(), 'status' => 0])->first();
        $faculty = Faculty::where('id', $user->faculty_id)->first();
        return view('/marketing-coordinator/profile', [
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
                return redirect()->route('mc.profile')->with('error', 'Incorrect password.');
            }
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->hasFile('image')) {
                    $imageFile = $request->file('image');
                    $filepath = Str::random(10) . '_' . $imageFile->getClientOriginalName();
                    $response = Http::attach(
                        'file',
                        file_get_contents($imageFile->getRealPath()),
                        $filepath
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
                        return redirect()->route('mc.profile')->with('notification', 'Changes successfully.');
                    }
                }
                $user->password = Hash::make($request->new_password);
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->save();
                return redirect()->route('mc.profile')->with('notification', 'Changes successfully.');
            }

        } else {
            $errors = $validator->errors();
            if ($errors->has('confirm_new_password')) {
                return redirect()->route('mc.profile')->with('error', 'The new password is not the same.');
            }
            return redirect()->route('mc.profile')->with('error', 'Please fill in all required fields.');
        }
        }
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $filepath = Str::random(10) . '_' . $imageFile->getClientOriginalName();
            $response = Http::attach(
                'file',
                file_get_contents($imageFile->getRealPath()),
                $filepath
            )->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey
            ])->post("$supabaseUrl/storage/v1/object/$bucketName/{$filepath}");
            $url = "$supabaseUrl/storage/v1/object/public/$bucketName/{$filepath}";

            if ($response->successful()) {
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->image = $url;
                $user->save();
                return redirect()->route('mc.profile')->with('notification', 'Changes successfully.');
            }
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('mc.profile')->with('notification', 'Changes successfully.');
    }

    public function contributions(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $contributions = Contribution::where(['academicYear_id' => $request->id,'faculty_id' => $user->faculty_id, 'status' => 0])->with('user')->get();

        return view('/marketing-coordinator/contributions', ['contribution' => $contributions]);
    }

    public function contribution_detail(Request $request)
    {
        $academicYears = AcademicYear::findOrFail($request->academicYear_id);
        $contributions = Contribution::where(['id' => $request->contribution_id,"user_id" => $request->student_id, "academicYear_id" => $request->academicYear_id, 'status' => 0])->get();
        $currentDate = Carbon::now();
        $finalDeadline = Carbon::parse($academicYears->finalDeadline);
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
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'currentDate' => $currentDate,
            'finalDeadline' => $finalDeadline,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
        ]);
    }

    public function approved(Request $request)
    {
        Contribution::where([
            'id' => $request->contribution_id,
            'status' => 0
        ])->update(['condition' => 'approved']);

        $contribution = Contribution::where([
            'id' => $request->contribution_id,
            'status' => 0
        ])->first();
        $mc = User::where('id', Auth::id())->first();
        $user = User::where('id', $contribution->user_id)->first();
        $academicYear = AcademicYear::where('id', $request->id)->first();
        $marketing_coordinators = User::where(['roles_id' => 2, 'faculty_id' => $mc->faculty_id, 'status' => 0])->get();
        foreach ($marketing_coordinators as $marketing_coordinator){
            if ($marketing_coordinator->id !== $mc->id){
                Mail::to($marketing_coordinator->email)->send(new EmailOthersApprovedContribution($user, $mc, $marketing_coordinator, $academicYear, $contribution));
            }
        }
        Mail::to($mc->email)->send(new EmailApprovedContribution($user, $mc, $academicYear, $contribution));
        Mail::to($user->email)->send(new StudentApprovedContribution($user, $mc, $academicYear, $contribution));

        $academicYears = AcademicYear::findOrFail($request->academicYear_id);
        $contributions = Contribution::where(['id' => $request->contribution_id,"user_id" => $request->student_id, "academicYear_id" => $request->academicYear_id, 'status' => 0])->get();
        $currentDate = Carbon::now();
        $finalDeadline = Carbon::parse($academicYears->finalDeadline);
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
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'currentDate' => $currentDate,
            'finalDeadline' => $finalDeadline,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
        ]);
    }

    public function rejected(Request $request)
    {
        Contribution::where([
            'id' => $request->contribution_id,
            'status' => 0
        ])->update(['condition' => 'rejected',
            'allowGuest' => false]);

        $contribution = Contribution::where([
            'id' => $request->contribution_id,
            'status' => 0
        ])->first();
        $mc = User::where('id', Auth::id())->first();
        $user = User::where('id', $contribution->user_id)->first();
        $academicYear = AcademicYear::where('id', $request->id)->first();
        $marketing_coordinators = User::where(['roles_id' => 2, 'faculty_id' => $mc->faculty_id, 'status' => 0])->get();
        foreach ($marketing_coordinators as $marketing_coordinator){
            if ($marketing_coordinator->id !== $mc->id){
                Mail::to($marketing_coordinator->email)->send(new EmailOthersRejectedContribution($user, $mc, $marketing_coordinator, $academicYear, $contribution));
            }
        }
        Mail::to($mc->email)->send(new EmailRejectedContribution($user, $mc, $academicYear, $contribution));
        Mail::to($user->email)->send(new StudentRejectedContribution($user, $mc, $academicYear, $contribution));

        $academicYears = AcademicYear::findOrFail($request->academicYear_id);
        $contributions = Contribution::where(['id' => $request->contribution_id,"user_id" => $request->student_id, "academicYear_id" => $request->academicYear_id, 'status' => 0])->get();
        $currentDate = Carbon::now();
        $finalDeadline = Carbon::parse($academicYears->finalDeadline);
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
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'currentDate' => $currentDate,
            'finalDeadline' => $finalDeadline,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
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

        $contribution = Contribution::where([
            'id' => $request->contribution_id,
            'status' => 0
        ])->first();
        $mc = User::where('id', Auth::id())->first();
        $user = User::where('id', $contribution->user_id)->first();
        $academicYear = AcademicYear::where('id', $contribution->academicYear_id)->first();
        $marketing_coordinators = User::where(['roles_id' => 2, 'faculty_id' => $mc->faculty_id, 'status' => 0])->get();
        foreach ($marketing_coordinators as $marketing_coordinator){
            if ($marketing_coordinator->id !== $mc->id){
                Mail::to($marketing_coordinator->email)->send(new EmailOthersCommentContribution($user, $mc, $marketing_coordinator, $academicYear, $contribution));
            }
        }
        Mail::to($mc->email)->send(new EmailCommentContribution($user, $mc, $academicYear, $contribution));
        Mail::to($user->email)->send(new StudentCommentContribution($user, $mc, $academicYear, $contribution));

        $academicYears = AcademicYear::findOrFail($request->academicYear_id);
        $contributions = Contribution::where(['id' => $request->contribution_id,"user_id" => $request->student_id, "academicYear_id" => $request->academicYear_id, 'status' => 0])->get();
        $currentDate = Carbon::now();
        $finalDeadline = Carbon::parse($academicYears->finalDeadline);
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
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'currentDate' => $currentDate,
            'finalDeadline' => $finalDeadline,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
        ]);
    }

    public function allow_guest(Request $request)
    {
        Contribution::where([
            'id' => $request->contribution_id,
            'status' => 0
        ])->update(['allowGuest' => true]);
        $academicYears = AcademicYear::findOrFail($request->academicYear_id);
        $contributions = Contribution::where(['id' => $request->contribution_id,"user_id" => $request->student_id, "academicYear_id" => $request->academicYear_id, 'status' => 0])->get();
        $currentDate = Carbon::now();
        $finalDeadline = Carbon::parse($academicYears->finalDeadline);
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
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'currentDate' => $currentDate,
            'finalDeadline' => $finalDeadline,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
        ]);
    }

    public function un_allow_guest(Request $request)
    {
        Contribution::where([
            'id' => $request->contribution_id,
            'status' => 0
        ])->update(['allowGuest' => false]);
        $academicYears = AcademicYear::findOrFail($request->academicYear_id);
        $contributions = Contribution::where(['id' => $request->contribution_id,"user_id" => $request->student_id, "academicYear_id" => $request->academicYear_id, 'status' => 0])->get();
        $currentDate = Carbon::now();
        $finalDeadline = Carbon::parse($academicYears->finalDeadline);
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
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'currentDate' => $currentDate,
            'finalDeadline' => $finalDeadline,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
        ]);
    }

    /**
     * @throws Exception
     */


}
