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
<div class="container">
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
            <a href="{{ route('admin.mc') }}">
                <span class="material-symbols-outlined">groups</span>
                <h3>Marketing Coordinator</h3>
            </a>
            <a href="{{ route('admin.academic') }}">
                <span class="material-symbols-outlined">calendar_month</span>
                <h3>Academic year</h3>
            </a>
            <a href="{{ route('admin.faculty') }}" class="active">
                <span class="material-symbols-outlined">subject</span>
                <h3>Faculty</h3>
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

    <section class="mc-form form-i-main">
        <div class="mc-form-name form-main">
            <h2 class="form-name">Add Faculty</h2>
        </div>
        <form class="form-information-wrapper" action="{{ route('faculty.edit-save') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="hidden" name="id" value="{{ $faculty->id }}">
            <div class="form-information-wrap">
                <label for="name-faculty">Name</label>
                <input id="name-faculty" type="text" placeholder="Name" name="faculty"  value="{{ $faculty->faculty }}">
            </div>
            <div class="mc-form-btn form-main-btn">
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
<script src="{{ asset('/js/error.js') }}"></script>
</body>
</html>