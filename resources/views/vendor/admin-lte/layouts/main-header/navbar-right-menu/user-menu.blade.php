<!-- User Account Menu -->
{{-- {{ dd(public_path('images/users').'/'.Auth::user()->image) }} --}}
<li class="dropdown user user-menu">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src={{ URL::to('/images/users/'.Auth::user()->image) }} class="user-image" alt="User Image">
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs">@yield('user-name', 'Alexander Pierce')</span>
    </a>
    <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
            <img src={{ URL::to('/images/users/'.Auth::user()->image) }} class="img-circle" alt="User Image">

            <p>
                @yield('user-name', 'Alexander Pierce') - Web Developer
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">

            </div>
            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <form action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-default btn-flat">Keluar</button>
                </form>
            </div>
        </li>
    </ul>
</li>
