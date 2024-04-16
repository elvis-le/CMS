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
            "user_id" => $request->student_id,
            "magazine_id" => $request->magazine_id,
            'status' => 0
        ])->update(['condition' => 'approved']);
        $contributions = Contribution::where(["user_id" => $request->student_id, "magazine_id" => $request->magazine_id, 'status' => 0])->get();
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
        ]);
    }

    public function rejected(Request $request)
    {
        Contribution::where([
            "user_id" => $request->student_id,
            "magazine_id" => $request->magazine_id,
            'status' => 0
        ])->update(['condition' => 'rejected']);
        $contributions = Contribution::where(["user_id" => $request->student_id, "magazine_id" => $request->magazine_id, 'status' => 0])->get();
        return view('/marketing-coordinator/contribution-detail', [
            'contributions' => $contributions,
        ]);
    }

    /**
     * @throws Exception
     */


}
