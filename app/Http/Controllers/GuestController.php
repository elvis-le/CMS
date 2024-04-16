<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Magazine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function home()
    {
        $user = User::where(['id' => Auth::id(), 'status' => 0])->first();
        $magazines = Magazine::where(['faculty_id'=> $user->faculty_id, 'status' => 0])->get();
        return view('/guest/home', [
            'magazine' => $magazines
        ]);
    }

    public function contributions(Request $request)
    {
        $contributions = Contribution::where(['magazine_id' => $request->id, 'condition' => 'approved', 'status' => 0])->with('user')->get();

        $groupedContributions = [];

        foreach ($contributions as $contribution) {
            $userId = $contribution->user->id;

            if (!isset($groupedContributions[$userId])) {
                $groupedContributions[$userId] = [];
            }

            $groupedContributions[$userId][] = $contribution;
        }

        return view('/guest/contributions', ['groupedContributions' => $groupedContributions]);
    }

    public function contribution_detail(Request $request)
    {
        $contributions = Contribution::where(["user_id" => $request->student_id, "magazine_id" => $request->magazine_id, 'status' => 0])->get();
        return view('/guest/contribution-detail', [
            'contributions' => $contributions,
        ]);
    }
}
