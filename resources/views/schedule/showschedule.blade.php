@extends( 'layouts.userlayout')
@section('content')
    <style>

        html, body {
            background-size: cover;
        }

        table {
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
    @if($user->getRoleName() == 'Administrator')
        @include('includes.admin')
    @else
        @include('includes.manage')
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <a href="{{ url('/schedule/requestSchedule') }}" class="btn btn-info"><i
                                        class="fa fa-btn fa-backward"></i> Back </a>
                        </div>
                        <div style="text-align: center; color: black"><h3>{{ 'Schedule History' }}</h3></div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <tr class="bg-info">
                                    {{--<th>User</th><th>Email</th><th>Status</th><th class="no-sort">Actions</th>--}}
                                    <th>Schedule Date</th>
                                    <th>Schedule Time</th>
                                    <th>Created</th>
                                    <th style="text-align: center">Actions</th>
                                </tr>
                                </thead>

                                <tbody> <!-- Table Body -->
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ $schedule->date  }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $schedule->time }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $schedule->created_at->diffForHumans() }}</div>
                                        </td>
                                        <td><a href="{{url('schedule/show',$schedule->id)}}" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <style>
        .table td {
            border: 0px !important;
        }

        .tooltip-inner {
            white-space: pre-wrap;
            max-width: 400px;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('table.cds-datatable').on('draw.dt', function () {
                $('tr').tooltip({html: true, placement: 'auto'});
            });
            $('tr').tooltip({html: true, placement: 'auto'});
        });
    </script>

@endsection