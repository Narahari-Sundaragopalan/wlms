@extends('layouts.app')

@section('content')
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

        @include('includes.manage')

        <div class="container" style="float: right; width: 80%; ">
            <!-- <div class="pull-right">
                 <img class="pull-right" src="URL::asset('/images/logo.png')}}" alt="profile Pic" height="100" width="150">
             </div>-->


            <br>
            <br>
            <br>
            <div align="center"; >

                <h1 style="color: brown">

                    <p><b><i> Welcome To  </i></b></p>
                    <p><b><i>  Warehouse Labor Management System </i></b></p>
                </h1>


            </div>
            <div>

                <marquee behavior="scroll" direction="left"><h3><b>Hi there!! Scheduling has just been made easier...</b></h3></marquee>

            </div>



        </div>
    </div>
    </body>
@endsection
