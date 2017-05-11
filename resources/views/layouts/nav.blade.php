
<nav class="nav">
            <div class="nav-left">
                <a class="nav-item">
                    {{-- <img src="http://i.imgur.com/gBYFd7Y.png" alt="noir logo"> --}}
                    noir box
                </a>
            </div>
            <div class="nav-center">
                <a class="nav-item">
                    <span class="icon">
                        <i class="fa fa-twitter">
                        </i> 
                    </span>
                </a>
            </div>
            <span class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </span>
                <div id="mobilenav" class="nav-right nav-menu">
                    @if (Auth::check())
                        <a class="nav-item" href="/home">Home</a>
                        <a class="nav-item" href="/boxers">Boxers</a>
                        <a class="nav-item" href="/tournament">Start Tournament</a>
                        <a class="nav-item" href="/1v1">1 v 1</a>
                        <a class="nav-item" href="/logout">Logout</a>
                    @else
                        <a class="nav-item" href="/register">Register</a>
                        <a class="nav-item" href="/login">Login</a>
                @endif
            </div>
        </nav>