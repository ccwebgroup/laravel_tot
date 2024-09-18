<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $data = Movie::table('movies')->get();
        return view('pages.page1');
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
                return redirect(url('/pages1'))->with('success', 'Movie added successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to add the movie!');
            }
        }
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
            return redirect()->back()->with('success', 'Movie updated successfully!');
        }
    }

    public function do_delete($id)
    {
        // Delete the movie record from the database
        $query = DB::table('movies')->where('id', $id)->delete();

        // Check if the delete operation was successful
        if ($query) {
            return redirect()->back()->with('success', 'Movie deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the movie!');
        }
    }
}
