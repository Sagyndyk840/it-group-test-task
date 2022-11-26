@extends('backend.layouts.main')

@section('title', 'Create genre')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create genre</h1>
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
                        <form action="{{ route('admin.genre.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="genre_name">Genre name</label>
                                    <input type="text" class="form-control" id="genre_name" name="genre_name" placeholder="Enter genre name">
                                </div>
                                @error('genre_name') <div class="text-red">{{ $message }}</div> @enderror
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
