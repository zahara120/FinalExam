@extends('layouts.apps')

@section('tittle','Create Blog')

<style>
    h1{
        text-align: center;
    }
</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{  url('/createBlog/store')  }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="tittle" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="tittle" type="text" class="form-control @error('tittle') is-invalid @enderror" name="tittle" value="{{ old('tittle') }}" required autocomplete="tittle" autofocus>

                                    @error('tittle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Default select example" id="category"name="category_id" >
                                        <option selected>Select Category</option>
                                        @foreach($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="file" class="col-md-4 col-form-label text-md-right" >Image</label>
                                <div class="col-md-6"> 
                                    <input class="form-control form-control-sm" name="image_uploded" id="image_uploded" type="file">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="floatingTextarea2" class="col-md-4 col-form-label text-md-right">Story</label>
                                <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Leave a comment here" style="height: 100px" name="description" required autocomplete="description" value="{{ old('description') }}"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-success">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection