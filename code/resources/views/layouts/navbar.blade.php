<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">GiftMe</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            @if(auth()->check())
            <li class="nav-item">
                <a class="nav-link" href="#">My wishlist</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">My gifts</a>
            </li>
            @endif
        </ul>
        <ul class="navbar-nav">
            @if(auth()->check())
            <li class="nav-item active">
                <a class="nav-link" href="/logout" >Logout</a>
            </li>
            @else
            <li class="nav-item active">
                <a class="nav-link" href="/login" >Login</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/signup" >Sign up</a>
            </li>
            @endif
        </ul>
    </div>
</nav>