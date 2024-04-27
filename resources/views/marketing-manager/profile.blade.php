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
<div id="notification-message" style="display: none;" data-notification="{{ session('notification') }}"></div>
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
            <a href="{{ route('mm.academicYear') }}">
                <span class="material-symbols-outlined">calendar_month</span>
                <h3>Academic Year</h3>
            </a>
            <a href="{{ route('mm.profile') }}" class="active">
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
                    <div class="profile-form-wrapper">
                        <form class="profile-form-wrap" action="{{ route('mm.profile-save') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                        <div class="personal-image-password">
                            <div class="personal-image-name">
                                <div class="personal-image">
                                    <label for="personal-img"><img class="image" id="preview-image" src="{{ $user->image }}"></label>
                                    <input accept=".jpg,.jpeg,.png,.gif" id="personal-img" style="display: none;" type="file" name="image">
                                </div>
                                <p>{{ $user->name }}</p>
                            </div>
                            <div class="change-password">
                                <p>Change Password</p>
                                <input type="password" class="old-password" id="old-password" placeholder="Old password" name="old_password">
                                <input type="password" class="new-password" id="new-password" placeholder="New password" name="new_password">
                                <input type="password" class="confirm-new-password" id="confirm-new--password" placeholder="Confirm new password" name="confirm_new_password">
                            </div>
                        </div>
                        <div class="personal-information-wrap">
                            <div class="personal-information-head">
                                <h2>Personal Information</h2>
                                <p>This information is private and will not be shared with other players.</p>
                            </div>
                            <div class="personal-information-body">
                                <div class="personal-information">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="personal-information">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}" disabled>
                                </div>
                                <div class="personal-information">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" value="{{ $user->phone }}">
                                </div>
                                <div class="personal-change-btn">
                                    <button style="margin-top: 28%;">Save Changes</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
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
</body>
</html>
