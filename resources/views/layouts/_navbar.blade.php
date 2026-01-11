<nav class="nav">
    <div class="nav-content">
        <div class="nav-links"> 
            <a href="{{ route('home') }}" class="nav-brand"><img src="{{ asset('images/text logo.svg') }}" class="logo"></a>
            <a href="{{ route('home') }}" class="nav-link">Home</a>
            <a href="{{ route('products.index') }}" class="nav-link">Products</a>
            <a href="{{ route('categories.index') }}" class="nav-link">Categories</a>
        </div>
        <div class="nav-right">
            <div class="search-bar">   
                <form action="{{ route('products.search') }}" method="GET">
                    <i class="fas fa-search"></i>
                    <input type="text" name="query" placeholder="Search for products" value="{{ request('query') }}">
                </form>
            </div>
            <a href="{{ route('cart.index') }}" class="nav-link"><img src="{{ asset('images/cart.svg') }}"></a>     
            @guest
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link logout-btn">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</nav>
