<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pmanagement</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #fcfcfc;
            }

            .links > a {
                color: #fcfcfc;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 1000;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    WellCome <br> To <br>
                    Pmanagement
                </div>

                
            </div>
        </div>
    </body>
</html>
