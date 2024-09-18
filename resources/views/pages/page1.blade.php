@extends('layouts.app')

@section('content')
    @if (Session::has('success'))
        <p class="alert alert-primary">{{ Session::get('success') }}</p>
    @endif

    @if (Session::has('error'))
        <p class="alert alert-danger">Error!</p>
    @endif

    <x-page-header pageTitle="Page One Content" actionUrl="/add-movie" />

    <div class="wrapper wrapper-content">
        <h3>Movies</h3>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>DESC</th>
                    <th>DIRECTOR</th>
                    <th>RATING</th>
                    <th>PUBLISHED</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->title }}</td>
                        <td>{{ $d->description }}</td>
                        <td>{{ $d->director }}</td>
                        <td>{{ $d->star_rating }}</td>
                        <td>{{ $d->date_published }}</td>
                        <td class="text-center">
                            <!-- Edit button -->
                            <a href="{{ url('/edit-movie/' . $d->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <!-- Delete button -->
                            <form action="{{ url('/delete-movie/' . $d->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
