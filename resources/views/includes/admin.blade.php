
<div class="container" style="float: left;width: 15%; border-right: 2px solid black">
    <div style="height: 70%">
        <img class="center-block" src="{{URL::asset('/images/man.jpg')}}" alt="profile Pic" height="150" width="150">
    </div>
    <div>
        <h4 style="text-align: center; color: black"> Administrator </h4>
    </div>
    <hr style="border-top: 1px solid #151515;">

    <div>
        <li style="list-style: none; text-align: left ">
            <ul ><a href="{{ url('/addemployee') }}" class="btn btn-danger" style="width: 150px; height: 30px; text-align: center;" >Add an Employee</a></ul>
            <!--<ul><a href="{{ url('/addremovefields') }}" class="btn btn-danger" style="width: 200px; height: 30px;">List of Employees</a></ul>-->
            <ul><a href="" class="btn btn-danger" style="width: 150px; height: 30px;">Schedule</a></ul>
            <ul><a ="{{ url('/listoffields') }}" class="btn btn-danger" style="width: 150px; height: 30px;">Add a Supervisor</a></ul>
            <!--<ul><a class="btn btn-primary" style="width: 200px; height: 30px;">View Reports</a></ul>-->
            {{--<ul><a class="btn btn-primary" style="width: 200px; height: 30px;">View data evidence</a></ul>--}}
        </li>
    </div>
</div>
