<!DOCTYPE html>
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
<header>
    <div class="my-nav">
        <div class="container">
            <div class="row">
                <div class="nav-items">
                    <div class="menu-toggle"></div>
                    <div class="logo">
                        <img src="{{ asset('/images/logo-Greenwich.png') }}">
                    </div>
                    <div class="menu-items">
                        <div class="menu">
                            <ul>
                                {{--                                <li><a href="">Home</a></li>--}}
                                {{--                                <li><a href="coordinatormkt.blade.php">Contributions Of Student</a></li>--}}
                                {{--                                <li><a href="student/contact-us.blade.php">Marketing Manager</a></li>--}}
                                <li>
                                    <div class="dropdown">
                                        <button id="btn-dropdown" class="dropbtn">
                                            <div>{{ Auth::user()->name }}</div>
                                        </button>
                                        <div id="mydropdown" class="dropdown-content">
                                            <a href="{{ route('profile.edit') }}">Profile</a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">Log Out</a>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="bg-02-a">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="_head_01">
                    <h2>Marketing Manager</h2>
                    <p>List of Course <i class="fas fa-angle-right"></i><a  class="text-white" href="managermkt.blade.php" > Contributions </a><i class="fas fa-angle-right"></i><span>Graphic and Digital Design</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="table-user-section">
    <div class="table-user-wrapper">
        <div class="table-user-name">
            <h2 class="table-name">User Account</h2>
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
            <div class="create-student">
                <form>
                    <button class="create-student-btn">Create</button>
                </form>
            </div>
        </div>

        <div class="table-user-wrap">
            <table class="table-user">
                <thead class="table-user-list-head-wrap">
                <tr class="table-user-list-head">
                    <th class="table-user-head">Name</th>
                    <th class="table-user-head">Email</th>
                    <th class="table-user-head">Phone</th>
                    <th class="table-user-head">Faculty</th>
                    <th class="table-user-head"></th>
                </tr>
                </thead>
                <tbody class="table-user-list-body-wrap">
                @foreach($user as $info)
                    <tr class="table-user-list-body">
                        <td class="table-user-body">{{ $info->name }}</td>
                        <td class="table-user-body">{{ $info->email }}</td>
                        <td class="table-user-body">{{ $info->phone }}</td>
                        <td class="table-user-body">{{ $info->faculty_id }}</td>
                        <td class="table-user-body"><a></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<footer>
    <!-- Footer content here -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="_kl_de_w">
                    <h3>Greenwich University</h3>
                    <p>
                        ipsum dolor sit amet, Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="_kl_de_w">
                    <h3>Quick Links</h3>
                    <ol>
                        <li><i class="far fa-angle-right"></i>home</li>
                        <li><i class="far fa-angle-right"></i>About Us</li>
                        <li><i class="far fa-angle-right"></i>Services</li>
                        <li><i class="far fa-angle-right"></i>Blog</li>
                        <li class="last"><i class="far fa-angle-right"></i>Contact Us</li>
                    </ol>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="_kl_de_w">
                    <h3>Courses</h3>
                    <ol>
                        <li><i class="far fa-angle-right"></i>MBA</li>
                        <li><i class="far fa-angle-right"></i>ME</li>
                        <li><i class="far fa-angle-right"></i>BE</li>
                        <li><i class="far fa-angle-right"></i>MBBS</li>
                        <li class="last"><i class="far fa-angle-right"></i>MA</li>
                    </ol>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="_kl_de_w">
                    <h3>Contact Us</h3>
                    <form class="my-form">
                        <div class="form-group">
                            <input class="form-control" type="emal" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea rows="3" placeholder="Message" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <a href="#">Submit</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12">
                <div class="copy-right">
                    <p>© 2020 All Rights Reserved by<a href="">Greenwich University</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="{{ asset('/js/dropdown.js') }}"></script>
</body>
</html>
