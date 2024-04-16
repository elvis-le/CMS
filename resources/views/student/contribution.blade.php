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
</head>
<body>

<!-- ======================header started====================== -->
<div class="container-contribution">
    <section class="list-file-contribution-wrapper">
        <div class="list-file-contribution-name">
            <h2>List File</h2>
        </div>
        <div class="list-file-contribution-wrap">
            @foreach($contributions as $contribution)
                @if($contribution->magazine_id == $magazine->id)
                    <a href="#" class="file-link" data-src="{{ $contribution->content }}">{{basename( $contribution->content) }}</a>
                @endif
            @endforeach
        </div>

        <form action="" method="" enctype="multipart/form-data" class="edit-contribution-btn">
            @csrf
            @if($deadline->greaterThan($currentDate))
                <div class="btn-contribution">
                    <button class="cancel-btn" type="button">Cancel</button>
                    <button class="edit-btn" id="edit-btn" type="button">Edit</button>
                </div>
            @else
                <div class="btn-contribution">
                    <button class="cancel-btn" type="button">Cancel</button>
                </div>
            @endif
        </form>
    </section>
    <section class="file-contribution-wrapper">
    </section>
    <section class="comment-contribution-wrapper">
        <div class="comment-contribution-name">
            <h2>Comment</h2>
        </div>
        <div class="feedback-contribution-wrap">
            <div class="feedback-contribution-condition feedback-contribution">
                <h3>Condition</h3>
                <p>Pending</p>
            </div>
            <div class="feedback-contribution-time feedback-contribution">
                <h3>Comment on</h3>
                <p>18 December 2023, 3:37 PM</p>
            </div>
            <div class="feedback-contribution-by feedback-contribution">
                <h3>Comment by</h3>
                <div class="information-mc">
                    <img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/avatar.jpg">
                    <p>Nguyễn Văn Tùng</p>
                </div>
            </div>
            <div class="contribution-feedback feedback-contribution">
                <h3>Comment</h3>
                <textarea rows="5">
A professional body is an organization that represents and supports individuals within a specific profession or industry. These bodies typically have a focus on maintaining and improving professional standards, providing guidance and resources for practitioners, and often play a role in regulating the profession. Professional bodies can serve various functions including:

Setting and maintaining professional standards: They establish codes of conduct, ethical guidelines, and competency frameworks to ensure members adhere to best practices within their profession.

Providing professional development and education: They offer training programs, workshops, seminars, and certifications to help members enhance their skills and knowledge.

Offering networking opportunities: Professional bodies often organize events, conferences, and forums where members can connect, share ideas, and collaborate with peers in their field.

Advocating for the profession: They may lobby governments, industry organizations, and other stakeholders on behalf of their members to promote the interests of the profession and address relevant issues.

Regulating the profession: In some cases, professional bodies have regulatory authority to license practitioners, set accreditation standards for educational programs, and enforce disciplinary measures for misconduct.
                </textarea>
            </div>
        </div>

        <div class="commentBox">
            <form action="" method="" enctype="multipart/form-data">
                @csrf
                <input required="" type="text" id="input-rep-comment" name="comment" placeholder="Comment...">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send-horizontal"><path d="m3 3 3 9-3 9 19-9Z"/><path d="M6 12h16"/></svg>
                </button>
            </form>
        </div>
    </section>
    <div class="editContribution" id="editContribution">
        <div class="edit-dialog" >
            <div class="edit-content">
                <div class="edit-header">
                    <h5 class="edit-title">Edit Contribution</h5>
                    <button type="button" class="close-edit-contribution" id="close-edit-contribution" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>
                <form action="{{ route('contribution-edit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" value="{{ $contribution->user_id }}">
                    <div class="edit-body">
                        @php
                            $startIndex = 10;
                        @endphp
                        @foreach($contributions as $index => $contribution)
                            @if($contribution->magazine_id == $magazine->id)
                                @php
                                    $loopIndex = $startIndex + $index;
                                @endphp
                                <div class="edit-body-contribution">
                                @if (str_ends_with($contribution->content, '.jpg')|| str_ends_with($contribution->content, '.jpeg') || str_ends_with($contribution->content, '.png') || str_ends_with($contribution->content, '.gif'))
                                    <span class="file-icon"><img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/free-image-1851231-1569136.webp"></span>
                                @elseif(str_ends_with($contribution->content, '.docx') || str_ends_with($contribution->content, '.doc'))
                                    <span class="file-icon"><img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/microsoft-word-logo.png"></span>
                                @else
                                    <span class="file-icon"><img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/unnamed.png"></span>
                                @endif
                                <a href="#" class="" data-src="{{ $contribution->content }}">{{basename( $contribution->content) }}</a>
                                    <button type="button" class="delete-edit-body-contribution"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
                                    <input class="file-upload" type="text" name="file[{{ $loopIndex }}]" value="{{ $contribution->content }}" multiple>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <nav class="add-file-contribution">
                        <button class="add-contribution-file" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                        </button>
                        <div class="list-function-file">
                            <li class="word-contribution-file">Word</li>
                            <li class="image-contribution-file">Image</li>
                            <li class="pdf-contribution-file">PDF</li>
                        </div>
                    </nav>
                    <div class="edit-btn">
                        <input type="hidden" name="user_id" value="{{ $contribution->user_id }}">
                        <input type="hidden" name="magazine_id" value="{{ $magazine->id }}">
                        <button type="button" class="cancel-edit-contribution" id="cancel-edit-contribution">cancel</button>
                        <button class="save-edit-contribution" id="save-edit-contribution">save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

</body>


<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="{{ asset('/js/cancel.js') }}"></script>
</html>
