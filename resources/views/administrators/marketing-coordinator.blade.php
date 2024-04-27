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
            <a href="{{ route('admin.guest') }}">
                <span class="material-symbols-outlined">manage_accounts</span>
                <h3>Guest</h3>
            </a>
            <a href="{{ route('admin.mc') }}" class="active">
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

    <section class="table-marketing-coordinator-section table-section">
        <div class="table-marketing-coordinator-wrapper table-wrapper">
            <div class="table-marketing-coordinator-name table-name">
                <h2>Marketing Coordinator Account</h2>
            </div>
            <div class="table-search-wrap">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <input class="search-bar" type="text" name="search-bar" id="search-bar" placeholder="Search">
            </div>
            <div class="container-checkbox">
                <div class="create-marketing-coordinator create-new"  style="width: 100%">
                    <form action="{{ route('mc.add') }}">
                        <button class="create-marketing-coordinator-btn create-new-btn">Create</button>
                    </form>
                </div>
            </div>

            <div class="table-marketing-coordinator-wrap table-wrap">
                <table class="table-marketing-coordinator table">
                    <thead class="table-marketing-coordinator-list-head-wrap table-list-head-wrap">
                    <tr class="table-marketing-coordinator-list-head table-list-head">
                        <th class="table-marketing-coordinator-head table-head">Name</th>
                        <th class="table-marketing-coordinator-head table-head">Email</th>
                        <th class="table-marketing-coordinator-head table-head">Phone</th>
                        <th class="table-marketing-coordinator-head table-head">Years</th>
                        <th class="table-marketing-coordinator-head table-head" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px;">Active</th>
                    </tr>
                    </thead>
                    <tbody class="table-marketing-coordinator-list-body-wrap table-list-body-wrap">
                    @foreach($user as $info)
                        <tr class="table-marketing-coordinator-list-body table-list-body">
                            <td class="table-marketing-coordinator-body table-body">{{ $info->name }}</td>
                            <td class="table-marketing-coordinator-body table-body">{{ $info->email }}</td>
                            <td class="table-marketing-coordinator-body table-body">{{ $info->phone }}</td>
                            <td class="table-marketing-coordinator-body table-body">{{ $info->faculty_id }}</td>
                            <td class="table-marketing-coordinator-body table-body">
                                <nav class="nav-function">
                                    <button class="function-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                                    </button>
                                    <div class="list-function">
                                        <li class="function-item">
                                            <form action="{{ route('mc.edit')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $info->id }}">
                                                <button>Edit</button>
                                            </form>
                                        </li>
                                        <li class="function-item">
                                            <form action="{{ route('mc.delete') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $info->id }}">
                                                <button>Delete</button>
                                            </form>
                                        </li>
                                    </div>
                                </nav>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>


</div>
<script src="{{ asset('/js/index.js') }}"></script>
<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="{{ asset('/js/dropdown.js') }}"></script>
<script src="{{ asset('/js/error.js') }}"></script>
<script src="{{ asset('/js/search-bar.js') }}"></script>
</body>
</html>
