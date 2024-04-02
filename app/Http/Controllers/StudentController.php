<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Magazine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function magazine_detail(Request $request)
    {
        $magazine = Magazine::findOrFail($request->id);
        return view('/student/magazine-detail', ['magazine' => $magazine]);
    }

    public function contribution(Request $request)
    {
        $magazine = Magazine::findOrFail($request->id);
        return view('/student/contribution', ['magazine' => $magazine]);
    }

    public function contribution_upload(Request $request)
    {

        $contribution = new Contribution;
        $contribution->user_id = Auth::id();
        $contribution->magazine_id = $request->id;
        if ($request->hasFile('word')) {
            $path = $request->file('word')->store('public/contributions-file');
            $url = Storage::url($path);
            $contribution->content = $url;
        };
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images/contribution-img');
            $url = Storage::url($path);
            $contribution->image = $url;
        };
        $contribution->submission_date = now();
        $contribution->status = 'pending';
        $contribution->save();

        $magazine = Magazine::findOrFail($request->id);

        return view('/student/contribution', ['magazine' => $magazine])->with('success', 'Upload successful!');
    }
}
