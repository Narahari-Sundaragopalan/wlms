<div class=".container-fluid" style="float: left;  width: 15%; border-right: 2px solid black; margin:0px; padding:0px;">
    <div style="height: 70%">
        <img class="img-responsive center-block" src="/images/os.png" alt="Chania" height="150" width="150">
    </div>
    <div>
        <h4 style="text-align: center; color: black"> Administrator </h4>
    </div>
    <hr style="border-top: 1px solid #151515;">

    <div>
        <li type="button" style="list-style: none; text-align: center; margin-right:0px; padding:5px;">
            <a href="{{ url('/administrator') }}" class="btn btn-danger btn-responsive "
               style="width: 150px; height: 30px; text-align: center;">Home</a></li>
        <li type="button" style="list-style: none; text-align: center; margin-right:0px; padding:5px;  ">
            <a href="{{ url('/addemployee') }}" class="btn btn-danger btn-responsive"
               style="width: 150px; height: 30px; text-align: center;">Employees</a></li>
        <li type="button" style="list-style: none; text-align: center; margin-right:0px; padding:5px;  ">
            <a href="{{ url('/schedule') }}" class="btn btn-danger btn-responsive" style="width: 150px; height: 30px;">Schedule</a>
        </li>
        <li type="button" style="list-style: none; text-align: center; margin-right:0px; padding:5px;  ">
            <a href="{{ url('/Supervisor') }}" class="btn btn-danger btn-responsive"
               style="width: 150px; height: 30px;">Supervisors</a></li>
        <li type="button" style="list-style: none; text-align: center; margin-right:0px; padding:5px;  ">
            <a href="{{ url('/user') }}" class="btn btn-danger btn-responsive"
               style="width: 150px; height: 30px; text-align: center;">Users</a></li>


    </div>

</div>
