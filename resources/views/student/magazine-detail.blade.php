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
                        <h2>Magazine Detail</h2>
                        <p>Home<i class="fas fa-angle-right"></i><span>Magazine Detail</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="se-001">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="_Ol_er_qw">
                        <h3>{{$magazine->magazine_name}}</h3>
                        <p>{{$magazine->magazine_detail}}</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="_Ol_er_qw yu">
                        <img src="{{ asset($magazine->magazine_image) }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form action="{{ route('contribution') }}" method="post" class="contribution-btn">
        @csrf
        <input type="hidden" name="id" value="{{ $magazine->id }}">
        <button type="submit">Contribution</button>
    </form>
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
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
</html>
