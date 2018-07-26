<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   {{--  <style >
        
 html, body {
               background-image: url("/img/p1.jpg"); 
                background-color: #fff;
                -webkit-background-size: cover;
              -moz-background-size: cover;
                background-size: cover;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                /*font-weight: 100;*/
                /*height: 100vh;*/
                 height: 100%;

                background-repeat: no-repeat;
            background-size: 100% 100%;

                margin: 0;
            }


    </style> --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pmanagement</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Pmanagement
                    </a>
                </div>

                

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{ route('departments.index') }}" ><i class="fas fa-building"></i>My department</a></li>
                            <li><a href="{{ route('projects.index') }}"><i class="fas fa-briefcase"></i>Projects</a></li>
                               <li><a href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i>Tasks</a></li>


               @if(Auth::user()->role_id ==1)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Admin <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    
                                     <li><a href="{{ route('projects.index') }}"><i class="fas fa-briefcase"></i>All Projects</a></li>
                                      <li><a href="{{ route('users.index') }}"><i class="fas fa-user"></i>All Users</a></li>
                                       <li><a href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i>All Tasks</a></li>
                                        <li><a href="{{ route('departments.index') }}"><i class="fas fa-building"></i>All Departments</a></li>
                                         <li><a href="{{ route('roles.index') }}"><i class="fas fa-envelope"></i>All Roles</a></li>
                                </ul>
                            </li>
                            @endif



                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
           

            <div class="row">
                 @include('partials.errors')
             @include('partials.success')

        @yield('content')

    </div>
</div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
