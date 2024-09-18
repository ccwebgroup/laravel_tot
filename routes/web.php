<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $data = DB::table('movies')->get();
    return view('pages.page1', ['data' => $data]);
});
Route::get('/page2', function () {
    return view('pages.page2');
});
Route::get('/page3', function () {
    return view('pages.page3');
});
Route::get('/add-movie', function () {
    return view('pages.add-movie');
});
Route::post('/add-movies', function (Request $request) {

    DB::table('movies')->insert([
        'title' => $request->input('title'),
        'description' =>$request->input('description'),
        'director' => $request->input('director'),
        'star_rating' => $request->input('star_rating'),
        'date_published' => $request->input('date_published'),
    ]);

    // Redirect or return response
    return redirect(url('/'))->with('success', 'Movie added successfully!');
});
