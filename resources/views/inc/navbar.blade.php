<!-- <nav>
<div class="navbar navbar-inverse"> 
        <div class="container">      
      <div class="navbar-header">      
          <a href="/" class="navbar-brand" style="font-size:28px; font-weight:bold;">MassBunk</a>         
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
      </div>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/login"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
                <li><a  href="/contact"><span class="glyphicon glyphicon-phone">Contact Us</span></a></li>
            </ul>
            </div> 
            <div class="collapse navbar-collapse" id="mynavbar">
                <!--
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../Settings.php"><span class="glyphicon glyphicon-user">Settings </span></a></li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out">Logout </span></a></li>
            </ul> 
            </div> 
        </div>
    </div>
    </nav>
-->
    <strong>
    <nav class="navbar navbar-static-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/" style="font-size:28px; font-weight:bold;">
                        {{ config('app.name', 'MassBunk') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a  href="/contact">Contact Us</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/create">Create Poll</a>
                                        </li>
                                        <li>
                                    <a href="/polls">View Polls</a>
                                        </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </strong>