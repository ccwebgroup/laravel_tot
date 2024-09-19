<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $data = DB::table('books')->get();
        return view('pages.books', compact('data'));
    }

    public function show_add_book_form()
    {
        return view('pages.add_book');
    }

    public function add_book(Request $request)
    {
        if ($request->isMethod('post')) {
            // Handle file upload for 'photo' if present
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move('_uploads', $imageName);
                $photoPath = '_uploads/' . $imageName;
            }

            $query = DB::table('books')->insert([
                'title' => $request->title,
                'description' => $request->description,
                'country_id' => $request->country_id,
                'stocks' => $request->stocks,
                'amount' => $request->amount,
                'photo' => $photoPath, // Save photo path
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($query) {
                return redirect(url('/books'))->with('success', 'Book added successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to add the book!');
            }
        }
    }

    public function show_edit_book_form($id)
    {
        $book = DB::table('books')->where('id', $id)->first();

        if (!$book) {
            return redirect()->back()->with('error', 'Book not found!');
        }

        return view('pages.edit_book', compact('book'));
    }

    public function do_edit(Request $request, $id)
    {
        $query = DB::table('books')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'country_id' => $request->country_id,
            'stocks' => $request->stocks,
            'amount' => $request->amount,
            'updated_at' => now(),
        ]);

        if ($query) {
            return redirect(url('/books'))->with('success', 'Book updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update the book!');
        }
    }

    public function do_delete($id)
    {
        $query = DB::table('books')->where('id', $id)->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Book deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the book!');
        }
    }
}
