<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
               data-toggle="dropdown">
                {{ auth()->user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/changePassword">
                    Change password
                </a>

                @if($isEmployee and Auth::user()->isCheckedIn and !Auth::user()->hasCheckedOut)
                    <a class="dropdown-item" href="/check-out"
                       onclick="event.preventDefault(); document.getElementById('check-out-form').submit();">
                        Check Out
                    </a>
                @endif


                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @if($isEmployee and Auth::user()->isCheckedIn and !Auth::user()->hasCheckedOut)
                    <form id="check-out-form" action="/check-out" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </div>
        </li>
    @endguest
</ul>