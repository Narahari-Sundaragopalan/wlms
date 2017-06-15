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
    <body body background="images/osburger.jpg">
    <div style="width: 100%">

        @include('includes.manage')

        <div class="container" style="float: right; width: 80%; ">
            <!-- <div class="pull-right">
                 <img class="pull-right" src="URL::asset('/images/logo.png')}}" alt="profile Pic" height="100" width="150">
             </div>-->

            <br>
            <br>
            <br>

        </div>
    </div>
    </body>
@endsection
