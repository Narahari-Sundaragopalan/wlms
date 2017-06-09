@extends('layouts.app')

@section('content')
    <html>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:100,600" rel="stylesheet" type="text/css">
    <style>

        html, body {

            background-size: cover;
            text-align: center;

        }


    </style>
    <body body background="images/burger.jpeg">

    <div style="width: 100%">

        @include('includes.admin')

        <div class="container" style="float: right; width: 85%; ">
            <div>
                <h1> Welcome To </h1>
                <h1> Warehouse Labor Management System </h1>
            </div>

            <div>

                <marquee behavior="scroll" direction="left"><h3><b>Hi there!!Welcome !! Scheduling has just been made easier...</b></h3></marquee>

            </div>
        </div>
    </div>
    </body>
    </html>
@endsection
