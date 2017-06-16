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
                        <input type="hidden" value="" name="skill1">
                        <input type="checkbox" name="skill1" value="Icer" {{(old('skill1') == "Icer") ? 'checked': ''}}>Icer
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill2">
                        <input type="checkbox" name="skill2" value="Labeler" {{(old('skill2') == "Labeler") ? 'checked': ''}}>Labeler
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill3">
                        <input type="checkbox" name="skill3" value="Mezzanine" {{(old('skill3') == "Mezzanine") ? 'checked': ''}}>Mezzanine
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill4">
                        <input type="checkbox" name="skill4" value="Stocker" {{(old('skill4') == "Stocker") ? 'checked': ''}}>Stocker
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill5">
                        <input type="checkbox" name="skill5" value="Runner" {{(old('skill5') == "Runner") ? 'checked': ''}}>Runner
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill6">
                        <input type="checkbox" name="skill6" value="QC" {{(old('skill6') == "QC") ? 'checked': ''}}>QC
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill7">
                        <input type="checkbox" name="skill7" value="Cleaner" {{(old('skill7') == "Cleaner") ? 'checked': ''}}>Cleaner
                        &nbsp&nbsp&nbsp
                        <input type="hidden" value="" name="skill8">
                        <input type="checkbox" name="skill8" value="GiftBox" {{(old('skill8') == "GiftBox") ? 'checked': ''}}>Gift Box
                    </div>
                    <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                        {!! Form::label('rating', 'Rating- Labeler:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="rating" value="1" {{(old('rating') == "1") ? 'checked': ''}}>1
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="rating" value="2" {{(old('rating') == "2") ? 'checked': ''}}>2
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="rating" value="3" {{(old('rating') == "3") ? 'checked': ''}}>3
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="rating" value="4" {{(old('rating') == "4") ? 'checked': ''}}>4
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="rating" value="5" {{(old('rating') == "5") ? 'checked': ''}}>5
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="rating" value="NA" {{(old('srating') == "NA") ? 'checked': ''}}>NA

                    </div>
                    <div class="form-group{{ $errors->has('srating') ? ' has-error' : '' }}">
                        {!! Form::label('srating', 'Stocker Rating:') !!}
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="srating" value="1" {{(old('srating') == "1") ? 'checked': ''}}>1
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="srating" value="2" {{(old('srating') == "2") ? 'checked': ''}}>2
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="srating" value="3" {{(old('srating') == "3") ? 'checked': ''}}>3
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="srating" value="4" {{(old('srating') == "4") ? 'checked': ''}}>4
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="srating" value="5" {{(old('srating') == "5") ? 'checked': ''}}>5
                        &nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="srating" value="NA" {{(old('srating') == "NA") ? 'checked': ''}}>NA

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