<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Magazine;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function home()
    {
        $user = User::where('id', Auth::id())->first();
        $faculty_id = $user->faculty_id;

        $magazines = Magazine::where('faculty_id', $faculty_id)->get();

        return view('/student/index', [
            'magazine' => $magazines
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

    public function magazine_detail(Request $request)
    {
        $magazine = Magazine::findOrFail($request->id);
        return view('/student/magazine-detail', ['magazine' => $magazine]);
    }

    public function submit_contribution(Request $request)
    {
        $academicYears = AcademicYear::findOrFail($request->id);

        $currentDate = Carbon::now();
        $deadline = Carbon::parse($academicYears->deadline);
        $startDate = Carbon::parse($academicYears->startDate);

        $contributions = Contribution::where(["user_id" => Auth::id(), 'status' => 0])->get();

        $foundContribution = false;

        foreach ($contributions as $contribution) {
            if ($contribution->academicYear_id == $academicYears->id) {
                $foundContribution = true;
                break;
            }
        }

        if ($foundContribution) {
            return redirect()->route('st.contribution', [
                'academicYear_id' => $academicYears->id,
            ]);
        }
        else{
            return view('/student/submit-contribution', [
                'academicYear' => $academicYears,
                'currentDate' => $currentDate,
                'startDate' => $startDate,
                'deadline' => $deadline]);
        }


    }

    public function contribution(Request $request)
    {
        $magazine = Magazine::findOrFail($request->id);
        return view('/student/contribution', ['magazine' => $magazine]);
    }

    public function contribution_upload(Request $request)
    {

        $files = $request->file('file');
        $supabaseUrl = env('SUPABASE_URL');
        $apiKey = env('SUPABASE_KEY');
        $bucketName = env('SUPABASE_BUCKET');

        foreach ($files as $file) {
            $response = Http::attach(
                'file',
                file_get_contents($file->getRealPath()),
                $filepath = $file->getClientOriginalName()
            )->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey
            ])->post("$supabaseUrl/storage/v1/object/$bucketName/{$filepath}");
            $url = "$supabaseUrl/storage/v1/object/public/$bucketName/{$filepath}";

            if ($response->successful()) {

                $contribution = new Contribution;
                $contribution->user_id = Auth::id();
                $contribution->magazine_id = $request->id;
                $contribution->content = $url;
                $contribution->submission_date = now();
                $contribution->condition = 'pending';
                $contribution->save();
            }
        }

        $magazine = Magazine::findOrFail($request->id);

        return view('/student/magazine-detail', ['magazine' => $magazine]);
    }

    public function contribution_edit(Request $request)
    {
        Contribution::where(['user_id' => $request->user_id, 'magazine_id' => $request->magazine_id])
            ->update(["status"=>1]);

        $files = $request->file;
        $supabaseUrl = env('SUPABASE_URL');
        $apiKey = env('SUPABASE_KEY');
        $bucketName = env('SUPABASE_BUCKET');

        foreach ($files as $file) {
            if ($file instanceof \Illuminate\Http\UploadedFile) {
                $response = Http::attach(
                    'file',
                    file_get_contents($file->getRealPath()),
                    $filepath = $file->getClientOriginalName()
                )->withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey
                ])->post("$supabaseUrl/storage/v1/object/$bucketName/{$filepath}");
                $url = "$supabaseUrl/storage/v1/object/public/$bucketName/{$filepath}";
                if ($response->successful()) {

                    $contribution = new Contribution;
                    $contribution->user_id = Auth::id();
                    $contribution->magazine_id = $request->magazine_id;
                    $contribution->content = $url;
                    $contribution->submission_date = now();
                    $contribution->condition = 'pending';
                    $contribution->save();
                }
            }else {
                Contribution::where('user_id', $request->user_id)
                    ->where('magazine_id', $request->magazine_id)
                    ->where('content' , $file)
                    ->update(['status' => 0]);
            }
        }
        $magazine = Magazine::findOrFail($request->magazine_id);

        $currentDate = Carbon::now();
        $deadline = Carbon::parse($magazine->deadline);

        $contributions = Contribution::where(["user_id" => $request->user_id, 'status' => 0])->get();

        return view('/student/contribution', [
            'contributions' => $contributions,
            'magazine' => $magazine,
            'currentDate' => $currentDate,
            'deadline' => $deadline
        ]);
    }
}
