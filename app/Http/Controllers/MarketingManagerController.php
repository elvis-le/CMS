<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Magazine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\Shared\ZipArchive;

class MarketingManagerController extends Controller
{
    public function home()
    {
        $magazines = Magazine::where("status", 0)->get();
        return view('/marketing-manager/home', [
            'magazine' => $magazines
        ]);
    }

    public function contribution(Request $request)
    {
        $contributions = Contribution::where(['magazine_id' => $request->id , 'status' => 0])->with('user')->get();

        $groupedContributions = [];

        foreach ($contributions as $contribution) {
            $userId = $contribution->user->id;

            if (!isset($groupedContributions[$userId])) {
                $groupedContributions[$userId] = [];
            }

            $groupedContributions[$userId][] = $contribution;
        }

        return view('/marketing-manager/contribution', ['groupedContributions' => $groupedContributions]);
    }

    public function contribution_detail(Request $request)
    {

        $contributions = Contribution::where(["user_id" => $request->student_id, "magazine_id" => $request->magazine_id, 'status' => 0])->get();
        return view('/marketing-manager/contribution-detail', [
            'contributions' => $contributions,
        ]);
    }

    public function download(Request $request)
    {
        $contributions = Contribution::where(["user_id" => $request->student_id, "magazine_id" => $request->magazine_id, 'status' => 0])->get();
        $student_name = User::where('id', $request->student_id)->value('name');

        $downloadDir = public_path('contributions-file');

        $zipFileName = $student_name . '_Academic.zip';

        $fileUrls = [];

        foreach ($contributions as $contribution) {

                $fileUrls[] = $contribution->content;
        }


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
