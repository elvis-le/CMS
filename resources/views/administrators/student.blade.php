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
    <link rel="stylesheet" href="{{ asset('/css/style-dashboard.css') }}">
</head>
<body>
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
                <span class="material-icons">person</span>
                <h3>Student</h3>
            </a>
            <a href="{{ route('admin.mc') }}">
                <span class="material-icons">receipt_long</span>
                <h3>Marketing Coordinator</h3>
            </a>
            <a href="{{ route('admin.academic') }}">
                <span class="material-icons">insights</span>
                <h3>Academic year</h3>
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

    <section class="table-user-section table-section">
        <div class="table-user-wrapper table-wrapper">
            <div class="table-user-name table-name">
                <h2>Student Account</h2>
            </div>
            <div class="table-search-wrap">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <input class="search-bar" type="text" name="search-bar" id="search-bar" placeholder="Search">
            </div>
            <div class="container-checkbox">
                <div class="year-of-university">
                    <div class="year-of-university-name">
                        <p>Year</p>
                    </div>
                    <input id="1" type="checkbox" checked name="year">
                    <label for="1">1</label>
                    <input id="2" type="checkbox" checked name="year">
                    <label for="2">2</label>
                    <input id="3" type="checkbox" checked name="year">
                    <label for="3">3</label>
                    <input id="4" type="checkbox" checked name="year">
                    <label for="4">4</label>
                </div>
                <div class="available-deleted">
                    <div class="available-deleted-name">
                        <p>Status</p>
                    </div>
                    <input id="available" type="checkbox" checked name="available-deleted">
                    <label for="available">Avaiable</label>
                    <input id="deleted" type="checkbox" checked name="available-deleted">
                    <label for="deleted">Delete</label>
                </div>
                <div class="create-student create-new">
                        <form action="{{ route('user.add') }}">
                            <button class="create-student-btn create-new-btn">Create</button>
                        </form>
                </div>
            </div>

            <div class="table-user-wrap table-wrap">
                <table class="table-user table">
                    <thead class="table-user-list-head-wrap table-list-head-wrap">
                    <tr class="table-user-list-head table-list-head">
                        <th class="table-user-head table-head">Name</th>
                        <th class="table-user-head table-head">Email</th>
                        <th class="table-user-head table-head">Phone</th>
                        <th class="table-user-head table-head">Years</th>
                        <th class="table-user-head table-head">Faculty</th>
                        <th class="table-user-head table-head">Active</th>
                    </tr>
                    </thead>
                    <tbody class="table-user-list-body-wrap table-list-body-wrap">
                    @foreach($user as $info)
                        <tr class="table-user-list-body table-list-body">
                            <td class="table-user-body table-body">{{ $info->name }}</td>
                            <td class="table-user-body table-body">{{ $info->email }}</td>
                            <td class="table-user-body table-body">{{ $info->phone }}</td>
                            <td class="table-user-body table-body">{{ $info->years_of_university }}</td>
                            <td class="table-user-body table-body">{{ $info->faculty_id }}</td>
                            <td class="table-user-body table-body">
                                <nav class="nav-function">
                                    <button class="function-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                                    </button>
                                    <div class="list-function">
                                            <li class="function-item">
                                                <form action="{{ route('user.edit')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $info->id }}">
                                                    <button>Edit</button>
                                                </form>
                                            </li>
                                            <li class="function-item">
                                                <form action="{{ route('user.delete') }}" method="post" enctype="multipart/form-data">
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
<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="{{ asset('/js/dropdown.js') }}"></script>
</body>
</html>
