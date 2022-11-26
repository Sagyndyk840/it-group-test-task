@extends('backend.layouts.main')

@section('title', 'Create movie')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create movie</h1>
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
                            <h3 class="card-title">Create</h3>
                        </div>
                        <form action="{{ route('admin.movie.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="movie_name">Movie name</label>
                                    <input type="text" class="form-control" id="movie_name" name="movie_name" placeholder="Enter movie name">
                                    @error('movie_name')
                                    <div class="text-red">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Movie image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="avatar" id="avatar">
                                            <label class="custom-file-label" for="avatar">Choose image</label>
                                            @error('avatar')
                                            <div class="text-red">{{ $message }}</div>
                                            @enderror
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
                                            <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
