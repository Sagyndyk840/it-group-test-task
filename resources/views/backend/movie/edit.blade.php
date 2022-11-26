@extends('backend.layouts.main')

@section('title', 'Edit' . ' '. $movie->movie_name)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit movie</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit movie: {{ $movie->movie_name }}</h3>
                        </div>
                        <form action="{{ route('admin.movie.update', $movie->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="movie_name">Movie name</label>
                                    <input type="text" class="form-control" id="movie_name" value="{{ $movie->movie_name }}" name="movie_name" placeholder="Enter movie name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Movie image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="avatar" id="avatar">
                                            <label class="custom-file-label" for="avatar">Choose image</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Select Multiple</label>
                                    <select multiple="" name="movie_genres[]" class="form-control">
                                        @foreach($genres as $genre)
                                            <option @if($movie->genres->contains('id', $genre->id)) selected @endif value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            @if($movie->getFirstMediaUrl('movies', 'thumb'))
                                <img class="w-100" src="{{ $movie->getFirstMediaUrl('movies', 'thumb') }}" alt="">
                            @endif
                        </div>
                        <div class="card-body">
                            @if($movie->movie_status == 1)
                                <a href="{{ route('admin.movie.status', $movie->id) }}" onclick="return confirm('Are you Sure?')" class="w-50 btn btn-sm btn-danger">Do not publish</a>
                            @else
                                <a href="{{ route('admin.movie.status', $movie->id) }}" onclick="return confirm('Are you Sure?')" class="w-50 btn btn-sm btn-success">Publish</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
