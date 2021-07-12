
<header class="header">
    
    <div class="site-header-main">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{!! asset('assets/images/logo.png') !!}" width="200" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarsExample07">
                    <ul class="navbar-nav ml-auto">
                        @if (Auth::guard('user')->check())
                        <li class="nav-item active">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>