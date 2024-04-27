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
<body >

<div id="error-message" style="display: none;" data-error="{{ session('error') }}"></div>
<div class="container-contribution">
    @foreach($contributions as $contribution)
        <form action="{{ route('mm.download') }}" id="contribution-form" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="contribution_id" value="{{ $contribution->id }}">
            <input type="hidden" name="student_id" value="{{ $contribution->user_id }}">
            <input type="hidden" name="academicYear_id" value="{{ $contribution->academicYear_id }}">
            <div class="contribution-view-wrap  contribution-form-wrap">
                <div class="head-contribution-view contribution-form-head">
                    <div class="image-contribution-view contribution-form-img">
                        <label for="file-contribution"><img class="image-contribution" src="{{ $contribution->backgroundImage }}" ></label>
                    </div>
                    <div class="title-content-contribution">
                        <div class="title-contribution">
                            <input name="title" type="text" placeholder="Title" value="{{ $contribution->title }}" readonly>
                        </div>
                        <div class="content-contribution">
                            <textarea name="content" placeholder="Content" readonly>{{ $contribution->content }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="body-contribution-view contribution-form-body">
                    <section class="list-file-contribution-wrapper">
                        <div class="list-file-contribution-name">
                            <h2>List File</h2>
                        </div>
                        <div class="list-file-contribution-wrap">
                            @if($contribution->academicYear_id == $academicYear->id)
                                @php
                                    $urls = json_decode($contribution->location);
                                @endphp
                                @if(is_array($urls))
                                    @foreach($urls as $url)
                                        <a href="#" class="file-link" data-src="{{ $url }}">{{ basename($url) }}</a>
                                    @endforeach
                                @endif
                            @endif
                        </div>

                    </section>
                    <section class="file-contribution-wrapper">
                    </section>
                </div>
                <div class="contribution-btn-wrap">
                    <div class="btn-contribution">
                        <button class="cancel-btn" type="button">Cancel</button>
                        @if($currentDate->greaterThan($finalDeadline))
                            <button class="download-btn" id="download-btn" style="margin-right: .5rem;">Download</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    @endforeach
    <section class="comment-contribution-wrapper" >
        <div class="comment-contribution-wrap" >
            <div class="status-contribution-name">
                <h2>Status</h2>
            </div>
            <div class="status-contribution">
                @if($contribution->condition == 'pending')
                    <p>Condition: <span style="color: rgba(30,30,255,1)"> {{ $contribution->condition }}</span></p>
                @elseif($contribution->condition == 'approved')
                    <p>Condition: <span style="color: rgba(6,186,5, 0.8)"> {{ $contribution->condition }}</span></p>
                @else
                    <p>Condition: <span style="color: rgba(236,39,39,1)"> {{ $contribution->condition }}</span></p>
                @endif
            </div>
            <div class="comment-contribution-name">
                <h2>Comment</h2>
            </div>
            <div class="list-comment-box">
                <div class="comment-detail">
                    @foreach($comments as $comment)
                        @if($comment->user_id == Auth::id())
                            <div class="comment-infor-self">
                                @php
                                    $userImage = '';
                                    $userName = '';
                                @endphp
                                @foreach ($user_group as $user_group_id)
                                    @foreach ($user_group_id as $user_id)
                                        @foreach ($users as $user)
                                            @if($user->id == $user_id)
                                                @if ($user->id == $comment->user_id)
                                                    @php
                                                        $userImage = $user->image;
                                                        $userName = $user->name;
                                                    @endphp
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                                <p>{{ $userName }}</p>
                                <img src="{{ $userImage }}">
                            </div>
                            <p class="comment-content-self" id="comment-content" type="text">{{ $comment->comment }}</p>
                            <p class="time-comment-self">Comment at: {{ $comment->comment_date }}</p>
                        @else
                            <div class="comment-infor">
                                @php
                                    $userImage = '';
                                    $userName = '';
                                @endphp
                                @foreach ($user_group as $user_group_id)
                                    @foreach ($user_group_id as $user_id)
                                        @foreach ($users as $user)
                                            @if($user->id == $user_id)
                                                @if ($user->id == $comment->user_id)
                                                    @php
                                                        $userImage = $user->image;
                                                        $userName = $user->name;
                                                    @endphp
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                                <img src="{{ $userImage }}">
                                <p>{{ $userName }}</p>
                            </div>
                            <p class="comment-content" id="comment-content" type="text">{{ $comment->comment }}</p>
                            <p class="time-comment">Comment at: {{ $comment->comment_date }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="commentBox-wrap">
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="contribution_id" value="{{ $contribution->id }}">
                    <input type="hidden" name="student_id" value="{{ $contribution->user_id }}">
                    <input type="hidden" name="academicYear_id" value="{{ $contribution->academicYear_id }}">
                    <div class="commentBox">
                        <input required="" type="text" id="input-rep-comment" name="comment" placeholder="Comment..." disabled>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send-horizontal"><path d="m3 3 3 9-3 9 19-9Z"/><path d="M6 12h16"/></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
</html>
