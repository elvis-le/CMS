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
                                    <li><a href="coordinatormkt.html">Contributions Of Student</a></li>
                                    <li><a href="contact-us.blade.php">Contact Us</a></li>
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
                        <h2>Contributions Of Student</h2>
                        <p>List of Contributions<i class="fas fa-angle-right"></i><span>Contributions</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ******************************* -->

    <main class="container">
        <section class="contributions">
            <h2 class="section-title">Contribution Management Page</h2>
            <p class="section-description">As a Marketing Coordinator, this page allows you to manage student contributions within the Faculty. You can view, edit, and select contributions for publication.</p>
            <div class="action-buttons">
                <button class="publish-all-btn"> Publish </button>
                <button class="reject-all-btn"> Reject </button>
            </div>
            <ul class="contributions-list">
                <li class="contribution-item">
                    <input type="checkbox" class="contribution-checkbox">
                    <div class="contribution-details">
                        <h3 class="contribution-title">Contribution Name 1</h3>
                        <p class="contribution-description">A brief description of contribution 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et porttitor lorem, nec vehicula erat.</p>
                        <div class="contribution-actions">
                            <button class="view-detail-btn" onclick="toggleDetail(this)">View Detail</button>
                            <div class="contribution-detail">
                                <p><strong>Student Name:</strong> John Doe</p>
                                <p><strong>Student ID:</strong> ABC123</p>
                                <p><strong>File:</strong> <a href="#">Download File</a></p>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- Add more items if needed -->
            </ul>
        </section>
    </main>

    <!-- ******************************* -->


    <footer>
        <!-- Footer content here -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="_kl_de_w">
                        <h3>SMART GROUP</h3>
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
