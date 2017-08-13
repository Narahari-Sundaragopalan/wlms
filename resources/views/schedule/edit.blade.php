@extends('layouts.userlayout')

@section('content')

    <style>
        th {
            background: forestgreen;
            color: whitesmoke;
            text-align: center;
        }

        tr {
            font-size: medium;
            text-align: center;
        }

        .bld {
            font-weight: bold;
            color: whitesmoke;
            background-color: grey;
        }


    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div style="text-align: center; color: black"><h3>{{ $heading }}</h3></div>
                        <div>
                            <span id="first"
                                  style="font-weight: bold; text-align: left; color: black">{{"Coolers Shipped : " . number_format($coolersShipped) }}</span>
                            <span id="second"
                                  style="font-weight: bold; float: right; color: black">{{"Total Temps Needed : " . $Temps }}</span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-6">
                            {!! Form::model($id ,['method' => 'PATCH','route'=>['schedule.update', $id]]) !!}
                            <h3 style="text-align: center">Conveyor Lines</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable" border=1 width='200' height='100' cellpadding='0' cellspacing='0'>
                                    <thead> <!-- Table Headings -->
                                    <th>Line Number</th>
                                    <th>Labeler</th>
                                    <th colspan="2">Icer</th>
                                    </thead>
                                    <tbody>
                                    @if (Session::has('message'))
                                        <div class="alert alert-danger">{{ Session::get('message') }}</div>
                                    @endif
                                    @foreach($schedule_array as $i => $value)
                                        <tr class="bg-info">
                                        <tr>
                                            <td>
                                                <select class="form-control" name="conveyor_lines[]">

                                                    <option value="<?php echo($schedule_array[$i]['line_number']); ?>"
                                                            selected class="bld">
                                                        <?php echo($schedule_array[$i]['line_number']); ?>
                                                    </option>
                                                    <optgroup label="Line #">
                                                        @foreach($conveyorLines as $conveyorLine)
                                                            <option>
                                                                <?php echo($conveyorLine); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="labeler_conveyor[]" id="employees">

                                                    <option value="<?php echo($schedule_array[$i]['labeler']); ?>"
                                                            selected class="bld">
                                                        <?php echo($schedule_array[$i]['labeler']); ?>
                                                    </option>
                                                    <optgroup label="Labelers">
                                                        @foreach($empLabelers as $empLabeler)
                                                            <option value="<?php echo($empLabeler); ?>">
                                                                <?php echo($empLabeler); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Non-Labelers">
                                                        @foreach($empNonLabelers as $empNonLabeler)
                                                            <option value="<?php echo($empNonLabeler) ?>">
                                                                <?php echo($empNonLabeler); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Supervisors">
                                                        @foreach($supervisors as $supervisor)
                                                            <option value="<?php echo($supervisor) ?>">
                                                                <?php echo($supervisor); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <option value="Temp"><?php echo 'Temp' ?></option>
                                                    <option value="NA"><?php echo 'NA' ?></option>
                                                </select>
                                            </td>
                                            @if($i < count($schedule_array) - 1)
                                                <td rowspan="3">
                                                    <table border='1' width="100" cellpadding='0' cellspacing='0'
                                                           height='100%'>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control" name="icer_conveyor[]"
                                                                        id="employees[]">
                                                                    <option value="<?php echo($schedule_array[$i]['icer']); ?>"
                                                                            selected
                                                                            class="bld">
                                                                        <?php echo($schedule_array[$i]['icer']); ?>
                                                                    </option>
                                                                    <optgroup label="Icers">
                                                                        @foreach($empIcers as $empIcer)
                                                                            <option value="<?php echo($empIcer) ?>">
                                                                                <?php echo($empIcer); ?>
                                                                            </option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                    <optgroup label="Non-Icers">
                                                                        @foreach($empNonIcers as $empNonIcer)
                                                                            <option value="<?php echo($empNonIcer) ?>">
                                                                                <?php echo($empNonIcer); ?>
                                                                            </option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                    <optgroup label="Supervisors">
                                                                        @foreach($supervisors as $supervisor)
                                                                            <option value="<?php echo($supervisor) ?>">
                                                                                <?php echo($supervisor); ?>
                                                                            </option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                    <option value="Temp"><?php echo 'Temp' ?></option>
                                                                    <option value="NA"><?php echo 'NA' ?></option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <h3 style="text-align: center">Support Lines</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable" border=1 width='200' height='100' cellpadding='0' cellspacing='0'>
                                    <thead> <!-- Table Headings -->
                                    <th>Line Number</th>
                                    <th>Labeler</th>
                                    <th>Stocker</th>
                                    <th colspan="2">Icer</th>
                                    </thead>
                                    <tbody>
                                    @foreach($schedule_array_2 as $j => $value)
                                        <tr class="bg-info">
                                        <tr>
                                            <td>
                                                <select class="form-control" name="support_lines[]">

                                                    <option value="<?php echo($schedule_array_2[$j]['line_number']); ?>"
                                                            selected class="bld">
                                                        <?php echo($schedule_array_2[$j]['line_number']); ?>
                                                    </option>
                                                    <optgroup label="Line #">
                                                        @foreach($totalLines as $totalLine)
                                                            <option>
                                                                <?php echo($totalLine); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="labeler_support[]" id="employees[]">
                                                    <option value="<?php echo($schedule_array_2[$j]['labeler']); ?>"
                                                            selected class="bld">
                                                        <?php echo($schedule_array_2[$j]['labeler']); ?>
                                                    </option>
                                                    <optgroup label="Labelers">
                                                        @foreach($empLabelers as $empLabeler)
                                                            <option value="<?php echo($empLabeler) ?>">
                                                                <?php echo($empLabeler); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Non-Labelers">
                                                        @foreach($empNonLabelers as $empNonLabeler)
                                                            <option value="<?php echo($empNonLabeler) ?>">
                                                                <?php echo($empNonLabeler); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Supervisors">
                                                        @foreach($supervisors as $supervisor)
                                                            <option value="<?php echo($supervisor) ?>">
                                                                <?php echo($supervisor); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <option><?php echo 'Temp' ?></option>
                                                    <option><?php echo 'NA' ?></option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="stocker_support[]" id="employees[]">
                                                    <option value="<?php echo($schedule_array_2[$j]['stocker']); ?>"
                                                            selected class="bld">
                                                        <?php echo($schedule_array_2[$j]['stocker']); ?>
                                                    </option>
                                                    <optgroup label="Stockers">
                                                        @foreach($empStockers as $empStocker)
                                                            <option value="<?php echo($empStocker) ?>">
                                                                <?php echo($empStocker); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Non-Stockers">
                                                        @foreach($empNonStockers as $empNonStocker)
                                                            <option value="<?php echo($empNonStocker) ?>">
                                                                <?php echo($empNonStocker); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Supervisors">
                                                        @foreach($supervisors as $supervisor)
                                                            <option value="<?php echo($supervisor) ?>">
                                                                <?php echo($supervisor); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <option><?php echo 'Temp' ?></option>
                                                    <option><?php echo 'NA' ?></option>
                                                </select>
                                            </td>
                                            @if($j < count($schedule_array_2) - 1)
                                                <td rowspan="3">
                                                    <table border='1' width="100" cellpadding='0' cellspacing='0'
                                                           height='100%'>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control" name="icer_support[]"
                                                                        id="employees[]">
                                                                    <option value="<?php echo($schedule_array_2[$j]['icer']); ?>"
                                                                            selected class="bld">
                                                                        <?php echo($schedule_array_2[$j]['icer']); ?>
                                                                    </option>
                                                                    <optgroup label="Icers">
                                                                        @foreach($empIcers as $empIcer)
                                                                            <option value="<?php echo($empIcer) ?>">
                                                                                <?php echo($empIcer); ?>
                                                                            </option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                    <optgroup label="Non-Icers">
                                                                        @foreach($empNonIcers as $empNonIcer)
                                                                            <option value="<?php echo($empNonIcer) ?>">
                                                                                <?php echo($empNonIcer); ?>
                                                                            </option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                    <optgroup label="Supervisors">
                                                                        @foreach($supervisors as $supervisor)
                                                                            <option value="<?php echo($supervisor) ?>">
                                                                                <?php echo($supervisor); ?>
                                                                            </option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                    <option><?php echo 'Temp' ?></option>
                                                                    <option><?php echo 'NA' ?></option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <h3 style="text-align: center">Mezzanine</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead> <!-- Table Headings -->
                                    <th>Lines</th>
                                    <th>Assigned</th>
                                    </thead>
                                    <tbody>
                                    @foreach($mezzanineArray as $i => $value)
                                        <tr class="bg-info">
                                        <tr>
                                            <td>
                                                <select class="form-control" name="mezzanine_Startlines[]">
                                                    <option value="<?php echo($mezzanineArray[$i]['startLine']);?>"
                                                            selected class="bld">
                                                        <?php echo($mezzanineArray[$i]['startLine']);?>
                                                    </option>
                                                    <optgroup label="Line #">
                                                        @foreach($totalLines as $totalLine)
                                                            <option>
                                                                <?php echo($totalLine); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                -
                                                <select class="form-control" name="mezzanine_Endlines[]">
                                                    <option value="<?php echo($mezzanineArray[$i]['endLine']);?>"
                                                            selected class="bld">
                                                        <?php echo($mezzanineArray[$i]['endLine']);?>
                                                    </option>
                                                    <optgroup label="Line #">
                                                        @foreach($totalLines as $totalLine)
                                                            <option>
                                                                <?php echo($totalLine); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="mezzanine[]" id="employees[]">
                                                    <option value="<?php echo($mezzanineArray[$i]['name']); ?>" selected
                                                            class="bld">
                                                        <?php echo($mezzanineArray[$i]['name']); ?>
                                                    </option>
                                                    <optgroup label="Mezzanines">
                                                        @foreach($empMezzanines as $empMezzanine)
                                                            <option value="<?php echo($empMezzanine) ?>">
                                                                <?php echo($empMezzanine); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Non-Mezzanines">
                                                        @foreach($empNonMezzanines as $empNonMezzanine)
                                                            <option value="<?php echo($empNonMezzanine) ?>">
                                                                <?php echo($empNonMezzanine); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Supervisors">
                                                        @foreach($supervisors as $supervisor)
                                                            <option value="<?php echo($supervisor) ?>">
                                                                <?php echo($supervisor); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <option><?php echo 'Temp' ?></option>
                                                    <option><?php echo 'NA' ?></option>
                                                </select>

                                                <input type="button" value="Remove" id="removeMez"
                                                       onclick="removeMezLine(this);">

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <h3 style="text-align: center">Runners</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead> <!-- Table Headings -->
                                    <th>Lines</th>
                                    <th>Assigned</th>
                                    </thead>
                                    <tbody>
                                    @foreach($runnerArray as $i => $value)
                                        <tr class="bg-info">
                                        <tr>
                                            <td>
                                                <select class="form-control" name="runner_Startlines[]">
                                                    <option value="" selected class="bld">
                                                        <?php echo($runnerArray[$i]['startLine']); ?>
                                                    </option>
                                                    <optgroup label="Line #">
                                                        @foreach($totalLines as $totalLine)
                                                            <option>
                                                                <?php echo($totalLine); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                -
                                                <select class="form-control" name="runner_Endlines[]">
                                                    <option value="" selected class="bld">
                                                        <?php echo($runnerArray[$i]['endLine']); ?>
                                                    </option>
                                                    <optgroup label="Line #">
                                                        @foreach($totalLines as $totalLine)
                                                            <option>
                                                                <?php echo($totalLine); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="runner[]" id="employees[]">
                                                    <option value="<?php echo($runnerArray[$i]['name']); ?>" selected
                                                            class="bld">
                                                        <?php echo($runnerArray[$i]['name']); ?>
                                                    </option>
                                                    <optgroup label="Runners">
                                                        @foreach($empRunners as $empRunner)
                                                            <option value="<?php echo($empRunner) ?>">
                                                                <?php echo($empRunner); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Non-Runners">
                                                        @foreach($empNonRunners as $empNonRunner)
                                                            <option value="<?php echo($empNonRunner) ?>">
                                                                <?php echo($empNonRunner); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Supervisors">
                                                        @foreach($supervisors as $supervisor)
                                                            <option value="<?php echo($supervisor) ?>">
                                                                <?php echo($supervisor); ?>
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <option><?php echo 'Temp' ?></option>
                                                    <option><?php echo 'NA' ?></option>
                                                </select>

                                                <input type="button" value="Remove" id="removeMez"
                                                       onclick="removeMezLine(this);">

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <h3 style="text-align: center">Others</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead> <!-- Table Headings -->
                                    <th>Position</th>
                                    <th colspan="2">Assigned</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>QC</td>
                                        <td>
                                            <select class="form-control" name="qc[]" id="employees[]" multiple>
                                                @if(sizeof($qcArray))
                                                    @foreach($qcArray as $index => $qcCurrent)
                                                        <option value="<?php echo $qcCurrent; ?>" selected>
                                                            <?php echo $qcCurrent; ?>
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <?php echo ""; ?>
                                                @endif
                                                <optgroup label="QC">
                                                    @foreach($empQCs as $empQC)
                                                        <option value="<?php echo($empQC); ?>">
                                                            <?php echo($empQC); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-QC">
                                                    @foreach($empNonQCs as $empNonQC)
                                                        <option value="<?php echo($empNonQC); ?>">
                                                            <?php echo($empNonQC); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gift Box</td>
                                        <td>
                                            <select class="form-control" name="giftBox[]" id="employees[]" multiple>
                                                @if(sizeof($giftBoxArray))
                                                    @foreach($giftBoxArray as $index => $giftBoxCurrent)
                                                        <option value="<?php echo $giftBoxCurrent;?>" selected>
                                                            <?php echo $giftBoxCurrent;?>
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <?php echo ""; ?>
                                                @endif
                                                <optgroup label="giftBox">
                                                    @foreach($empgiftBoxs as $empgiftBox)
                                                        <option value="<?php echo($empgiftBox); ?>">
                                                            <?php echo($empgiftBox); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-giftBox">
                                                    @foreach($empNongiftBoxs as $empNongiftBox)
                                                        <option value="<?php echo($empNongiftBox); ?>">
                                                            <?php echo($empNongiftBox); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Clean</td>
                                        <td>
                                            <select class="form-control" name="cleaner[]" id="employees[]" multiple>
                                                @if(sizeof($cleanerArray))
                                                    @foreach($cleanerArray as $index => $cleanerCurrent)
                                                        <option value="<?php echo $cleanerCurrent;?>" selected>
                                                            <?php echo $cleanerCurrent;?>
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <?php echo ""; ?>
                                                @endif
                                                <optgroup label="Cleaners">
                                                    @foreach($empCleaners as $empCleaner)
                                                        <option value="<?php echo($empCleaner); ?>">
                                                            <?php echo($empCleaner); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Non-Cleaners">
                                                    @foreach($empNonCleaners as $empNonCleaner)
                                                        <option value="<?php echo($empNonCleaner); ?>">
                                                            <?php echo($empNonCleaner); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Freezer</td>
                                        <td>
                                            <select class="form-control" name="freezer[]" id="employees[]" multiple>
                                                @if(sizeof($freezerArray))
                                                    @foreach($freezerArray as $index => $freezerCurrent)
                                                        <option value="<?php echo $freezerCurrent;?>" selected>
                                                            <?php echo $freezerCurrent;?>
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <?php echo ""; ?>
                                                @endif
                                                <optgroup label="Freezers">
                                                    @foreach($empFreezers as $empFreezer)
                                                        <option value="<?php echo($empFreezer); ?>">
                                                            <?php echo($empFreezer); ?>
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group" style="text-align: left">
                            <div class="col-md-6 col-md-offset-5">
                                {!! Form::button('Save', ['type' => 'submit','class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>


        function removeMezLine(removeLink) {
            var inputElement = removeLink.parentNode;
            inputElement.remove();
        }


        // Disable selected name in other dropdown based on user selection
        var labeler_conveyor = $("select[name='labeler_conveyor[]']");
        var icer_conveyor = $("select[name='icer_conveyor[]']");
        var labeler_support = $("select[name='labeler_support[]']");
        var stocker_support = $("select[name='stocker_support[]']");
        var icer_support = $("select[name='icer_support[]']");
        var mezzanine = $("select[name='mezzanine[]']");
        var runner = $("select[name='runner[]']");
        var cleaner = $("select[name='cleaner[]']");
        var qc = $("select[name='qc[]']");
        var giftBox = $("select[name='giftBox[]']");
        var freezer = $("select[name='freezer[]']");

        var employees = $("select[id='employees']");

        var oldSelectedItem = '';
        employees.on('select2:selecting', function (evt) {
            oldSelectedItem = $(this).val();
        });

        employees.change(function () {

            var selectedDropDown = $(this).attr("name");
            var selectedItem = $(this).val();
            if (selectedItem && selectedItem !== 'Temp' && selectedItem !== 'NA') {

                if (selectedDropDown === 'labeler_conveyor[]') {
                    icer_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    icer_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    labeler_support.find('option[value="' + selectedItem + '"]').remove();
                    labeler_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    stocker_support.find('option[value="' + selectedItem + '"]').remove();
                    stocker_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_support.find('option[value="' + selectedItem + '"]').remove();
                    icer_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    mezzanine.find('option[value="' + selectedItem + '"]').remove();
                    mezzanine.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    runner.find('option[value="' + selectedItem + '"]').remove();
                    runner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    cleaner.find('option[value="' + selectedItem + '"]').remove();
                    cleaner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    qc.find('option[value="' + selectedItem + '"]').remove();
                    qc.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    giftBox.find('option[value="' + selectedItem + '"]').remove();
                    giftBox.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    freezer.find('option[value="' + selectedItem + '"]').remove();
                    freezer.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));

                } else if (selectedDropDown === 'icer_conveyor[]') {
                    labeler_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    labeler_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    labeler_support.find('option[value="' + selectedItem + '"]').remove();
                    labeler_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    stocker_support.find('option[value="' + selectedItem + '"]').remove();
                    stocker_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_support.find('option[value="' + selectedItem + '"]').remove();
                    icer_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    mezzanine.find('option[value="' + selectedItem + '"]').remove();
                    mezzanine.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    runner.find('option[value="' + selectedItem + '"]').remove();
                    runner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    cleaner.find('option[value="' + selectedItem + '"]').remove();
                    cleaner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    qc.find('option[value="' + selectedItem + '"]').remove();
                    qc.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    giftBox.find('option[value="' + selectedItem + '"]').remove();
                    giftBox.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    freezer.find('option[value="' + selectedItem + '"]').remove();
                    freezer.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                } else if (selectedDropDown === 'labeler_support[]') {
                    labeler_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    labeler_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    icer_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    stocker_support.find('option[value="' + selectedItem + '"]').remove();
                    stocker_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_support.find('option[value="' + selectedItem + '"]').remove();
                    icer_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    mezzanine.find('option[value="' + selectedItem + '"]').remove();
                    mezzanine.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    runner.find('option[value="' + selectedItem + '"]').remove();
                    runner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    cleaner.find('option[value="' + selectedItem + '"]').remove();
                    cleaner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    qc.find('option[value="' + selectedItem + '"]').remove();
                    qc.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    giftBox.find('option[value="' + selectedItem + '"]').remove();
                    giftBox.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    freezer.find('option[value="' + selectedItem + '"]').remove();
                    freezer.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                } else if (selectedDropDown === 'stocker_support[]') {
                    labeler_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    labeler_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    icer_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    labeler_support.find('option[value="' + selectedItem + '"]').remove();
                    labeler_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_support.find('option[value="' + selectedItem + '"]').remove();
                    icer_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    mezzanine.find('option[value="' + selectedItem + '"]').remove();
                    mezzanine.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    runner.find('option[value="' + selectedItem + '"]').remove();
                    runner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    cleaner.find('option[value="' + selectedItem + '"]').remove();
                    cleaner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    qc.find('option[value="' + selectedItem + '"]').remove();
                    qc.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    giftBox.find('option[value="' + selectedItem + '"]').remove();
                    giftBox.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    freezer.find('option[value="' + selectedItem + '"]').remove();
                    freezer.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                } else if (selectedDropDown === 'icer_support[]') {
                    labeler_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    labeler_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    icer_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    stocker_support.find('option[value="' + selectedItem + '"]').remove();
                    stocker_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    labeler_support.find('option[value="' + selectedItem + '"]').remove();
                    labeler_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    mezzanine.find('option[value="' + selectedItem + '"]').remove();
                    mezzanine.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    runner.find('option[value="' + selectedItem + '"]').remove();
                    runner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    cleaner.find('option[value="' + selectedItem + '"]').remove();
                    cleaner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    qc.find('option[value="' + selectedItem + '"]').remove();
                    qc.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    giftBox.find('option[value="' + selectedItem + '"]').remove();
                    giftBox.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    freezer.find('option[value="' + selectedItem + '"]').remove();
                    freezer.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                } else if (selectedDropDown === 'mezzanine[]') {
                    labeler_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    labeler_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    icer_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    stocker_support.find('option[value="' + selectedItem + '"]').remove();
                    stocker_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_support.find('option[value="' + selectedItem + '"]').remove();
                    icer_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    labeler_support.find('option[value="' + selectedItem + '"]').remove();
                    labeler_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    runner.find('option[value="' + selectedItem + '"]').remove();
                    runner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    cleaner.find('option[value="' + selectedItem + '"]').remove();
                    cleaner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    qc.find('option[value="' + selectedItem + '"]').remove();
                    qc.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    giftBox.find('option[value="' + selectedItem + '"]').remove();
                    giftBox.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    freezer.find('option[value="' + selectedItem + '"]').remove();
                    freezer.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                } else if (selectedDropDown === 'runner[]') {
                    labeler_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    labeler_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    icer_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    stocker_support.find('option[value="' + selectedItem + '"]').remove();
                    stocker_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_support.find('option[value="' + selectedItem + '"]').remove();
                    icer_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    mezzanine.find('option[value="' + selectedItem + '"]').remove();
                    mezzanine.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    labeler_support.find('option[value="' + selectedItem + '"]').remove();
                    labeler_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    cleaner.find('option[value="' + selectedItem + '"]').remove();
                    cleaner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    qc.find('option[value="' + selectedItem + '"]').remove();
                    qc.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    giftBox.find('option[value="' + selectedItem + '"]').remove();
                    giftBox.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    freezer.find('option[value="' + selectedItem + '"]').remove();
                    freezer.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                } else if (selectedDropDown === 'cleaner[]') {
                    labeler_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    labeler_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    icer_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    stocker_support.find('option[value="' + selectedItem + '"]').remove();
                    stocker_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_support.find('option[value="' + selectedItem + '"]').remove();
                    icer_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    mezzanine.find('option[value="' + selectedItem + '"]').remove();
                    mezzanine.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    runner.find('option[value="' + selectedItem + '"]').remove();
                    runner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    labeler_support.find('option[value="' + selectedItem + '"]').remove();
                    labeler_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    qc.find('option[value="' + selectedItem + '"]').remove();
                    qc.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    giftBox.find('option[value="' + selectedItem + '"]').remove();
                    giftBox.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    freezer.find('option[value="' + selectedItem + '"]').remove();
                    freezer.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                } else if (selectedDropDown === 'qc[]') {
                    labeler_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    labeler_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    icer_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    labeler_support.find('option[value="' + selectedItem + '"]').remove();
                    labeler_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    stocker_support.find('option[value="' + selectedItem + '"]').remove();
                    stocker_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_support.find('option[value="' + selectedItem + '"]').remove();
                    icer_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    mezzanine.find('option[value="' + selectedItem + '"]').remove();
                    mezzanine.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    runner.find('option[value="' + selectedItem + '"]').remove();
                    runner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    cleaner.find('option[value="' + selectedItem + '"]').remove();
                    cleaner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    giftBox.find('option[value="' + selectedItem + '"]').remove();
                    giftBox.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    freezer.find('option[value="' + selectedItem + '"]').remove();
                    freezer.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                } else if (selectedDropDown === 'giftBox[]') {
                    labeler_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    labeler_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    icer_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    labeler_support.find('option[value="' + selectedItem + '"]').remove();
                    labeler_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    stocker_support.find('option[value="' + selectedItem + '"]').remove();
                    stocker_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_support.find('option[value="' + selectedItem + '"]').remove();
                    icer_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    mezzanine.find('option[value="' + selectedItem + '"]').remove();
                    mezzanine.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    runner.find('option[value="' + selectedItem + '"]').remove();
                    runner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    qc.find('option[value="' + selectedItem + '"]').remove();
                    qc.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    cleaner.find('option[value="' + selectedItem + '"]').remove();
                    cleaner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    freezer.find('option[value="' + selectedItem + '"]').remove();
                    freezer.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                } else if (selectedDropDown === 'freezer[]') {
                    labeler_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    labeler_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_conveyor.find('option[value="' + selectedItem + '"]').remove();
                    icer_conveyor.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    labeler_support.find('option[value="' + selectedItem + '"]').remove();
                    labeler_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    stocker_support.find('option[value="' + selectedItem + '"]').remove();
                    stocker_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    icer_support.find('option[value="' + selectedItem + '"]').remove();
                    icer_support.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    mezzanine.find('option[value="' + selectedItem + '"]').remove();
                    mezzanine.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    runner.find('option[value="' + selectedItem + '"]').remove();
                    runner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    qc.find('option[value="' + selectedItem + '"]').remove();
                    qc.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    cleaner.find('option[value="' + selectedItem + '"]').remove();
                    cleaner.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                    giftBox.find('option[value="' + selectedItem + '"]').remove();
                    giftBox.append($('<option>', {
                        value: oldSelectedItem,
                        text: oldSelectedItem
                    }));
                }
            }

        });


        $(document).ready(function ($) {

            for (var i = 0; i < labeler_conveyor.length; i++) {
                if (labeler_conveyor.eq(i).val() === 'Temp') {
                    continue;
                }

                icer_conveyor.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').remove();
                labeler_support.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').remove();
                stocker_support.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').remove();
                icer_support.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').remove();
                mezzanine.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').remove();
                runner.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').remove();
                cleaner.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').remove();
                qc.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').remove();
                giftBox.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').remove();
                freezer.find('option[value="' + labeler_conveyor.eq(i).val() + '"]').remove();

            }

            for (i = 0; i < labeler_support.length; i++) {
                if (labeler_support.eq(i).val() === 'Temp') {
                    continue;
                }

                //Disable values for Labeler Support Line
                icer_conveyor.find('option[value="' + labeler_support.eq(i).val() + '"]').remove();
                labeler_conveyor.find('option[value="' + labeler_support.eq(i).val() + '"]').remove();
                stocker_support.find('option[value="' + labeler_support.eq(i).val() + '"]').remove();
                icer_support.find('option[value="' + labeler_support.eq(i).val() + '"]').remove();
                mezzanine.find('option[value="' + labeler_support.eq(i).val() + '"]').remove();
                runner.find('option[value="' + labeler_support.eq(i).val() + '"]').remove();
                cleaner.find('option[value="' + labeler_support.eq(i).val() + '"]').remove();
                qc.find('option[value="' + labeler_support.eq(i).val() + '"]').remove();
                giftBox.find('option[value="' + labeler_support.eq(i).val() + '"]').remove();
                freezer.find('option[value="' + labeler_support.eq(i).val() + '"]').remove();

            }


            for (i = 0; i < stocker_support.length; i++) {
                if (stocker_support.eq(i).val() === 'Temp') {
                    continue;
                }
                icer_conveyor.find('option[value="' + stocker_support.eq(i).val() + '"]').remove();
                labeler_conveyor.find('option[value="' + stocker_support.eq(i).val() + '"]').remove();
                labeler_support.find('option[value="' + stocker_support.eq(i).val() + '"]').remove();
                icer_support.find('option[value="' + stocker_support.eq(i).val() + '"]').remove();
                mezzanine.find('option[value="' + stocker_support.eq(i).val() + '"]').remove();
                runner.find('option[value="' + stocker_support.eq(i).val() + '"]').remove();
                cleaner.find('option[value="' + stocker_support.eq(i).val() + '"]').remove();
                qc.find('option[value="' + stocker_support.eq(i).val() + '"]').remove();
                giftBox.find('option[value="' + stocker_support.eq(i).val() + '"]').remove();
                freezer.find('option[value="' + stocker_support.eq(i).val() + '"]').remove();
            }

            for (i = 0; i < mezzanine.length; i++) {
                if (mezzanine.eq(i).val() === 'Temp') {
                    continue;
                }
                icer_conveyor.find('option[value="' + mezzanine.eq(i).val() + '"]').remove();
                labeler_conveyor.find('option[value="' + mezzanine.eq(i).val() + '"]').remove();
                labeler_support.find('option[value="' + mezzanine.eq(i).val() + '"]').remove();
                icer_support.find('option[value="' + mezzanine.eq(i).val() + '"]').remove();
                stocker_support.find('option[value="' + mezzanine.eq(i).val() + '"]').remove();
                runner.find('option[value="' + mezzanine.eq(i).val() + '"]').remove();
                cleaner.find('option[value="' + mezzanine.eq(i).val() + '"]').remove();
                qc.find('option[value="' + mezzanine.eq(i).val() + '"]').remove();
                giftBox.find('option[value="' + mezzanine.eq(i).val() + '"]').remove();
                freezer.find('option[value="' + mezzanine.eq(i).val() + '"]').remove();
            }

            for (i = 0; i < runner.length; i++) {
                if (runner.eq(i).val() === 'Temp') {
                    continue;
                }
                icer_conveyor.find('option[value="' + runner.eq(i).val() + '"]').remove();
                labeler_conveyor.find('option[value="' + runner.eq(i).val() + '"]').remove();
                labeler_support.find('option[value="' + runner.eq(i).val() + '"]').remove();
                icer_support.find('option[value="' + runner.eq(i).val() + '"]').remove();
                stocker_support.find('option[value="' + runner.eq(i).val() + '"]').remove();
                mezzanine.find('option[value="' + runner.eq(i).val() + '"]').remove();
                cleaner.find('option[value="' + runner.eq(i).val() + '"]').remove();
                qc.find('option[value="' + runner.eq(i).val() + '"]').remove();
                giftBox.find('option[value="' + runner.eq(i).val() + '"]').remove();
                freezer.find('option[value="' + runner.eq(i).val() + '"]').remove();
            }

            for (i = 0; i < cleaner.length; i++) {
                icer_conveyor.find('option[value="' + cleaner.eq(i).val() + '"]').remove();
                labeler_conveyor.find('option[value="' + cleaner.eq(i).val() + '"]').remove();
                labeler_support.find('option[value="' + cleaner.eq(i).val() + '"]').remove();
                icer_support.find('option[value="' + cleaner.eq(i).val() + '"]').remove();
                stocker_support.find('option[value="' + cleaner.eq(i).val() + '"]').remove();
                mezzanine.find('option[value="' + cleaner.eq(i).val() + '"]').remove();
                runner.find('option[value="' + cleaner.eq(i).val() + '"]').remove();
                qc.find('option[value="' + cleaner.eq(i).val() + '"]').remove();
                giftBox.find('option[value="' + cleaner.eq(i).val() + '"]').remove();
                freezer.find('option[value="' + cleaner.eq(i).val() + '"]').remove();
            }

            for (i = 0; i < qc.length; i++) {
                icer_conveyor.find('option[value="' + qc.eq(i).val() + '"]').remove();
                labeler_conveyor.find('option[value="' + qc.eq(i).val() + '"]').remove();
                labeler_support.find('option[value="' + qc.eq(i).val() + '"]').remove();
                icer_support.find('option[value="' + qc.eq(i).val() + '"]').remove();
                stocker_support.find('option[value="' + qc.eq(i).val() + '"]').remove();
                mezzanine.find('option[value="' + qc.eq(i).val() + '"]').remove();
                runner.find('option[value="' + qc.eq(i).val() + '"]').remove();
                cleaner.find('option[value="' + qc.eq(i).val() + '"]').remove();
                giftBox.find('option[value="' + qc.eq(i).val() + '"]').remove();
                freezer.find('option[value="' + qc.eq(i).val() + '"]').remove();
            }

            for (i = 0; i < giftBox.length; i++) {
                icer_conveyor.find('option[value="' + giftBox.eq(i).val() + '"]').remove();
                labeler_conveyor.find('option[value="' + giftBox.eq(i).val() + '"]').remove();
                labeler_support.find('option[value="' + giftBox.eq(i).val() + '"]').remove();
                icer_support.find('option[value="' + giftBox.eq(i).val() + '"]').remove();
                stocker_support.find('option[value="' + giftBox.eq(i).val() + '"]').remove();
                mezzanine.find('option[value="' + giftBox.eq(i).val() + '"]').remove();
                runner.find('option[value="' + giftBox.eq(i).val() + '"]').remove();
                cleaner.find('option[value="' + giftBox.eq(i).val() + '"]').remove();
                qc.find('option[value="' + giftBox.eq(i).val() + '"]').remove();
                freezer.find('option[value="' + giftBox.eq(i).val() + '"]').remove();
            }

            for (i = 0; i < freezer.length; i++) {
                icer_conveyor.find('option[value="' + freezer.eq(i).val() + '"]').remove();
                labeler_conveyor.find('option[value="' + freezer.eq(i).val() + '"]').remove();
                labeler_support.find('option[value="' + freezer.eq(i).val() + '"]').remove();
                icer_support.find('option[value="' + freezer.eq(i).val() + '"]').remove();
                stocker_support.find('option[value="' + freezer.eq(i).val() + '"]').remove();
                mezzanine.find('option[value="' + freezer.eq(i).val() + '"]').remove();
                runner.find('option[value="' + freezer.eq(i).val() + '"]').remove();
                cleaner.find('option[value="' + freezer.eq(i).val() + '"]').remove();
                qc.find('option[value="' + freezer.eq(i).val() + '"]').remove();
                giftBox.find('option[value="' + freezer.eq(i).val() + '"]').remove();
            }

            for (i = 0; i < icer_conveyor.length; i++) {
                if (icer_conveyor.eq(i).val() === 'Temp') {
                    continue;
                }
                freezer.find('option[value="' + icer_conveyor.eq(i).val() + '"]').remove();
                labeler_conveyor.find('option[value="' + icer_conveyor.eq(i).val() + '"]').remove();
                labeler_support.find('option[value="' + icer_conveyor.eq(i).val() + '"]').remove();
                icer_support.find('option[value="' + icer_conveyor.eq(i).val() + '"]').remove();
                stocker_support.find('option[value="' + icer_conveyor.eq(i).val() + '"]').remove();
                mezzanine.find('option[value="' + icer_conveyor.eq(i).val() + '"]').remove();
                runner.find('option[value="' + icer_conveyor.eq(i).val() + '"]').remove();
                cleaner.find('option[value="' + icer_conveyor.eq(i).val() + '"]').remove();
                qc.find('option[value="' + icer_conveyor.eq(i).val() + '"]').remove();
                giftBox.find('option[value="' + icer_conveyor.eq(i).val() + '"]').remove();
            }

            for (i = 0; i < icer_support.length; i++) {
                if (icer_support.eq(i).val() === 'Temp') {
                    continue;
                }
                freezer.find('option[value="' + icer_support.eq(i).val() + '"]').remove();
                labeler_conveyor.find('option[value="' + icer_support.eq(i).val() + '"]').remove();
                labeler_support.find('option[value="' + icer_support.eq(i).val() + '"]').remove();
                icer_conveyor.find('option[value="' + icer_support.eq(i).val() + '"]').remove();
                stocker_support.find('option[value="' + icer_support.eq(i).val() + '"]').remove();
                mezzanine.find('option[value="' + icer_support.eq(i).val() + '"]').remove();
                runner.find('option[value="' + icer_support.eq(i).val() + '"]').remove();
                cleaner.find('option[value="' + icer_support.eq(i).val() + '"]').remove();
                qc.find('option[value="' + icer_support.eq(i).val() + '"]').remove();
                giftBox.find('option[value="' + icer_support.eq(i).val() + '"]').remove();
            }

        });

    </script>

@endsection

@section('footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <script>
        $(document).ready(function ($) {
            $("select[name='conveyor_lines[]']").select2({width: 60});
            $("select[name='support_lines[]']").select2({width: 60});
            $("select[name='labeler_conveyor[]']").select2({width: 160});
            $("select[name='icer_conveyor[]']").select2({width: 160});
            $("select[name='labeler_support[]']").select2({width: 120});
            $("select[name='stocker_support[]']").select2({width: 120});
            $("select[name='icer_support[]']").select2({width: 120});
            $("select[name='mezzanine[]']").select2({width: 200});
            $("select[name='runner[]']").select2({width: 200});
            $("select[name='qc[]']").select2({width: 200});
            $("select[name='cleaner[]']").select2({width: 200});
            $("select[name='giftBox[]']").select2({width: 200});
            $("select[name='freezer[]']").select2({width: 200});
            $("select[name='mezzanine_Startlines[]']").select2({width: 75});
            $("select[name='mezzanine_Endlines[]']").select2({width: 75});
            $("select[name='runner_Startlines[]']").select2({width: 75});
            $("select[name='runner_Endlines[]']").select2({width: 75});
            $("select[name='kpmg[]']").select2({width: 200});

        });

    </script>

@endsection

