<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Commerce')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body x-data="cart()">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">E-Commerce</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

<!-- Cart -->
<div class="position-fixed top-0 end-0 m-3 bg-white border p-3 shadow" style="width:300px; display:none;" x-show="open">
    <h5>Cart</h5>
    <template x-for="item in items" :key="item.id">
        <div class="d-flex justify-content-between">
            <span x-text="item.name"></span>
            <span>$<span x-text="item.price"></span></span>
            <button @click="remove(item.id)" class="btn btn-sm btn-danger">X</button>
        </div>
    </template>
    <hr>
    <div>Total: $<span x-text="total()"></span></div>
    <button class="btn btn-success w-100 mt-2">Checkout</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
function cart() {
    return {
        open: true,
        items: [],
        add(product) {
            let exist = this.items.find(i => i.id === product.id);
            if(exist) exist.qty++;
            else this.items.push({...product, qty:1});
        },
        remove(id) {
            this.items = this.items.filter(i => i.id !== id);
        },
        total() {
            return this.items.reduce((sum, i) => sum + i.price * i.qty, 0);
        }
    }
}
</script>
</body>
</html>
