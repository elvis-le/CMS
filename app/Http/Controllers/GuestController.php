<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contribution;
use App\Models\AcademicYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function home()
    {
        $academicYears = AcademicYear::where([ 'status' => 0])->get();
        return view('/guest/home', [
            'academicYear' => $academicYears
        ]);
    }

    public function contributions(Request $request)
    {
        $contributions = Contribution::where(['academicYear_id' => $request->id, 'status' => 0, 'allowGuest' => true])->with('user')->get();

        return view('/guest/contributions', ['contributions' => $contributions]);
    }

    public function contribution_detail(Request $request)
    {
        $academicYears = AcademicYear::findOrFail($request->academicYear_id);
        $contributions = Contribution::where(['id' => $request->contribution_id,"user_id" => $request->student_id, "academicYear_id" => $request->academicYear_id, 'status' => 0])->get();

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
        return view('/guest/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
        ]);
    }
}
