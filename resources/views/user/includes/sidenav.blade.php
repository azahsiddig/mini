{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('home')}}"><i class="glyphicon glyphicon-home"></i>
                    Dashboard</a></li>
            <!--li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Peofile
                    <span class="caret pull-right"></span>
                </a>
            </li-->
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Orders
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->

                <ul>
                    <li><a href="{{url('user/orders/all')}}">All orders</a></li>
                    <li><a href="{{url('user/orders/waiting')}}">waiting orders</a></li>
                    <li><a href="{{url('user/orders/delivered')}}">delivered orders</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->
