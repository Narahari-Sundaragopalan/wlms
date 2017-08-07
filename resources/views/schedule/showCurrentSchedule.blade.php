@extends('layouts.userlayout')

@section('content')
    <style>
        th {
            background: firebrick;
            color: whitesmoke;
            text-align: center;
        }

        tr {
            font-size: medium;
            text-align: center;
        }

        #scroller {
            overflow-y: scroll;
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/downloadReport/xls', $id) }}" method="GET">{{ csrf_field() }}
                                <button type="submit" class="btn btn-success" style="background-color: #2ca02c;">
                                    Download Schedule
                                </button>
                            </form>
                        </div>
                        <div class="pull-left">
                            <a href="{{ url('/schedule/requestSchedule') }}" class="btn btn-info"><i
                                        class="fa fa-btn fa-backward"></i> Back </a>
                        </div>
                        <div><h4 style="text-align: center; color: black">{{ $heading }}</h4>
                            <span id="first"
                                  style="font-weight: bold; text-align:left; color: black">{{"Coolers Shipped : " . number_format($coolersShipped) }}</span>
                            <span id="second"
                                  style="font-weight: bold; float: right; color: black">{{"Total Temps Needed : " . $Temps }}</span>
                        </div>
                    </div>
                    <div id="scroller" class="panel-body">
                        <div class="col-xs-6">
                            <h3 style="text-align: center">Conveyor Lines</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead> <!-- Table Headings -->
                                    <th>Line Number</th>
                                    <th>Labeler</th>
                                    <th>Icer</th>
                                    </thead>
                                    <tbody>
                                    @foreach($schedule_array as $i => $value)
                                        <tr class="bg-info">
                                        <tr>
                                            <td><?php echo($schedule_array[$i]['line_number']); ?></td>
                                            <td><?php echo($schedule_array[$i]['labeler']); ?></td>
                                            <td><?php echo($schedule_array[$i]['icer']); ?></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-xs-6">
                            <h3 style="text-align: center">Support Lines</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable dataTable">
                                    <thead> <!-- Table Headings -->
                                    <th>Line Number</th>
                                    <th>Labeler</th>
                                    <th>Stocker</th>
                                    <th>Icer</th>
                                    </thead>
                                    <tbody>
                                    @foreach($schedule_array_2 as $j => $value)
                                        <tr class="bg-info">
                                        <tr>
                                            <td><?php echo($schedule_array_2[$j]['line_number']); ?></td>
                                            <td><?php echo($schedule_array_2[$j]['labeler']); ?></td>
                                            <td><?php echo($schedule_array_2[$j]['stocker']); ?></td>
                                            <td><?php echo($schedule_array_2[$j]['icer']); ?></td>
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
                                            <td><?php echo($mezzanineArray[$i]['startLine']);?>
                                                - <?php  echo($mezzanineArray[$i]['endLine']); ?></td>
                                            <td><?php echo($mezzanineArray[$i]['name']); ?></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

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
                                            <td><?php echo($runnerArray[$i]['startLine']); ?>
                                                - <?php echo($runnerArray[$i]['endLine']); ?></td>
                                            <td><?php echo($runnerArray[$i]['name']); ?></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6" valign="table-responsive">
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
                                            @if(sizeof($qc))
                                                @foreach($qc as $index => $qcEmp)
                                                    <?php echo($qcEmp); if ($index < (count($qc) - 1)) {
                                                        echo ", ";
                                                    }?>
                                                @endforeach
                                            @else
                                                <?php echo ""; ?>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gift Box</td>
                                        <td>
                                            @if(sizeof($giftBox))
                                                @foreach($giftBox as $index => $giftBoxEmp)
                                                    <?php echo($giftBoxEmp); if ($index < (count($giftBox) - 1)) {
                                                        echo ", ";
                                                    } ?>
                                                @endforeach
                                            @else
                                                <?php echo ""; ?>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Clean</td>
                                        <td>
                                            @if(sizeof($cleaner))
                                                @foreach($cleaner as $index => $cleanerEmp)
                                                    <?php echo($cleanerEmp); if ($index < (count($cleaner) - 1)) {
                                                        echo ", ";
                                                    } ?>
                                                @endforeach
                                            @else
                                                <?php echo ""; ?>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Freezer</td>
                                        <td>
                                            @if(sizeof($freezer))
                                                @foreach($freezer as $index => $freezerEmp)
                                                    <?php echo($freezerEmp); if ($index < (count($freezer) - 1)) {
                                                        echo ", ";
                                                    } ?>
                                                @endforeach
                                            @else
                                                <?php echo ""; ?>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>

        window.setInterval(scrollit, 2000);

        function scrollit() {
            console.log(($("#scroller").scrollTop() + $("#scroller").innerHeight()))
            console.log($("#scroller")[0].scrollHeight)

            if (($("#scroller").scrollTop() + $("#scroller").innerHeight()) >= $("#scroller")[0].scrollHeight)
                $('#scroller').animate({scrollTop: 0}, 2000).delay(20);
            else
                $('#scroller').animate({scrollTop: $("#scroller").scrollTop() + 60}, 'slow', function () {

                });
        }
    </script>