@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Add Movie</h5>
                    </div>
                    <div class="ibox-content">
                        <!-- Form for adding a movie -->
                        <form action="{{ url('add-movies') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter movie title" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter movie description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="director">Director</label>
                                <input type="text" id="director" name="director" class="form-control" placeholder="Enter director's name" required>
                            </div>

                            <div class="form-group">
                                <label for="star_rating">Star Rating</label>
                                <input type="number" id="star_rating" name="star_rating" class="form-control" min="1" max="5" placeholder="Enter star rating (1-5)" required>
                            </div>

                            <div class="form-group">
                                <label for="date_published">Date Published</label>
                                <input type="date" id="date_published" name="date_published" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Movie</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
