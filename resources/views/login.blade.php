<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{ asset('/css/bootstrap-login.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style-login.css') }}" rel="stylesheet">

    <title>Educational Bootstrap 5 Login Page Website Tampalte</title>
</head>
<body>
<section class="form-02-main">
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="_lk_de">
                    <div class="form-03-main">
                        <div class="logo">
                            <img src="{{ asset('/images/user.png') }}">
                        </div>
                        <div class="form-group">
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="form-control _ge_de_ol"
                                   placeholder="Enter Email" aria-required="true" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <x-text-input id="password" type="password" name="password" class="form-control _ge_de_ol"
                                   placeholder="Enter Password"  aria-required="true" required autocomplete="current-password"  />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="checkbox form-group">
                            <div class="form-check">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    Forgot your password?
                                </a>
                            @endif
                        </div>

                        <div class="form-group">
                                <button class="_btn_04">Login</button>
                        </div>

                        <div class="form-group nm_lk"><p>Or Login With</p></div>

                        <div class="form-group pt-0">
                            <div class="_social_04">
                                <ol>
                                    <li><i class="fa fa-google-plus"></i></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>
</section>
