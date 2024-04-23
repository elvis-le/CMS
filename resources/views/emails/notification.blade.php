<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .form-email-send-wrapper{
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100vh;
            overflow: auto;
            color: black;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .form-email-send-wrap{
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            max-width: 80%;
            max-height: 60%;
            border-radius: 10px;
            position: relative;
            overflow: auto;
            box-shadow: 0 0 10px rgba(172,172,172,0.6);
            margin: auto;
        }
    </style>
    <title>Email Notification</title>
</head>
<body class="form-email-send-wrapper">
<section class="form-email-send-wrap">
<h2 style="color: #1b1e21">The journal has a new contribution in your faculty</h2>

<p style="color: #1b1e21">Dear Mr {{ $marketingCoordinatorsName }},</p>

<p style="color: #1b1e21">Student {{ $studentName }} contributed to the department's {{ $academicYearName }} Academic Year</p>

    <p style="color: #1b1e21; display: inline-flex">You can see it in
    <form action="{{ route('mc.contribution-detail') }}" method="get" enctype="multipart/form-data" style="display: inline-flex; width: 50%">
        @csrf
        <input type="hidden" name="academicYear_id" value="{{ $academicYear }}">
        <input type="hidden" name="contribution_id" value="{{ $contributionID }}">
        <input type="hidden" name="student_id" value="{{ $studentID }}">
        <button style="display: inline-flex; border: none; background-color: transparent; color: blue; text-decoration: underline;">
            <a style=" color: blue;">{{ $academicYearName }}</a>
        </button>
    </form>
    </p>

<p style="color: #1b1e21">Please check soon</p>

<p style="color: #1b1e21">Best regards</p>
</section>
</body>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</html>

