@extends('layouts.userlayout')

@section('content')

    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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

            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading" style="text-align: center; color: black">
                            <div class="pull-left">
                                <a href="{{ url('/addemployee') }}" class="btn btn-info"><i
                                            class="fa fa-btn fa-backward"></i> Back </a>
                            </div>

                            @if(Auth::check() && (Auth::user()->hasRole('admin')))
                                <div class="pull-right">
                                    <form action="{{ url('addemployee/'.$employee->id) }}" method="POST"
                                          onsubmit="return ConfirmDelete();">{{ csrf_field() }}{{ method_field('DELETE') }}
                                        <button type="submit" id="delete-user-{{ $employee->id }}"
                                                class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            @endif

                            <h4> {{ 'Update Employee' }}</h4>

                        </div>

                        <div class="panel-body">
                            {!! Form::model($employee,['method' => 'PATCH','route'=>['addemployee.update',$employee->id]]) !!}

                            @include('includes.error')
                            @include('includes.flash')

                            <div class="form-group">
                                {!! Form::label('empid', 'Employee ID: ') !!}
                                {!! Form::text('empid',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('empfname', 'Employee First Name:') !!}
                                {!! Form::text('empfname',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('emplname', 'Employee Last Name:') !!}
                                {!! Form::text('emplname',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('positiontype', 'Position:') !!}
                                <input type="radio" name="positiontype"
                                       <?php if (isset($positiontype) && $positiontype == "Full-time") echo "checked";?> value="Full-time"{{$employee->positiontype == 'Full-time' ? 'checked' : ''}}>Full-time
                                <input type="radio" name="positiontype"
                                       <?php if (isset($positiontype) && $positiontype == "Part-time") echo "checked";?> value="Part-time" {{$employee->positiontype == 'Part-time' ? 'checked' : ''}}>Part-time
                            </div>

                            <div class="form-group">
                                {!! Form::label('experience', 'Experience:') !!}
                                <input type="radio" name="experience"
                                       <?php if (isset($experience) && $experience == "Trained") echo "checked";?> value="Trained"{{$employee->experience == 'Trained' ? 'checked' : ''}}>Trained
                                <input type="radio" name="experience"
                                       <?php if (isset($experience) && $experience == "Untrained") echo "checked";?> value="Untrained"{{$employee->experience == 'Untrained' ? 'checked' : ''}}>Untrained
                            </div>

                            <div class="form-group">
                                {!! Form::label('Language:') !!}
                                <input type="hidden" value="0" name="english">
                                <input type="checkbox" name="english"
                                       <?php if (isset($english) && $english == "1") echo "checked";?> value="1"{{$employee->english == '1' ? 'checked' : ''}}>English
                                <input type="hidden" value="0" name="spanish">
                                <input type="checkbox" name="spanish"
                                       <?php if (isset($spanish) && $spanish == "1") echo "checked";?> value="1"{{$employee->spanish == '1' ? 'checked' : ''}}>Spanish
                                <input type="hidden" value="0" name="other">
                                <input type="checkbox" name="other"
                                       <?php if (isset($other) && $other == "1") echo "checked";?> value="1"{{$employee->other == '1' ? 'checked' : ''}}>Other
                            </div>

                            <div class="form-group">
                                {!! Form::label('Skills:') !!}
                                <input type="hidden" value="0" name="icer">
                                <input type="checkbox" name="icer"
                                       <?php if (isset($icer) && $icer == "1") echo "checked";?> value="1"{{$employee->icer == '1' ? 'checked' : ''}}>Icer
                                <input type="hidden" value="0" name="labeler">
                                <input type="checkbox" name="labeler"
                                       <?php if (isset($labeler) && $labeler == "1") echo "checked";?> value="1"{{$employee->labeler == '1' ? 'checked' : ''}}>Labeler
                                <input type="hidden" value="0" name="mezzanine">
                                <input type="checkbox" name="mezzanine"
                                       <?php if (isset($mezzanine) && $mezzanine == "1") echo "checked";?> value="1"{{$employee->mezzanine == '1' ? 'checked' : ''}}>Mezzanine
                                <input type="hidden" value="0" name="stocker">
                                <input type="checkbox" name="stocker"
                                       <?php if (isset($stocker) && $stocker == "1") echo "checked";?> value="1" {{$employee->stocker == '1' ? 'checked' : ''}}>Stocker
                                <input type="hidden" value="0" name="runner">
                                <input type="checkbox" name="runner"
                                       <?php if (isset($runner) && $runner == "1") echo "checked";?> value="1"{{$employee->runner == '1' ? 'checked' : ''}}>Runner
                                <input type="hidden" value="0" name="qc">
                                <input type="checkbox" name="qc"
                                       <?php if (isset($qc) && $qc == "1") echo "checked";?> value="1"{{$employee->qc == '1' ? 'checked' : ''}}>QC
                                <input type="hidden" value="0" name="cleaner">
                                <input type="checkbox" name="cleaner"
                                       <?php if (isset($cleaner) && $cleaner == "1") echo "checked";?> value="1"{{$employee->cleaner == '1' ? 'checked' : ''}}>Cleaner
                                <input type="hidden" value="0" name="gift_box">
                                <input type="checkbox" name="gift_box"
                                       <?php if (isset($gift_box) && $gift_box == "1") echo "checked";?> value="1"{{$employee->gift_box == '1' ? 'checked' : ''}}>Gift
                                Box
                            </div>

                            <div class="form-group">
                                {!! Form::label('labeler_rating', 'Conveyor Rating:') !!}
                                <input type="radio" name="labeler_rating"
                                       <?php if (isset($labeler_rating) && $labeler_rating == "1") echo "checked";?> value="1"{{$employee->labeler_rating == '1' ? 'checked' : ''}}>1
                                <input type="radio" name="labeler_rating"
                                       <?php if (isset($labeler_rating) && $labeler_rating == "2") echo "checked";?> value="2"{{$employee->labeler_rating == '2' ? 'checked' : ''}}>2
                                <input type="radio" name="labeler_rating"
                                       <?php if (isset($labeler_rating) && $labeler_rating == "3") echo "checked";?> value="3"{{$employee->labeler_rating == '3' ? 'checked' : ''}}>3
                                <input type="radio" name="labeler_rating"
                                       <?php if (isset($labeler_rating) && $labeler_rating == "4") echo "checked";?> value="4"{{$employee->labeler_rating == '4' ? 'checked' : ''}}>4
                                <input type="radio" name="labeler_rating"
                                       <?php if (isset($labeler_rating) && $labeler_rating == "5") echo "checked";?> value="5"{{$employee->labeler_rating == '5' ? 'checked' : ''}}>5
                                <input type="radio" name="labeler_rating"
                                       <?php if (isset($labeler_rating) && $labeler_rating == "NA") echo "checked";?> value="NA"{{$employee->labeler_rating == 'NA' ? 'checked' : ''}}>NA
                            </div>

                            <div class="form-group">
                                {!! Form::label('combo_rating', 'Combo Rating:') !!}
                                <input type="radio" name="combo_rating"
                                       <?php if (isset($combo_rating) && $combo_rating == "1") echo "checked";?> value="1"{{$employee->combo_rating == '1' ? 'checked' : ''}}>1
                                <input type="radio" name="combo_rating"
                                       <?php if (isset($combo_rating) && $combo_rating == "2") echo "checked";?> value="2"{{$employee->combo_rating == '2' ? 'checked' : ''}}>2
                                <input type="radio" name="combo_rating"
                                       <?php if (isset($combo_rating) && $combo_rating == "3") echo "checked";?> value="3"{{$employee->combo_rating == '3' ? 'checked' : ''}}>3
                                <input type="radio" name="combo_rating"
                                       <?php if (isset($combo_rating) && $combo_rating == "4") echo "checked";?> value="4"{{$employee->combo_rating == '4' ? 'checked' : ''}}>4
                                <input type="radio" name="combo_rating"
                                       <?php if (isset($combo_rating) && $combo_rating == "5") echo "checked";?> value="5"{{$employee->combo_rating == '5' ? 'checked' : ''}}>5
                                <input type="radio" name="combo_rating"
                                       <?php if (isset($combo_rating) && $combo_rating == "NA") echo "checked";?> value="NA"{{$employee->combo_rating == 'NA' ? 'checked' : ''}}>NA
                            </div>

                            <div class="form-group">
                                {!! Form::label('stocker_rating', 'Stocker Rating:') !!}
                                <input type="radio" name="stocker_rating"
                                       <?php if (isset($stocker_rating) && $stocker_rating == "1") echo "checked";?> value="1"{{$employee->stocker_rating == '1' ? 'checked' : ''}}>1
                                <input type="radio" name="stocker_rating"
                                       <?php if (isset($stocker_rating) && $stocker_rating == "2") echo "checked";?> value="2"{{$employee->stocker_rating == '2' ? 'checked' : ''}}>2
                                <input type="radio" name="stocker_rating"
                                       <?php if (isset($stocker_rating) && $stocker_rating == "3") echo "checked";?> value="3"{{$employee->stocker_rating == '3' ? 'checked' : ''}}>3
                                <input type="radio" name="stocker_rating"
                                       <?php if (isset($stocker_rating) && $stocker_rating == "4") echo "checked";?> value="4"{{$employee->stocker_rating == '4' ? 'checked' : ''}}>4
                                <input type="radio" name="stocker_rating"
                                       <?php if (isset($stocker_rating) && $stocker_rating == "5") echo "checked";?> value="5"{{$employee->stocker_rating == '5' ? 'checked' : ''}}>5
                                <input type="radio" name="stocker_rating"
                                       <?php if (isset($stocker_rating) && $stocker_rating == "NA") echo "checked";?> value="NA"{{$employee->stocker_rating == 'NA' ? 'checked' : ''}}>NA
                            </div>

                            <div class="form-group">
                                {!! Form::label('comment', 'Comments:') !!}
                                {!! Form::text('comment',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group" style="text-align: left">
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
@endsection