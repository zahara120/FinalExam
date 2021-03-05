<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home Page</title>
        <link rel="icon" type="image/png" href="/assets/ballon.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-image: url(/assets/bg2.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin:0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-right1 {
                position: absolute;
                right: 10px;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .top-left1 {
                position: absolute;
                left: 250px;
                top: 18px;
            }

            .top-left2 {
                position: absolute;
                left: 380px;
                top: 18px;
            }
            .top-left3 {
                position: absolute;
                left: 250px;
                top: 18px;
            }

            .top-left4 {
                position: absolute;
                left: 340px;
                top: 18px;
            }
            .content {
                text-align: center;
            }

            .title {
                font-size: 90px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                margin-top: -100px;
            }

            .row{
                margin-top: 130px;
            }

            .card{
                border: none;
                text-align: left;
            }

            .dropdown button{
                background:none;
                border: none;
                color: #636B6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .link1{
                text-decoration: none;
            }
            a{
                text-decoration: none;
            }
            .img-thumbnail{
                height: 70%;
                width: 90%;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height $zindex-sticky:1020">
                <div class="top-left links">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('assets/ballon.png') }}" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                        Wonderful Journey
                    </a>
                </div>

                @if($role=='member')
                    <div class="top-left3 links">
                        <a href="/blog">Blog</a>
                    </div>
                    <div class="top-left4 links">
                        <a href="/user/{{Auth::user()->id}}/edit">Profile</a>
                    </div>
                @elseif($role=='admin')
                    <div class="top-left3 links">
                        <a href="#">{{Auth::user()->role}}</a>
                    </div>
                    <div class="top-left4 links">
                        <a href="/user">User</a>
                    </div>
                @else
                    <div class="top-left1 links">
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach($category as $cat)
                                    <li>
                                        <a class="dropdown-item" href="/categorize/{{$cat->id}}">{{$cat->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="top-left2 links">
                        <a href="#">About Us</a>
                    </div>
                @endif
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <div class="top-right1 links">
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Welcome, {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" 
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Log Out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Sign Up</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Wonderful Journey
                    <h3>Blog of Indonesia Tourism</h3> 
                    <a href="#cont" type="button" class="btn btn-light">See More</a>
                </div>
            </div>
        </div>

        <div class="container mt-5" id="cont">
            <div class="row row-cols-3">
                @foreach($article as $art)
                <div class="col">
                    <img src="/assets/{{$art->image}}" class="img-thumbnail">
                    <p>
                        <p class="tittle">
                            <a href="/fullStory/{{$art->id}}"><h2>{{$art->tittle}}</h2></a>
                        </p>
                            {{$art->description}}
                            <a href="/fullStory/{{$art->id}}" class="link1 link-success">Read more</a>
                            <br>   
                            Category: <a href="/categorize/{{$art->category_id}}" class="link1">{{$art->category->name}}</a>
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
