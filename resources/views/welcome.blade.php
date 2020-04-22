<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Activity Scheduler</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .sub-title {
                margin-left: 400px;
                margin-bottom: 30px
            }

            .m-b-md {
                margin-bottom: 2px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Activity Scheduler
                </div>
                <div class="sub-title">
                  Administration version
                </div>

                <div class="links">
                  @if (Route::has('login'))
                      <div class="links">
                          @auth
                              <a href="{{ route("calendar") }}">Home</a>

                          @else
                              <a href="{{ route('login') }}">Login</a>
                              <a href="{{ route('register') }}">Register</a>
                          @endauth
                      </div>
                  @endif
                </div>
            </div>
        </div>
    </body>
</html>
