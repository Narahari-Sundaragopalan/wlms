<!DOCTYPE html>
@extends('layouts.userlayout')

@section('content')
    <html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Omaha Steaks</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: mintcream;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-size: cover;
            }

            .full-height {
                height: auto;
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
                right: auto;
                top: 18px;
            }

            .content {
                text-align: center;

            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body body background="images/ribeye.jpg">
    <div class="col-md-10 col-md-offset-1">
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
            <!--    <div class="title m-b-md" >
                    <b> Warehouse Labor Management System  </b>
                </div>-->

                <div class="links">
                <!-- <a href="{{ url('/aboutus') }}">About Us</a>
            <a href="{{ url('/contactus') }}">Contact Us</a> -->

                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
@endsection

