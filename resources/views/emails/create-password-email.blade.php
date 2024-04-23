<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            background-color: rgba(129,129,129,0.2);
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
            box-shadow: 0 0 10px rgba(227,227,227,1);
            margin: auto;
        }

        .form-email-send-wrap button{
            border: none;
            padding: 10px;
            border-radius: 10px;
            background-color: rgba(84,90,250,1);
            font-size: .8rem;
            color: white;
            cursor: pointer;
        }
    </style>
    <title>Email Create Password</title>
</head>
<body class="form-email-send-wrapper">
<section class="form-email-send-wrap">
    <h2>Hello, {{ $name }}</h2>
    <p>You need to create a password to complete account creation</p>
    <p>Click here to create a password</p>
    <form action="{{ route('create-password') }}" method="get" enctype="multipart/form-data" style="text-align: center">
        @csrf
        <input type="hidden" name="name" value="{{ $name }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="year" value="{{ $year }}">
        <input type="hidden" name="phone" value="{{ $phone }}">
        <input type="hidden" name="roles_id" value="{{ $roles_id }}">
        <input type="hidden" name="faculty_id" value="{{ $faculty_id }}">
        <button>Create New Password</button>
    </form>
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
