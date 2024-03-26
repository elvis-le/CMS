<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

Route::get('/magazine-detail', function () {
    return view('magazine-detail');
});

Route::get('/contribution', function () {
    return view('contribution');
});

Route::get('/BusinessAdministration', function () {
    return view('BusinessAdministration');
});

Route::get('/coordinatormkt', function () {
    return view('coordinatormkt');
});

Route::get('/GraphicandDigitalDesign', function () {
    return view('GraphicandDigitalDesign');
});

Route::get('/InformationTechnology', function () {
    return view('InformationTechnology');
});

Route::get('/managermkt', function () {
    return view('managermkt');
});

//Route::get('/', function () {
//    return view('login');
//});
//
//Route::get('/', function () {
//    return view('login');
//});
//
//Route::get('/', function () {
//    return view('login');
//});

