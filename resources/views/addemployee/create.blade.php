@extends('layouts.userlayout')

@section('content')

    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<script>

$("#checkall").click(function (){
     if ($("#checkall").is(':checked')){
        $(".checkboxes").each(function (){
           $(this).prop("checked", 1);
           });
        }else{
           $(".checkboxes").each(function (){
                $(this).prop("checked", 0);
           });
        }
 });

</script>
    </head>


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
                    <div class="panel panel-info">
                        <div class="panel-heading" style="text-align: center; color: black">

                            <div class="pull-left">
                                <a href="{{ url('/addemployee') }}"class="btn btn-info"><i class="fa fa-btn fa-backward"></i> Back </a>
                            </div>
                            <h4> {{ 'Add Employee' }}</h4>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['url' => 'addemployee']) !!}

                            @include('includes.error')
                            @include('includes.flash')

                            <div class="form-group{{ $errors->has('empid') ? ' has-error' : '' }}">
                                {!! Form::label('empid', 'Employee ID: ') !!}
                                {!! Form::text('empid',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group{{ $errors->has('empfname') ? ' has-error' : '' }}">
                                {!! Form::label('empfname', 'Employee First Name:') !!}
                                {!! Form::text('empfname',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group{{ $errors->has('emplname') ? ' has-error' : '' }}">
                                {!! Form::label('emplname', 'Employee Last Name:') !!}
                                {!! Form::text('emplname',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group{{ $errors->has('positiontype') ? ' has-error' : '' }}">
                                {!! Form::label('positiontype', 'Position:') !!}
                                   {{-- <div>
                                        {!! Form::radio ('positiontype', 'Full-time')!!}Full-time
                                        {!! Form::radio ('positiontype', 'Part-time') !!}Part-time
                                    </div> --}}

                                    <input type="radio" name="positiontype" value="Full-time" {{(old('positiontype') == "Full-time") ? 'checked': ''}}>Full-time
                                    <input type="radio" name="positiontype" value="Part-time" {{(old('positiontype') == "Part-time") ? 'checked': ''}}>Part-time

                            </div>

                            <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
                                {!! Form::label('experience', 'Experience:') !!}
                                 {{--   {!! Form::radio ('experience', 'Trained')!!}Trained
                                    {!! Form::radio ('experience', 'Untrained') !!}Untrained --}}
                                    <input type="radio" name="experience" value="Trained" {{(old('experience') == "Trained") ? 'checked': ''}}>Trained
                                    <input type="radio" name="experience" value="Untrained" {{(old('experience') == "Untrained") ? 'checked': ''}}>Untrained

                            </div>

                            <div class="form-group{{ $errors->has('english') ? ' has-error' : '' }}">
                                {!! Form::label('Language:') !!}
                                    <input type="hidden" value="0" name="english">
                                    <input type="checkbox" name="english" value="1" {{(old('english') == "1") ? 'checked': ''}}>English
                                    <input type="hidden" value="0" name="spanish">
                                    <input type="checkbox" name="spanish" value="1" {{(old('spanish') == "1") ? 'checked': ''}}>Spanish
                                    <input type="hidden" value="0" name="other">
                                    <input type="checkbox" name="other" value="1" {{(old('other') == "1") ? 'checked': ''}}>Other
                            </div>

                            <div class="form-group">
                                {!! Form::label('Skills:') !!}

                                    <input type="hidden"  value="0" name="icer">
                                    <input type="checkbox" class='checkboxes' name="icer" value="1" {{(old('icer') == "1") ? 'checked': ''}}>Icer
                                    <input type="hidden"  value="0" name="labeler">
                                    <input type="checkbox" class='checkboxes' name="labeler" value="1" {{(old('labeler') == "1") ? 'checked': ''}}>Labeler
                                    <input type="hidden"  value="0" name="mezzanine">
                                    <input type="checkbox" class='checkboxes' name="mezzanine" value="1" {{(old('mezzanine') == "1") ? 'checked': ''}}>Mezzanine
                                    <input type="hidden"  value="0" name="stocker">
                                    <input type="checkbox" class='checkboxes' name="stocker" value="1" {{(old('stocker') == "1") ? 'checked': ''}}>Stocker
                                    <input type="hidden"  value="0" name="runner">
                                    <input type="checkbox" class='checkboxes' name="runner" value="1" {{(old('runner') == "1") ? 'checked': ''}}>Runner
                                    <input type="hidden"  value="0" name="qc">
                                    <input type="checkbox" class='checkboxes' name="qc" value="1" {{(old('qc') == "1") ? '1': ''}}>QC
                                    <input type="hidden"  value="0" name="cleaner">
                                    <input type="checkbox" class='checkboxes' name="cleaner" value="1" {{(old('cleaner') == "1") ? 'checked': ''}}>Cleaner
                                    <input type="hidden"  value="0" name="gift_box">
                                    <input type="checkbox" class='checkboxes' name="gift_box" value="1" {{(old('gift_box') == "1") ? 'checked': ''}}>Gift Box
                                    <input type="hidden"  value="0" name="select_all">
                                    <input type="checkbox" class='checkboxes' name="select_all" id="select_all" value="1" {{(old('select_all') == "1") ? 'checked': ''}}>Select All
                            </div>
                            



                            <div class="form-group{{ $errors->has('labeler_rating') ? ' has-error' : '' }}">
                                {!! Form::label('labeler_rating', 'Labeler Rating:') !!}

                                    <input type="radio" name="labeler_rating" value="1" {{(old('labeler_rating') == "1") ? 'checked': ''}}>1
                                    <input type="radio" name="labeler_rating" value="2" {{(old('labeler_rating') == "2") ? 'checked': ''}}>2
                                    <input type="radio" name="labeler_rating" value="3" {{(old('labeler_rating') == "3") ? 'checked': ''}}>3
                                    <input type="radio" name="labeler_rating" value="4" {{(old('labeler_rating') == "4") ? 'checked': ''}}>4
                                    <input type="radio" name="labeler_rating" value="5" {{(old('labeler_rating') == "5") ? 'checked': ''}}>5
                                    <input type="radio" name="labeler_rating" value="NA" {{(old('labeler_rating') == "NA") ? 'checked': ''}}>NA

                            </div>

                            <div class="form-group{{ $errors->has('stocker_rating') ? ' has-error' : '' }}">
                                {!! Form::label('stocker_rating', 'Stocker Rating:') !!}

                                    <input type="radio" name="stocker_rating" value="1" {{(old('stocker_rating') == "1") ? 'checked': ''}}>1
                                    <input type="radio" name="stocker_rating" value="2" {{(old('stocker_rating') == "2") ? 'checked': ''}}>2
                                    <input type="radio" name="stocker_rating" value="3" {{(old('stocker_rating') == "3") ? 'checked': ''}}>3
                                    <input type="radio" name="stocker_rating" value="4" {{(old('stocker_rating') == "4") ? 'checked': ''}}>4
                                    <input type="radio" name="stocker_rating" value="5" {{(old('stocker_rating') == "5") ? 'checked': ''}}>5
                                    <input type="radio" name="stocker_rating" value="NA" {{(old('stocker_rating') == "NA") ? 'checked': ''}}>NA

                            </div>

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                {!! Form::label('comment', 'Comments:') !!}
                                {!! Form::text('comment',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-5">
                                {!! Form::button('<i class = "fa fa-btn fa-save"></i>Save', ['type' => 'submit','class' => 'btn btn-primary', 'style'=> "width: 100px; height: 30px;"]) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

    @section('footer')
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

        <script>
            $(function() {

                $('#select_all').click(function() {
                    if ($(this).prop('checked')) {
                        $('.checkboxes').prop('checked', true);
                    } else {
                        $('.checkboxes').prop('checked', false);
                    }
                });

            });
        </script>
    @endsection