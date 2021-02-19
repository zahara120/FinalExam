@extends('layouts.apps')

@section('tittle','User')

@section('content')
<div class="container">

    <table class="table table-dark table-hover">
    <thead>
        <tr>
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($user as $user)
        <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{  $user->name}}</td>
        <td>{{  $user->email }}</td>
        <td>
            <form action="{{  url("userMenu/{$user->id}/delete") }}" method="post">
            @csrf
            @method('delete')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>    
        </td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection