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

<form action="{{ route('st.edit-contribution-save') }}" method="post" enctype="multipart/form-data">
    @csrf
    @foreach($contributions as $contribution)
    <input type="hidden" name="id" value="{{ $academicYears->id }}">
        <input type="hidden" name="contribution_id" value="{{ $contribution->id }}">
    <div class="contribution-submit-wrap contribution-form-wrap">
        <div class="head-contribution-submit contribution-form-head">
            <div class="image-contribution-submit contribution-form-img">
                <label for="file-contribution"><img class="image-contribution" src="{{ $contribution->backgroundImage }}"></label>
                <input type="file" name="backgroundImage" style="display: none" id="file-contribution">
            </div>
            <div class="title-content-contribution">
                <div class="title-contribution">
                    <input name="title" type="text" value="{{ $contribution->title }}">
                </div>
                <div class="content-contribution">
                    <textarea name="contents" >{{ $contribution->content }}</textarea>
                </div>
            </div>
        </div>
        <div class="body-contribution-submit  contribution-form-body">
            <nav class="form-contribution">
                @if($contribution->academicYear_id == $academicYears->id)
                    @php
                        $urls = json_decode($contribution->location);
                        $startIndex = 10;
                    @endphp
                    @if(is_array($urls))
                        @foreach($urls as $index => $url)
                            @php
                                $loopIndex = $startIndex + $index;
                            @endphp
                            <div class="file-upload-wrap">
                            @if (str_ends_with($url, '.docx') || str_ends_with($url, '.doc'))
                                    <span class="file-icon"><img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/microsoft-word-logo.png"></span>
                            @else
                                    <span class="file-icon"><img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/unnamed.png"></span>
                            @endif
                                <span class="file-name"><a href="#" class="file-link" data-src="{{ $url }}" style="color: black">{{ basename($url) }}</a></span>
                                <input class="file-upload" type="text" style="display: none" name="file[{{ $loopIndex }}]" value="{{ $url }}"  multiple>
                                <button class="delete-contribution">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                </button>
                            </div>
                        @endforeach
                    @endif
                @endif
                <div class="add-contribution"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg></div>
                <div class="list-contribution">
                    <li class="word-contribution">Word</li>
                    <li class="img-contribution">Image</li>
                    <li class="pdf-contribution">PDF</li>
                </div>
            </nav>
            <section class="file-contribution-wrapper">
            </section>
        </div>
        <div class="contribution-btn-wrap">
            @if($currentDate->greaterThan($finalDeadline))
                <p style="text-align: center">The deadline for editing has expired</p>
                <div class="btn-contribution" style="text-align: center">

                    <button class="cancel-btn" id="cancel-btn" data-route="{{ route('st.contribution-detail') }}" type="button">Cancel</button>
                </div>
            @else
                <div class="btn-contribution" style="display: inline-flex; justify-content: space-between;">
                    <button class="cancel-btn" id="cancel-btn" data-route="{{ route('st.contribution-detail') }}" type="button">Cancel</button>
                    <button class="submit" id="submit">Save</button>
                </div>
            @endif
        </div>
    </div>
    @endforeach
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
