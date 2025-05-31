// Code par NetNPB.com 
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return request()->header('X-SPA')
        ? view('pages.home')->render()
        : view('spa-lite::layout', ['view' => 'pages.home']);
});

Route::get('/about', function () {
    return request()->header('X-SPA')
        ? view('pages.about')->render()
        : view('spa-lite::layout', ['view' => 'pages.about']);
});