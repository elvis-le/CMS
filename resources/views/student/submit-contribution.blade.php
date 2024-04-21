<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>School</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div id="error-message" style="display: none;" data-error="{{ session('error') }}"></div>

<form action="{{ route('contribution-upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $academicYear->id }}">
    <div class="contribution-submit-wrap contribution-form-wrap">
    <div class="head-contribution-submit contribution-form-head">
        <div class="image-contribution-submit contribution-form-img">
            <label for="file-contribution"><img class="image-contribution" src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/+.jpg"></label>
            <input type="file" name="backgroundImage" style="display: none" id="file-contribution">
        </div>
        <div class="title-content-contribution">
            <div class="title-contribution">
                <input name="title" type="text" placeholder="Title">
            </div>
            <div class="content-contribution">
                <textarea name="content" placeholder="Content"></textarea>
            </div>
        </div>
    </div>
    <div class="body-contribution-submit  contribution-form-body">
        <nav class="form-contribution">
            <div class="add-contribution">+</div>
            <div class="list-contribution">
                <li class="word-contribution">Word</li>
                <li class="pdf-contribution">PDF</li>
            </div>
        </nav>
        <div class="show-contribution">
        </div>
    </div>
        <div class="contribution-btn-wrap">
            @if($startDate->greaterThan($currentDate))
                <p style="text-align: center">This article has not started yet</p>
                <div class="btn-contribution" style="text-align: center">
                    <button class="cancel-btn" type="button">Cancel</button>
                </div>
            @elseif($currentDate->greaterThan($deadline))
                <p style="text-align: center">This article has expired</p>
                <div class="btn-contribution" style="text-align: center">
                    <button class="cancel-btn" type="button">Cancel</button>
                </div>
            @else
                <div class="term-and-condition-check">
                    <input type="checkbox" id="contribution-checkbox">
                    <a href="{{ url('/student/terms-and-conditions') }}">Term and Conditions</a>
                </div>
                <div class="btn-contribution">
                    <button class="cancel-btn" type="button">Cancel</button>
                    <button class="submit" id="submit">Submit</button>
                </div>
            @endif
        </div>
    </div>
</form>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("submit").addEventListener("click", function (event) {
            var checkboxChecked = document.getElementById("contribution-checkbox").checked;
            if (!checkboxChecked) {
                event.preventDefault();
                alert("Please accept the terms and conditions before submitting.");
            }
        });
    });
</script>

<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="{{ asset('/js/dropdown.js') }}"></script>
<script src="{{ asset('/js/error.js') }}"></script>
<script src="{{ asset('/js/upload-img-contribution.js') }}"></script>
<script src="{{ asset('/js/cancel.js') }}"></script>

</html>
