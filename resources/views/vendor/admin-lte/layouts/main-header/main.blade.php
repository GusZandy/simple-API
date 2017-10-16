<header class="main-header">

  <!-- Logo -->
  <a href="/" class="logo">
    @section('logo-mini')
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>@yield('short-title', substr(config('app.name', 'AdminLTE'), 0, 3))</b></span>
    @show
    @section('logo-lg')
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>@yield('title', config('app.name', 'AdminLTE'))</b></span>
    @show
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        @if (auth()->check()) @include('admin-lte::layouts.main-header.navbar-right-menu.user-menu') @else
        <li>
          <a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a>
        </li>
        @endif
        <!-- Control Sidebar Toggle Button -->
      </ul>
    </div>
  </nav>
</header>
