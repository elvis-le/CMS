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
            <a href="{{ route('admin.student') }}" class="active">
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
            <a href="{{ route('admin.academic') }}">
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

    <section class="student-form form-i-main">
        <div class="student-form-name form-main">
            <h2 class="form-name">Edit Student</h2>
        </div>
        <form class="form-information-wrapper" action="{{ route('user.edit-save') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="form-information-wrap">
                <label for="name-student">Name</label>
                <input id="name-student" type="text" placeholder="Name" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-information-wrap">
                <label for="email-student">Email</label>
                <input id="email-student" type="text" placeholder="Email" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-information-wrap">
                <label for="phone-student">Phone</label>
                <input id="phone-student" type="text" placeholder="Phone" name="phone" value="{{ $user->phone }}">
            </div>
            <input type="hidden" name="role" value="4">
            <div class="form-information-wrap">
                <label >Year of university</label>
                <select name="year">
                    <option value="1" {{ $user->years_of_university == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $user->years_of_university == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $user->years_of_university == 3 ? 'selected' : '' }}>3</option>
                    <option value="4" {{ $user->years_of_university == 4 ? 'selected' : '' }}>4</option>
                </select>
            </div>
            <div class="form-information-wrap">
                <label >Faculty ID</label>
                <select name="faculty">
                    @foreach($faculty as $info)
                        <option value="{{ $info->id }}" @if($info->id === $user->faculty_id) selected @endif>{{ $info->faculty }}</option>
                    @endforeach
                </select>
            </div>
            <div class="student-form-btn form-main-btn">
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
<script src="{{ asset('/js/error.js') }}"></script>
</body>
</html>
