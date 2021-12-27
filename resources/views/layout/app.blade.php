<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
      rel="stylesheet"
    />
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}"/>
  </head>
  <body>
    <div class="navbar">
        
        
      <ul >
        <li><a href="/" style="font-family: 'Major Mono Display', monospace; font-size:20px; margin:0; padding-bottom:-50Spx">Online Forum</a></li>
        <li style="float: center"><a href="{{ route('aboutUs') }}">About Us</a></li>
        @if(Route::has("login"))
            @auth
                <li style="float: right"><a href="{{route('user.timeline',['user_id'=>Auth::user()->id])}}">{{Auth::user()->name}}</a></li>
                <li style="float: right"><form action="{{ route('logout') }}" method="post">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                </form></li>
            @else
                <li style="float: right"><a class="active" href="{{route('login')}}">Log In</a></li>
            @if(Route::has("register"))
                <li style="float: right"><a class="active" href="{{route('register')}}">Register</a></li>
            @endif
            @endauth
        @endif
      </ul>
    </div>
    <div class="hidden"></div>

    

    <!-- card -->

    <div class="container">
      @yield("content")
    </div>
    
    <script src="{{url('js/index.js')}}"></script>
  </body>
</html>
