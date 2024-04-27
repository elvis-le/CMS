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
            <a href="{{ route('mm.home') }}">
                <span class="material-icons">grid_view</span>
                <h3>Dashboard</h3>
            </a>
            <a href="{{ route('mm.academicYear') }}" class="active">
                <span class="material-symbols-outlined">calendar_month</span>
                <h3>Academic Year</h3>
            </a>
            <a href="{{ route('mm.profile') }}">
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

    <section class="bg-02">
        <div class="container-magazine">
            <div class="row">
                <div class="col-12">
                    <div class="heading">
                        <h2>Academic Year</h2>
                    </div>
                </div>
                @csrf
                @foreach($academicYear as $info)
                    <div class="featured-box">
                        <div class="feature-card">
                            <a href="{{ url('/marketing-manager/contribution?id=' . $info->id) }}" ><i class="far fa-link"></i></a>
                            <img src="{{ asset( $info->image ) }}">
                        </div>
                        <div class="content">
                            <h3>{{ $info->name }}</h3>
                            <p>{{ $info->detail }}</p>
                            <ol>
                                <li>{{ $info->publish_date }}</li>
                                <li>{{ $info->deadline }}</li>
                                <li>3 student</li>
                            </ol>
                        </div>
                    </div>
                @endforeach
                <ul class="listPage">
                </ul>
            </div>
        </div>
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
<script src="{{ asset('/js/pagination-academicYear.js') }}"></script>
</body>
</html>
