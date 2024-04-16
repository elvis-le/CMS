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
                                <li><a href="{{ url('/student/index') }}">Home</a></li>
                                <li><a href="{{ url('/student/terms-and-conditions') }}">Terms and Conditions</a></li>
                                <li><a href="{{ url('/student/contact-us') }}">Contact Us</a></li>
                                <li>
                                    <div class="dropdown">
                                        <button id="btn-dropdown" class="dropbtn">
                                            <div>{{ Auth::user()->name }}</div>
                                        </button>
                                        <div id="mydropdown" class="dropdown-content">
                                            <a href="{{ route('profile.edit') }}" style="color: #1b1e21">Profile</a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"  style="color: #1b1e21">Log Out</a>
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

<!-- ======================slider section started====================== -->

<section id="carouselExampleFade" class="carousel slide carousel-fade slider" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('/images/slider/greenwich_1.png') }}" class="d-block" alt="...">
            <div class="carousel-caption">
                <h2>Best Education For Diploma</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui perspiciatis, eveniet sequi labore vel
                    itaque adipisci odio necessitatibus voluptatibus saepe, impedit enim unde velit amet rem, suscipit
                    corrupti vero ad.</p>
                <div class="button-01">
                    <ul>
                        <li><a href="#">Get Started Now</a></li>
                        <li><a href="#">View Courses</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/images/slider/greenwich_2.png') }}" class="d-block" alt="...">
            <div class="carousel-caption">
                <h2>Best Education For Diploma</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui perspiciatis, eveniet sequi labore vel
                    itaque adipisci odio necessitatibus voluptatibus saepe, impedit enim unde velit amet rem, suscipit
                    corrupti vero ad.</p>
                <div class="button-01">
                    <ul>
                        <li><a href="#">Get Started Now</a></li>
                        <li><a href="#">View Courses</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/images/slider/greenwich_3.png') }}" class="d-block" alt="...">
            <div class="carousel-caption">
                <h2>Best Education For Diploma</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui perspiciatis, eveniet sequi labore vel
                    itaque adipisci odio necessitatibus voluptatibus saepe, impedit enim unde velit amet rem, suscipit
                    corrupti vero ad.</p>
                <div class="button-01">
                    <ul>
                        <li><a href="#">Get Started Now</a></li>
                        <li><a href="#">View Courses</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</section>

<!-- ====================== section started====================== -->

<section class="bg-01">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="se-box">
                    <div class="icon">
                        <i class="fal fa-chalkboard-teacher"></i>
                    </div>
                    <div class="content">
                        <h3>Professional Teachers</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="se-box">
                    <div class="icon">
                        <i class="fal fa-globe-americas"></i>
                    </div>
                    <div class="content">
                        <h3>Learn Anywhere Online</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="se-box">
                    <div class="icon">
                        <i class="fal fa-graduation-cap"></i>
                    </div>
                    <div class="content">
                        <h3>Graduation Certificate</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="se-box">
                    <div class="icon">
                        <i class="fal fa-backpack"></i>
                    </div>
                    <div class="content">
                        <h3>Over 1000 Scholarship</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================== Featured started====================== -->

<section class="bg-02">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">
                    <h2>Magazines</h2>
                </div>
            </div>
            @csrf
            @foreach($magazine as $info)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-box">
                        <div class="feature-card">
                            <a href="{{ url('/student/magazine-detail?id=' . $info->id) }}" ><i class="far fa-link"></i></a>
                            <img src="{{ asset( $info->magazine_image ) }}">
                        </div>
                        <div class="content">
                            <h3>{{ $info->magazine_name }}</h3>
                            <p>{{ $info->magazine_detail }}</p>
                            <ol>
                                <li>{{ $info->publish_date }}</li>
                                <li>{{ $info->deadline }}</li>
                                <li>3 student</li>
                            </ol>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{--<section class="bg-03">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">--}}
{{--                <div class="_lk_bg_cd">--}}
{{--                    <i class="fal fa-history"></i>--}}
{{--                    <div class="counting" data-count="967">100</div>--}}
{{--                    <h5>Megazines</h5>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">--}}
{{--                <div class="_lk_bg_cd">--}}
{{--                    <i class="fal fa-graduation-cap"></i>--}}
{{--                    <div class="counting" data-count="967">100</div>--}}
{{--                    <h5>Student Contributions</h5>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">--}}
{{--                <div class="_lk_bg_cd">--}}
{{--                    <i class="fal fa-globe"></i>--}}
{{--                    <div class="counting" data-count="967">100</div>--}}
{{--                    <h5>Number of Students</h5>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">--}}
{{--                <div class="_lk_bg_cd">--}}
{{--                    <i class="fal fa-registered"></i>--}}
{{--                    <div class="counting" data-count="967">100</div>--}}
{{--                    <h5>The magazine is complete</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<!-- ====================== Blog Section started====================== -->--}}

{{--<section class="bg-04">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="heading">--}}
{{--                    <h2>Student Contributions</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">--}}
{{--                <article class="_lk_bg_sd_we">--}}
{{--                    <div class="_bv_xs_we"></div>--}}
{{--                    <div class="_xs_we_er">--}}
{{--                        <div class="_he_w">--}}
{{--                            <h3>Easy English Learning Way</h3>--}}
{{--                            <ol>--}}
{{--                                <li><span>by</span> Quoc Khanh<span class="_mn_cd_xs">17/03/2024</span></li>--}}
{{--                            </ol>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt--}}
{{--                                ut labore.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </article>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">--}}
{{--                <article class="_lk_bg_sd_we">--}}
{{--                    <div class="_bv_xs_we" style="background:url({{ asset('/images/blog/img-01.jpg') }}"></div>--}}
{{--                    <div class="_xs_we_er">--}}
{{--                        <div class="_he_w">--}}
{{--                            <h3>Summer Course Start From 1st June</h3>--}}
{{--                            <ol>--}}
{{--                                <li><span>by</span> Thien An<span class="_mn_cd_xs">20/03/2034</span></li>--}}
{{--                            </ol>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt--}}
{{--                                ut labore.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </article>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">--}}
{{--                <article class="_lk_bg_sd_we">--}}
{{--                    <div class="_bv_xs_we" style="background:url({{ asset('/images/blog/img-03.jpg') }}"></div>--}}
{{--                    <div class="_xs_we_er">--}}
{{--                        <div class="_he_w">--}}
{{--                            <h3>How to communicate with friends</h3>--}}
{{--                            <ol>--}}
{{--                                <li><span>by</span> Vinh Phuc<span class="_mn_cd_xs">16/02/2024</span></li>--}}
{{--                            </ol>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt--}}
{{--                                ut labore.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </article>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- ====================== Footer Section started====================== -->


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="_kl_de_w">
                    <h3>Greenwich University</h3>
                    <p>ipsum dolor sit amet, Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
                    <p>© 2020 All Rights Reserved by<a href="https://www.smarteyeapps.com/">Greenwich University</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>

<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="{{ asset('/js/dropdown.js') }}"></script>
</html>
