<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="{{route('home')}}">User</a></h1>
                </div>
            </div>

            <div class="col-md-2 pull-right">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <a href="#" >
                                <img src="{{url('images/U',Auth::user()->image)}}" style="margin-top:10px;width:25%;border-radius:50px"/>
                            </a>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b
                                            class="caret"></b></a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/logout')}}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
