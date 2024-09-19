<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $data = DB::table('movies')->get();
        return view('pages.movies', compact('data'));
    }

    public function show_add_movie_form()
    {
        return view('pages.add_movie');
    }


    public function add_movie(Request $request)
    {
        $filename = null;

        $request->validate([
            'title' => 'required|string|max:100',
            'star_rating' => 'required|min:1|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // get the file name
            $file->move(public_path('_uploads'), $filename); // save to folder
        }


        $query = DB::table('movies')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'director' => $request->director,
            'star_rating' => $request->star_rating,
            'date_published' => $request->date_published,
            'image' => $filename,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($query) {
            return redirect(url('/movies'))->with('success', 'Movie added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add the movie!');
        }
    }

    public function show_edit_movie_form($id)
    {
        $movie = DB::table('movies')->where('id', $id)->first();

        if (!$movie) {
            return redirect()->back()->with('error', 'Movie not found!');
        }

        return view('pages.edit_movie', compact('movie'));
    }

    public function do_edit(Request $request, $id)
    {
        $query = DB::table('movies')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'director' => $request->director,
            'star_rating' => $request->star_rating,
            'date_published' => $request->date_published,
            'updated_at' => now(),
        ]);

        if ($query) {
            return redirect(url('/movies'))->with('success', 'Movie updated successfully!');
        }
    }

    public function do_delete($id)
    {
        $query = DB::table('movies')->where('id', $id)->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Movie deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the movie!');
        }
    }
}
