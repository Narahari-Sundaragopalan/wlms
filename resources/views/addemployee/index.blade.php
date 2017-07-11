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

    @include('includes.admin')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/addemployee/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-patient" class="btn btn-success"><i class="fa fa-btn fa-file-o"></i>Add Employee</button>
                            </form>
                        </div>
                        <div style="text-align: center"><h3>{{ 'Employees' }}</h3></div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <tr class="bg-info">
                                    {{--<th>User</th><th>Email</th><th>Status</th><th class="no-sort">Actions</th>--}}
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Position</th>
                                    <th>Experience</th>
                                    <!-- <th>Language</th> -->
                                    <th style="text-align: center">Actions</th>
                                </tr>
                                </thead>

                                <tbody> <!-- Table Body -->
                                @foreach($employees as $employee)

                                    <tr>
                                        <td class="table-text"><div>{{ $employee->empid  }}</div></td>
                                        <td class="table-text">
                                            <div>
                                                <a href="{{ url('addemployee/'.$employee->id.'/edit') }}">{{ $employee->empname }}</a>
                                            </div>
                                        </td>
                                        {{-- <td class="table-text"><div>{{ $employee->empname }}</div></td>--}}
                                        <td class="table-text"><div>{{ $employee->positiontype }}</div></td>
                                        <td class="table-text"><div>{{ $employee->experience }}</div></td>
                                        <!-- <td class="table-text"><div>{{ $employee->language }}</div></td> -->
                                        <td><a href="{{url('addemployee',$employee->id)}}" class="btn btn-primary">Details</a></td>
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
        .table td { border: 0px !important; }
        .tooltip-inner { white-space:pre-wrap; max-width: 400px; }
    </style>

    <script>
        $(document).ready(function() {
            $('table.cds-datatable').on( 'draw.dt', function () {
                $('tr').tooltip({html: true, placement: 'auto' });
            } );
            $('tr').tooltip({html: true, placement: 'auto' });
        } );
    </script>
@endsection