
<div class="container" style="float: left;  width: 15%; border-right: 2px solid black; margin:0px; padding:0px;">
    <div style="height: 70%">
        <img class="center-block" src="{{URL::asset('/images/man.jpg')}}" alt="profile Pic" height="150" width="150">
    </div>
    <div>
        <h4 style="text-align: center; color: black"> Administrator </h4>
    </div>
    <hr style="border-top: 1px solid #151515;">

    <div>
        <li style="list-style: none; text-align: left; margin:0px; padding:0px; ">
            <ul ><a href="{{ url('/administrator') }}" class="btn btn-danger" style="width: 150px; height: 30px; text-align: center;" >Home</a></ul>
            <ul ><a href="{{ url('/addemployee') }}" class="btn btn-danger" style="width: 150px; height: 30px; text-align: center;" >Employees</a></ul>
            <!--<ul><a href="{{ url('/addremovefields') }}" class="btn btn-danger" style="width: 200px; height: 30px;">List of Employees</a></ul>-->
            <ul><a href="{{ url('/schedule') }}" class="btn btn-danger" style="width: 150px; height: 30px;">Schedule</a></ul>
            <ul><a href="{{ url('/Supervisor') }}" class="btn btn-danger" style="width: 150px; height: 30px;">Supervisors</a></ul>

            <ul><a href="{{ url('/user') }}"class="btn btn-danger" style="width: 150px; height: 30px; text-align: center;">Users</a></ul>
            {{--<ul><a class="btn btn-primary" style="width: 200px; height: 30px;">View data evidence</a></ul>--}}
        </li>
    </div>
</div>
