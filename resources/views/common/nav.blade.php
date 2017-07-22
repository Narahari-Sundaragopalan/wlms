<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a class="navbar-brand" href="{{ url('/') }}">
                <div class= "brand"><b>Omaha Steaks</b></div>
            </a>

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">

                @if (Auth::check())
                    <li><a href="{{ url('/home') }}" style="color: whitesmoke"><b style="font-size: medium">Home</b></a></li>
                @endif

            </ul>

            <ul class="header">

                <ul class="heading"><b> Warehouse Labor Management System</b></ul>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><b style="color: whitesmoke; margin-right: 30px;">Login</b></a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: whitesmoke; font-size: medium; margin-right: 20px;"><b>
                                {{ Auth::user()->name }} <span class="caret"></span></b>

                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/buttons') }}"><i class="fa fa-btn"></i>Update Profile</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<style>
    body {
        font-family: 'Roboto';
    }

    .fa-btn {
        margin-right: 6px;
        border-color: transparent;
    }

    .navbar-static-top {
        background-color: #2e3436;
    }


    .navbar-default {
        text-align: center;
    
    }
    
    
    .header {
        color: whitesmoke;
        display: inline-block;
        float: none;
        padding-top: 1%;
        font-size: x-large;
        margin-right: 100px;

    }

    .brand {
        text-align: center;
        color: whitesmoke;
        font-size: medium;
        margin-left: 10px;
    }

</style>