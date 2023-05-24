<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid">
        <div class="navbar-brand">
            <img src="../img/logoutama.png" alt="" width="58" class="d-inline-block align-text-top">
        </div>

        @auth
            <div>
                <a href="/logout"><button class="button-primary">Logout</button></a>
                <a href="/switch"><button class="button-secundary">Beralih akun</button></a>
            </div>
        @else
            <div>
                <a href="/register"><button class="button-primary">Daftar</button></a>
                <a href="/login"><button class="button-secundary" >Login</button></a>
            </div>
        @endauth

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" aria-current="page" href="/">
                        <div class="navigasi">
                            <div class="bi bi-house-fill navigasi-icon"></div>
                            <div class="navigasi-kata">Home</div>
                        </div>                       
                    </a>
                </li>

                @if(!auth()->guest() && auth()->user()->isAdmin)
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "Categories") ? 'active' : '' }}" aria-current="page" href="/categories">
                            <div class="navigasi">
                                <div class="bi bi-tags-fill navigasi-icon"></div>
                                <div class="navigasi-kata">Categories</div>
                            </div>                       
                        </a>
                    </li>
                @endif
                
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Search") ? 'active' : '' }}" aria-current="page" href="/search">
                        <div class="navigasi">
                            <div class="bi bi-search navigasi-icon" ></div>
                            <div class="navigasi-kata">Search</div>
                        </div>                       
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Write Recipe") ? 'active' : '' }}" aria-current="page" href="/create">
                        <div class="navigasi">
                            <div class="bi bi-pencil-square navigasi-icon" ></div>
                            <div class="navigasi-kata">Write Recipe</div>
                        </div>                       
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Account") ? 'active' : '' }}" aria-current="page" href="/account">
                        <div class="navigasi">
                            <div class="bi bi-person-circle navigasi-icon" ></div>
                            <div class="navigasi-kata">Account</div>
                        </div>                       
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
