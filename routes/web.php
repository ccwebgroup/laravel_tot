<?php

use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page2', function () {
    return view('pages.page2');
});
Route::get('/page3', function () {
    return view('pages.page3');
});

Route::get('/page1', [MovieController::class, 'index']);
Route::get('/add-movie', [MovieController::class, 'show_add_movie_form']);
Route::post('/add-movie', [MovieController::class, 'add_movie']);

Route::get('/edit-movie/{id}', [MovieController::class, 'show_edit_movie_form']);
Route::post('/edit-movie/{id}', [MovieController::class, 'do_edit']);

Route::delete('/delete-movie/{id}', [MovieController::class, 'do_delete']);






Route::get('/query-test', function () {

    $data =  DB::select("SELECT * FROM movies where id = 3");

    $data =  DB::table('movies')->get();
    $data =  DB::table('movies')->where('id',4)->get();
    $data =  DB::table('movies')->where('id','>', 50)->get();

    $data =  DB::table('movies')
    ->where('id','>', 50)
    ->where('star_rating','<',3)
    ->get();

    $data =  DB::table('movies')
    ->where('id','>', 50)
    ->whereOr('star_rating','<',3)
    ->get();

    $data =  DB::table('movies')
    ->whereBetween('date_published',['2020-01-01', '2023-01-01'])
    ->get();

    $data =  DB::table('movies')
    ->whereBetween('date_published',['2020-01-01', '2023-01-01'])
    ->orderBy('title','asc')
    ->get();

    $data =  DB::table('movies')
    ->select('title','star_rating')
    ->whereBetween('date_published',['2020-01-01', '2023-01-01'])
    ->orderBy('title','asc')
    ->get();

    $data =  DB::table('movies')
    ->select('title','star_rating')
    ->orderBy('title','asc')
    ->count();

    $data =  DB::table('movies')
    ->orderBy('title','asc')
    ->avg('star_rating');

    $data =  DB::table('movies')
    ->orderBy('title','asc')
    ->sum('star_rating');

    $data =  DB::table('movies')
    ->where([
            ['id', '>', 40],
            ['star_rating','<',3]
        ])
    ->get();

    $data =  DB::table('movies')
    ->where('description','LIKE','%nostrum%')
    ->get();

    $data =  DB::table('movies')
    ->whereLike('description','%nostrum%')
    ->get();

    dd($data);

});
