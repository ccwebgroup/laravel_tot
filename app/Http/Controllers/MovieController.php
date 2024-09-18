<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $data = DB::table('movies')->get();
        return view('pages.page1', compact('data'));
    }

    public function show_add_movie_form()
    {
        return view('pages.add_movie');
    }


    public function add_movie(Request $request)
    {
        if ($request->isMethod('post')) {
            $query = DB::table('movies')->insert([
                'title' => $request->title,
                'description' => $request->description,
                'director' => $request->director,
                'star_rating' => $request->star_rating,
                'date_published' => $request->date_published,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($query) {
                return redirect(url('/page1'))->with('success', 'Movie added successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to add the movie!');
            }
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
            return redirect(url('/page1'))->with('success', 'Movie updated successfully!');
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
