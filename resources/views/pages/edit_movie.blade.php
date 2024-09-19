@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3>Edit Movie</h3>
                <form action="{{ url('/edit-movie/' . $movie->id) }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $movie->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control">{{ $movie->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="director">Director</label>
                        <input type="text" name="director" class="form-control" value="{{ $movie->director }}">
                    </div>

                    <div class="form-group">
                        <label for="star_rating">Star Rating</label>
                        <input type="number" name="star_rating" class="form-control" value="{{ $movie->star_rating }}">
                    </div>

                    <div class="form-group">
                        <label for="date_published">Date Published</label>
                        <input type="date" name="date_published" class="form-control"
                            value="{{ $movie->date_published }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Movie</button>
                </form>
            </div>
        </div>
    @endsection
