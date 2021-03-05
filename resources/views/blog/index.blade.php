@extends('layouts.apps')

@section('tittle','Blog')

<style>
    h1{
        text-align: center;
    }
</style>

@section('content')
<div class="container">
    <a href="/blog/create" type="button" class="btn btn-success btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        Create Blog
    </a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($article as $article)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$article->tittle}}</td>
                <td>
                    <form action="/blog/{{$article->id}}" method="post">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                        <a href="/blog/{{$article->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @include('sweetalert::alert')
@endsection
