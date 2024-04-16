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
            <a href="{{ route('admin.home') }}" class="active">
                <span class="material-icons">grid_view</span>
                <h3>Dashboard</h3>
            </a>
            <a href="{{ route('admin.student') }}" >
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
    <main>
        <h1>
            Dashboard
        </h1>
        <div class="date">
            <input type="date">
        </div>
        <div class="insights">
            <div class="sales">
                <span class="material-symbols-outlined">analytics</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total sales</h3>
                        <h1>$25,024</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'> </circle>
                        </svg>
                        <div class="number">
                            <p>81%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted"> Last 24 Hours</small>
            </div>
            <!-- END OFF SALES -->
            <div class="expenses">
                <span class="material-symbols-outlined">bar_chart</span>
                <div class="middle">
                    <div class="left">
                        <h3>Expenses</h3>
                        <h1>$14,160</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>62%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">Last 24 Hours</small>
            </div>
            <!-- END OFF Expense -->
            <div class="income">
                <span class="material-symbols-outlined">stacked_line_chart</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Income</h3>
                        <h1>$10,864</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'> </circle>
                        </svg>
                        <div class="number">
                            <p>44%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted"> Last 24 Hours</small>
            </div>
            <!-- END OFF income -->
        </div>
        <!-- END OF INSIGHTS -->
        <div class="recent-orders">
            <h2>Recent Orders</h2>
            <table>
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Number</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <a href="#">Show All</a>
        </div>
    </main>
    <!-- END of main -->
{{--    <div class="right">--}}
{{--        <div class="top">--}}
{{--            <button id="menu-btn">--}}
{{--                <span class="material-symbols-outlined">menu</span>--}}
{{--            </button>--}}
{{--            <div class="theme-toggler">--}}
{{--                <span class="material-symbols-outlined active">light_mode</span>--}}
{{--                <span class="material-symbols-outlined">dark_mode</span>--}}
{{--            </div>--}}
{{--            <div class="profile">--}}
{{--                <div class="info">--}}
{{--                    <p>hey, <b>Daniel</b></p>--}}
{{--                    <small class="text-muted">Admin</small>--}}
{{--                </div>--}}
{{--                <div class="profile-photo">--}}
{{--                    <img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/avatar.jpg" alt="Profile Photo">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End OF TOP -->--}}
{{--        <div class="recent-updates">--}}
{{--            <h2>recent-updates</h2>--}}
{{--            <div class="updates">--}}
{{--                <div class="update">--}}
{{--                    <div class="profile-photo">--}}
{{--                        <img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/avatar.jpg" alt="Profile Photo">--}}
{{--                    </div>--}}
{{--                    <div class="message">--}}
{{--                        <p><b>Mike Typson</b> recived his order of night lion tech GPS drone.</p>--}}
{{--                        <small class="text-muted">2 minutes ago</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="update">--}}
{{--                    <div class="profile-photo">--}}
{{--                        <img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/avatar.jpg" alt="Profile Photo">--}}
{{--                    </div>--}}
{{--                    <div class="message">--}}
{{--                        <p><b>Mike Typson</b> recived his order of night lion tech GPS drone.</p>--}}
{{--                        <small class="text-muted">2 minutes ago</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="update">--}}
{{--                    <div class="profile-photo">--}}
{{--                        <img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/avatar.jpg" alt="Profile Photo">--}}
{{--                    </div>--}}
{{--                    <div class="message">--}}
{{--                        <p><b>Mike Typson</b> recived his order of night lion tech GPS drone.</p>--}}
{{--                        <small class="text-muted">2 minutes ago</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end of recent update -->--}}
{{--        <div class="sales-analytics">--}}
{{--            <h2>sales-analytics</h2>--}}
{{--            <div class="item online">--}}
{{--                <div class="icon">--}}
{{--                    <span class="material-symbols-outlined">shopping_cart</span>--}}
{{--                </div>--}}
{{--                <div class="right">--}}
{{--                    <div class="info">--}}
{{--                        <h3>ONLINE Orders</h3>--}}
{{--                        <small class="text-muted"> Last 24 Hours</small>--}}
{{--                    </div>--}}
{{--                    <h5 class="success">+35%</h5>--}}
{{--                    <h3>3849</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="item offline">--}}
{{--                <div class="icon">--}}
{{--                    <span class="material-symbols-outlined">local_mall</span>--}}
{{--                </div>--}}
{{--                <div class="right">--}}
{{--                    <div class="info">--}}
{{--                        <h3>OFFLINE Orders</h3>--}}
{{--                        <small class="text-muted"> Last 24 Hours</small>--}}
{{--                    </div>--}}
{{--                    <h5 class="danger">-17%</h5>--}}
{{--                    <h3>1100</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="item customers">--}}
{{--                <div class="icon">--}}
{{--                    <span class="material-symbols-outlined">person</span>--}}
{{--                </div>--}}
{{--                <div class="right">--}}
{{--                    <div class="info">--}}
{{--                        <h3>New Customer</h3>--}}
{{--                        <small class="text-muted"> Last 24 Hours</small>--}}
{{--                    </div>--}}
{{--                    <h5 class="success">+25%</h5>--}}
{{--                    <h3>849</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="item add-product">--}}
{{--                <span class="material-symbols-outlined">add</span>--}}
{{--                <h3>Add Product</h3>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
<script src="{{ asset('/js/order.js') }}"></script>
<script src="{{ asset('/js/index.js') }}"></script>
</body>
</html>
