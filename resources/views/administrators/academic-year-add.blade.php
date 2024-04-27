<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Dashboard using HTML, CSS, and JavaScript</title>
    <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('/css/style-dashboard.css') }}">
</head>
<body>
<div id="error-message" style="display: none;" data-error="{{ session('error') }}"></div>
<div class="container" style="overflow-y: auto;">
    <aside>
        <div class="top">
            <div class="logo">
                <img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/icon-logo.webp" />
                <h2>Greenwich</h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons">close</span>
            </div>
        </div>
        <div class="sidebar">
            <a href="{{ route('admin.home') }}">
                <span class="material-icons">grid_view</span>
                <h3>Dashboard</h3>
            </a>
            <a href="{{ route('admin.student') }}">
                <span class="material-symbols-outlined">group</span>
                <h3>Student</h3>
            </a>
            <a href="{{ route('admin.guest') }}">
                <span class="material-symbols-outlined">manage_accounts</span>
                <h3>Guest</h3>
            </a>
            <a href="{{ route('admin.mc') }}">
                <span class="material-symbols-outlined">groups</span>
                <h3>Marketing Coordinator</h3>
            </a>
            <a href="{{ route('admin.academic') }}" class="active">
                <span class="material-symbols-outlined">calendar_month</span>
                <h3>Academic year</h3>
            </a>
            <a href="{{ route('admin.faculty') }}">
                <span class="material-symbols-outlined">subject</span>
                <h3>Faculty</h3>
            </a>
            <a href="{{ route('admin.profile') }}">
                <span class="material-symbols-outlined">stacks</span>
                <h3>Profile</h3>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">

                    <span class="material-icons">logout</span>
                    <h3>Log Out</h3>
                </a>
            </form>
        </div>
    </aside>

    <section class="academic-year-form form-i-main">
        <div class="academic-year-form-name form-main">
            <h2 class="form-name">Add Academic Year</h2>
        </div>
        <form class="form-information-wrapper" action="{{ route('academic.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-information-wrap">
                <label for="name-academic-year">Name</label>
                <input id="name-academic-year" type="text" placeholder="Name" name="name">
            </div>
            <div class="form-information-wrap">
                <label>Image</label>
                <label for="img-academic-year"><img class="image" src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/icon-logo.webp" alt="Magazine Image"></label>
                <input accept=".jpg,.jpeg,.png,.gif" id="img-academic-year" type="file" style="display: none" name="image">
            </div>
            <div class="form-information-wrap">
                <label for="detail-academic-year">Detail</label>
                <textarea id="detail-academic-year" rows="3" placeholder="Detail" name="detail"></textarea>
            </div>
            <div class="form-information-wrap">
                <label for="startDate-academic-year">Start Date</label>
                <input id="startDate-academic-year" type="date"  name="startDate">
            </div>
            <div class="form-information-wrap">
                <label for="deadline-academic-year">Deadline</label>
                <input id="deadline-academic-year" type="date"  name="deadline">
            </div>
            <div class="form-information-wrap">
                <label for="finalDeadline-academic-year">Final Deadline</label>
                <input id="finalDeadline-academic-year" type="date"  name="finalDeadline">
            </div>

            <div class="academic-year-form-btn form-main-btn">
                <button class="cancel-btn" type="button">Cancel</button>
                <button class="save-student-btn">Save</button>
            </div>
        </form>
    </section>

</div>
<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="{{ asset('/js/dropdown.js') }}"></script>
<script src="{{ asset('/js/cancel.js') }}"></script>
<script src="{{ asset('/js/upload-image.js') }}"></script>
<script src="{{ asset('/js/error.js') }}"></script>
</body>
</html>
