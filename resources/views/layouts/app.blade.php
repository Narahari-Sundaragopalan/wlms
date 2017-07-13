<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WLMS</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    {{Html::style('css/app.css')}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    {{--CDN for JQuery.--}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


    <style>
        body {
            font-family: 'Lato';
            
        }
       
        

        .fa-btn {
            margin-right: 6px;
        }

        .navbar-static-top {
            background-color: #2e3436;   

        }
        .navbar-default {
            text-align: center;

        }

        .dropdown{
            background-color: transparent; 
        }

        .header {
            color: whitesmoke;
            display: inline-block;
            float: none;
            padding-top: 1%;
            font-size: x-large;


        }
@media (min-width: 768px) {
        .brand {
            margin: 0 auto;
            width: 100%;
            text-align:center;
            font-size: medium;
            color: whitesmoke;
            left: 0px;
            position: absolute;
            right: 40px;
        }
    }
        
    </style>


</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

 </div>
                <a class="navbar-brand" >
                    <div class= "brand"><b>Warehouse Labor Management System</b></div>
                </a>

           

            <div class="navbar-collapse collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left">

                <li><a style="color: whitesmoke;"  href="{{ url('/') }}">
                   <b style="font-size: medium"> omaha steaks</b>
                </a></li>
                

                    @if (Auth::check())
                        <li><a href="{{ url('/home') }}" style="color: whitesmoke"><b style="font-size: medium">Home</b></a></li>
                    @endif
                    

                </ul>

                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><b style="color: whitesmoke">Login</b></a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: whitesmoke; font-size: medium"><b>
                                {{ Auth::user()->name }} <span class="caret"></span></b>

                            </a>

                            <ul class="dropdown-menu" role="menu">
                                 <li><a href="{{ url('/buttons') }}"><i class="fa fa-btn"></i>Update Profile</a></li>
                                 <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>