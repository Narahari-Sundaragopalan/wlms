@extends('layouts.userlayout')

@section('content')
    <html>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:100,600" rel="stylesheet" type="text/css">
    <style>

        html, body {

            background-size: cover;
            text-align: center;
            height: 100vh;

        }


    </style>
    <body body background="images/cooler.jpg">

    <div style="width: 100%">

        @include('includes.admin')

    </div>
    </body>
    </html>
@endsection
