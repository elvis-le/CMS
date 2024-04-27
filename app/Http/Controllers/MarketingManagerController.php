<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contribution;
use App\Models\Faculty;
use App\Models\AcademicYear;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\Shared\ZipArchive;
use Illuminate\Validation\Rules;

class MarketingManagerController extends Controller
{
    public function home()
    {
        $users = User::where('status', 0)->get();
        $faculties = Faculty::where('status', 0)->get();
        $academicYears = AcademicYear::where('status', 0)->get();
        $contributions = Contribution::where('status', 0)->get();
        $academicYear_id = 1;

        return view('/marketing-manager/home', [
            'faculties' => $faculties,
            'contributions' => $contributions,
            'academicYears' => $academicYears,
            'academicYear_id' => $academicYear_id,
            'users' => $users,
        ]);
    }

    public function academicYear()
    {
        $academicYears = AcademicYear::where("status", 0)->get();
        return view('/marketing-manager/academicYear', [
            'academicYear' => $academicYears
        ]);
    }

    public function profile()
    {
        $user = User::where(['id' => Auth::id(), 'status' => 0])->first();
        return view('/marketing-manager/profile', [
            'user' => $user,
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
                    return redirect()->route('mm.profile')->with('error', 'Incorrect password.');
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
                            return redirect()->route('mm.profile')->with('notification', 'Changes successfully.');
                        }
                    }
                    $user->password = Hash::make($request->new_password);
                    $user->name = $request->name;
                    $user->phone = $request->phone;
                    $user->save();
                    return redirect()->route('mm.profile')->with('notification', 'Changes successfully.');
                }

            } else {
                $errors = $validator->errors();
                if ($errors->has('confirm_new_password')) {
                    return redirect()->route('mm.profile')->with('error', 'The new password is not the same.');
                }
                return redirect()->route('mm.profile')->with('error', 'Please fill in all required fields.');
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
                return redirect()->route('mm.profile')->with('notification', 'Changes successfully.');
            }
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('mm.profile')->with('notification', 'Changes successfully.');
    }

    public function contribution(Request $request)
    {
        $contributions = Contribution::where(['condition' => 'approved', 'academicYear_id' => $request->id, 'status' => 0])->with('user')->get();

        return view('/marketing-manager/contribution', ['contribution' => $contributions]);
    }

    public function contribution_detail(Request $request)
    {
        $academicYears = AcademicYear::findOrFail($request->academicYear_id);
        $contributions = Contribution::where(['id' => $request->contribution_id,'condition' => 'approved',"user_id" => $request->student_id, "academicYear_id" => $request->academicYear_id, 'status' => 0])->get();
        $finalDeadline = $academicYears->finalDeadline;
        $currentDate = Carbon::now();

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

        return view('/marketing-manager/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'finalDeadline' => $finalDeadline,
            'currentDate' => $currentDate,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
        ]);
    }

    public function download(Request $request)
    {
        $contributions = Contribution::where(["id" => $request->contribution_id,"user_id" => $request->student_id, "academicYear_id" => $request->academicYear_id, 'status' => 0])->first();
        $student_name = User::where('id', $request->student_id)->value('name');

        $downloadDir = public_path('contributions-file');

        $zipFileName = $student_name . '_Academic.zip';

        $urls = json_decode($contributions->location);

        $fileUrls = $urls;

        $zip = new ZipArchive();
        if ($zip->open($downloadDir . $zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($fileUrls as $url) {
                $fileName = basename($url);

                $fileContent = file_get_contents($url);

                $zip->addFromString($fileName, $fileContent);
            }

            $zip->close();

            header('Content-Type: application/zip');
            header('Content-disposition: attachment; filename=' . $zipFileName);
            header('Content-Length: ' . filesize($downloadDir . $zipFileName));
            readfile($downloadDir . $zipFileName);
            return redirect(route("mm.contribution-detail"));
        } else {
            echo 'Failed to create zip file';
        }
    }
}
