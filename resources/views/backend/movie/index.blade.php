@extends('backend.layouts.main')

@section('title', 'All movies')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 d-flex ">
                <div class="col-6">
                    <h1>All movies</h1>

                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.movie.create') }}" class="btn btn-block btn-primary mr-2 ">Create</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Movie name</th>
                                    <th >Movie status</th>
                                    <th style="width: 170px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($movies as $movie)
                                    <tr>
                                        <td> {{ $movie->id }} </td>
                                        <td> {{ $movie->movie_name }} </td>
                                        <td>
                                            @if($movie->movie_status == 1)
                                                <a href="{{ route('admin.movie.status', $movie->id) }}" onclick="return confirm('Are you Sure?')" class="w-25 btn btn-sm btn-danger">Do not publish</a>
                                            @else
                                                <a href="{{ route('admin.movie.status', $movie->id) }}" onclick="return confirm('Are you Sure?')" class="w-25 btn btn-sm btn-success">Publish</a>
                                            @endif
                                        </td>
                                        <td class="d-flex align-items-baseline">
                                            <a href="{{ route('admin.movie.edit', $movie->id) }}" class="btn btn-block btn-warning mr-2">Edit</a>
                                            <form action="{{ route('admin.movie.delete', $movie->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-block btn-danger btn-delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer clearfix">

                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $movies->links( "pagination::bootstrap-4") }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
