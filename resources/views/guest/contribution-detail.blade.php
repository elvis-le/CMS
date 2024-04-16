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
                <a href="#" class="file-link" data-src="{{ $contribution->content }}">{{basename( $contribution->content) }}</a>
            @endforeach
        </div>
        <form action="" method="post" enctype="multipart/form-data" class="edit-contribution-btn" id="contribution-form">
            @csrf
            <input type="hidden" name="magazine_id" value="{{ $contribution->magazine_id }}">
            <input type="hidden" name="student_id" value="{{ $contribution->user_id }}">
            <div class="btn-contribution"  style="width: 100%; text-align: center; ">
                <button class="cancel-btn" type="button">Cancel</button>
            </div>
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
