<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Magazine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Writer\Pdf;
use PhpOffice\PhpWord\PhpWord;
use Dompdf\Dompdf;


class MarketingCoordinatorController extends Controller
{
    public function home()
    {
        $user = User::where(['id' => Auth::id(), 'status' => 0])->first();
        $magazines = Magazine::where(['faculty_id'=> $user->faculty_id, 'status' => 0])->get();
        return view('/marketing-coordinator/home', [
            'magazine' => $magazines
        ]);
    }

    public function contributions(Request $request)
    {
        $contributions = Contribution::where(['magazine_id' => $request->id, 'status' => 0])->with('user')->get();

        $groupedContributions = [];

        foreach ($contributions as $contribution) {
            $userId = $contribution->user->id;

            if (!isset($groupedContributions[$userId])) {
                $groupedContributions[$userId] = [];
            }

            $groupedContributions[$userId][] = $contribution;
        }

        return view('/marketing-coordinator/contributions', ['groupedContributions' => $groupedContributions]);
    }

    public function contribution_detail(Request $request)
    {
        $contributions = Contribution::where(["user_id" => $request->student_id, "magazine_id" => $request->magazine_id, 'status' => 0])->get();
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
        ]);
    }

    public function approved(Request $request)
    {
        Contribution::where([
            'id' => $request->contribution_id,
            'status' => 0
        ])->update(['condition' => 'approved']);
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
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
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
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
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
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
            'academicYear' => $academicYears,
            'comments' => $comments,
            'user_group' => $user_group,
            'users' => $users,
        ]);
    }

    /**
     * @throws Exception
     */


}
