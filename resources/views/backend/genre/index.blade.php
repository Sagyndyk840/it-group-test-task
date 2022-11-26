@extends('backend.layouts.main')

@section('title', 'All genres')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 d-flex ">
                <div class="col-6">
                    <h1>All genres</h1>

                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.genre.create') }}" class="btn btn-block btn-primary mr-2 ">Create</a>
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
                                    <th>Genre name</th>
                                    <th style="width: 170px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($genres as $genre)
                                    <tr>
                                        <td> {{ $genre->id }} </td>
                                        <td> {{ $genre->genre_name }} </td>
                                        <td class="d-flex align-items-baseline">
                                            <a href="{{ route('admin.genre.edit', $genre->id) }}" class="btn btn-block btn-warning mr-2">Edit</a>
                                            <form action="{{ route('admin.genre.delete', $genre->id) }}" method="POST">
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
                                {{ $genres->links( "pagination::bootstrap-4") }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
