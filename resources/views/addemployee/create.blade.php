@extends('layouts.app')

@section('content')
    <style>

        html, body {

            background-size: cover;


        }

        input[type="radio"] {
            margin: 0 5px 0 5px;
        }

        input[type='checkbox'] {
            margin: 0 5px 0 5px;
        }

    </style>
    <body>

    <div style="width: 100%">

        @include('includes.admin')
        <div class="container" style="float: right; width: 85%; ">

            <div class="row" >
                <div class="col-md-8 col-md-offset-1">



                    <h1 style="text-align: center">Add Employee</h1>

                    @include('includes.error')
                    @include('includes.flash')


                    {!! Form::open(['url' => 'addemployee']) !!}
                    <div class="form-group{{ $errors->has('empid') ? ' has-error' : '' }}">
                        {!! Form::label('empid', 'Employee ID: ') !!}
                        {!! Form::text('empid',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group{{ $errors->has('empname') ? ' has-error' : '' }}">

                        {!! Form::label('empname', 'Employee Name:') !!}
                        {!! Form::text('empname',null,['class'=>'form-control']) !!}

                    </div>
                    <div class="form-group{{ $errors->has('positiontype') ? ' has-error' : '' }}">
                        {!! Form::label('positiontype', 'Position:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="positiontype" value="Full-time" {{(old('positiontype') == "Full-time") ? 'checked': ''}}>Full-time
                        &nbsp
                        <input type="radio" name="positiontype" value="Part-time" {{(old('positiontype') == "Part-time") ? 'checked': ''}}>Part-time
                    </div>

                    <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
                        {!! Form::label('experience', 'Experience:') !!}
                        <input type="radio" name="experience" value="Trained" {{(old('experience') == "Trained") ? 'checked': ''}}>Trained
                        &nbsp&nbsp&nbsp
                        <input type="radio" name="experience" value="Untrained" {{(old('experience') == "Untrained") ? 'checked': ''}}>Untrained
                    </div>

                    <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                        {!! Form::label('language', 'Language:') !!}
                        &nbsp&nbsp&nbsp
                        <input type="radio" name="language" value="English" {{(old('language') == "English") ? 'checked': ''}}>English
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="language" value="Spanish" {{(old('language') == "Spanish") ? 'checked': ''}}>Spanish
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="language" value="Bilingual" {{(old('language') == "Bilingual") ? 'checked': ''}}>Bilingual
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="language" value="Others" {{(old('language') == "Others") ? 'checked': ''}}>Others
                    </div>

                    <div class="form-group">
                        {!! Form::label('Skills:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="hidden" value="0" name="icer">
                        <input type="checkbox" name="icer" value="1" {{(old('icer') == "1") ? 'checked': ''}}>Icer
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="0" name="labeler">
                        <input type="checkbox" name="labeler" value="1" {{(old('labeler') == "1") ? 'checked': ''}}>Labeler
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="0" name="mezzanine">
                        <input type="checkbox" name="mezzanine" value="1" {{(old('mezzanine') == "1") ? 'checked': ''}}>Mezzanine
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="0" name="stocker">
                        <input type="checkbox" name="stocker" value="1" {{(old('stocker') == "1") ? 'checked': ''}}>Stocker
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="0" name="runner">
                        <input type="checkbox" name="runner" value="1" {{(old('runner') == "1") ? 'checked': ''}}>Runner
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="0" name="qc">
                        <input type="checkbox" name="qc" value="1" {{(old('qc') == "1") ? '1': ''}}>QC
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="0" name="cleaner">
                        <input type="checkbox" name="cleaner" value="1" {{(old('cleaner') == "1") ? 'checked': ''}}>Cleaner
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="0" name="gift_box">
                        <input type="checkbox" name="gift_box" value="1" {{(old('gift_box') == "1") ? 'checked': ''}}>Gift Box
                    </div>
                    <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                        {!! Form::label('labeler_rating', 'Labeler Rating:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" value="1" {{(old('labeler_rating') == "1") ? 'checked': ''}}>1
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" value="2" {{(old('labeler_rating') == "2") ? 'checked': ''}}>2
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" value="3" {{(old('labeler_rating') == "3") ? 'checked': ''}}>3
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" value="4" {{(old('labeler_rating') == "4") ? 'checked': ''}}>4
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" value="5" {{(old('labeler_rating') == "5") ? 'checked': ''}}>5
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="labeler_rating" value="NA" {{(old('labeler_rating') == "NA") ? 'checked': ''}}>NA

                    </div>
                    <div class="form-group{{ $errors->has('stocker_rating') ? ' has-error' : '' }}">
                        {!! Form::label('stocker_rating', 'Stocker Rating:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" value="1" {{(old('stocker_rating') == "1") ? 'checked': ''}}>1
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" value="2" {{(old('stocker_rating') == "2") ? 'checked': ''}}>2
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" value="3" {{(old('stocker_rating') == "3") ? 'checked': ''}}>3
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" value="4" {{(old('stocker_rating') == "4") ? 'checked': ''}}>4
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" value="5" {{(old('stocker_rating') == "5") ? 'checked': ''}}>5
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="stocker_rating" value="NA" {{(old('stocker_rating') == "NA") ? 'checked': ''}}>NA

                    </div>
                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                        {!! Form::label('comment', 'Comments:') !!}
                        {!! Form::text('comment',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group" style="text-align: left">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary', 'style'=> "width: 150px; height: 30px;"]) !!}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ url('/addemployee') }}"class="btn btn-primary" style="width: 150px; height: 30px;"> Back </a></ul>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@stop