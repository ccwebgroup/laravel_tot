@extends('layouts.app')

@section('content')
    <x-page-header pageTitle="Page One Content" />

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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
