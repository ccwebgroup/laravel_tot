@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Edit Book</h5>
                    </div>
                    <div class="ibox-content">
                        <form action="{{ url('edit-book/' . $book->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ $book->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="3" required>{{ $book->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="country_id">Country ID</label>
                                <input type="number" id="country_id" name="country_id" class="form-control" value="{{ $book->country_id }}" required>
                            </div>

                            <div class="form-group">
                                <label for="stocks">Stocks</label>
                                <input type="number" id="stocks" name="stocks" class="form-control" value="{{ $book->stocks }}" required>
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" id="amount" name="amount" class="form-control" step="0.01" value="{{ $book->amount }}" required>
                            </div>

                            <div class="form-group">
                                <label for="photo">Book Photo</label>
                                <input type="file" id="photo" name="photo" class="form-control">
                                <small>Leave empty if you don't want to change the current photo.</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
