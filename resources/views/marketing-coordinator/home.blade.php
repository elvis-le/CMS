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
                                <li><a href="">Home</a></li>
                                <li><a href="coordinatormkt.blade.php">Contributions Of Student</a></li>
                                <li><a href="student/contact-us.blade.php">Marketing Manager</a></li>
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

<!-- ******************************* -->

<div class="container">

    <div class="SelectedContributions">
        <h2>Graphic and Digital Design</h2>
    </div>

    <main>
        <section class="contributions">
            <div class="contribution">
                <h5>Unit 9: Software Development Life Cycle (1631)</h5>
                <p class="contribution-detail-01">Mandatory Assignment</p>
                <a href="#" class="download-link">Download</a>
            </div>

            <div class="contribution">
                <h5>Unit 9: Software Development Life Cycle (1631)</h5>
                <p class="contribution-detail-01">Mandatory Assignment</p>
                <a href="#" class="download-link">Download</a>
            </div>

            <div class="contribution">
                <h5>Unit 9: Software Development Life Cycle (1631)</h5>
                <p class="contribution-detail-01">Mandatory Assignment</p>
                <a href="#" class="download-link">Download</a>
            </div>

            <div class="contribution">
                <h5>Unit 9: Software Development Life Cycle (1631)</h5>
                <p class="contribution-detail-01">Mandatory Assignment</p>
                <a href="#" class="download-link">Download</a>
            </div>
        </section>
    </main>
</div>


<!-- ******************************* -->


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
</body>
</html>
