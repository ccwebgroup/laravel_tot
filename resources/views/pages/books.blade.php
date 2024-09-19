@extends('layouts.app')

@section('content')
    @if (Session::has('success'))
        <p class="alert alert-primary">{{ Session::get('success') }}</p>
    @endif

    @if (Session::has('error'))
        <p class="alert alert-danger">Error!</p>
    @endif

    <x-page-header pageTitle="Books List" actionUrl="/add-book" />

    <div class="wrapper wrapper-content">
        <h3>Books</h3>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>DESC</th>
                    <th>COUNTRY ID</th>
                    <th>STOCKS</th>
                    <th>AMOUNT</th>
                    <th>PHOTO</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->title }}</td>
                        <td>{{ $d->description }}</td>
                        <td>{{ $d->country_id }}</td>
                        <td>{{ $d->stocks }}</td>
                        <td>{{ $d->amount }}</td>
                        <td>
                            @if ($d->photo)
                                <img src="{{ asset($d->photo) }}" alt="Book photo" style="width:50px; height:50px;">
                            @else
                                No photo
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Edit button -->
                            <a href="{{ url('/edit-book/' . $d->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <!-- Delete button -->
                            <form action="{{ url('/delete-book/' . $d->id) }}" method="POST" style="display:inline;">
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
