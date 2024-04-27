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
<body  style="overflow-y: hidden;">
<div id="error-message" style="display: none;" data-error="{{ session('error') }}"></div>
<div class="contribution-submitted-list-wrapper">
    <div class="contribution-submitted-head">
        <h2>Contribution</h2>
    </div>
    <div class="contribution-submitted-list-wrap">
        @foreach($contributions as $contribution)
            <form action="{{ route('st.contribution-detail') }}" method="post" enctype="multipart/form-data" class="list-contribution-submitted">
                @csrf
                <input type="hidden" name="academicYear_id" value="{{ $contribution->academicYear_id }}">
                <input type="hidden" name="contribution_id" value="{{ $contribution->id }}">
            <div class="contribution-submitted">
                <div class="contribution-submitted-infor">
                    <div class="contribution-submitted-title">
                        <h2>{{ $contribution->title }}</h2>
                    </div>
                    <div class="contribution-submitted-content">
                        <p>{{ $contribution->content }}</p>
                    </div>
                </div>
                <button class="view-contribution-btn">View detail</button>
            </div>
            </form>
        @endforeach
    </div>
    <ul class="listPage">
    </ul>
    <form class="btn-contribution-submitted" action="{{ route('st.submit-contribution') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $academicYear->id }}">

        <button class="cancel-btn" id="cancel-btn" data-route="{{ route('st.academicYear-detail') }}" type="button">Cancel</button>
        <button class="add-new-btn">Add new contribution</button>
    </form>
</div>

</body>
<script>
    document.getElementById("input-rep-comment").addEventListener("focus", function() {
        document.getElementById("commentBox").classList.add("focused");
    });

    document.getElementById("input-rep-comment").addEventListener("blur", function() {
        document.getElementById("commentBox").classList.remove("focused");
    });
</script>

<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="{{ asset('/js/cancel.js') }}"></script>
<script src="{{ asset('/js/error.js') }}"></script>
<script src="{{ asset('/js/pagination-contribution.js') }}"></script>
</html>
