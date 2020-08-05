<div id="sidebar" class="float-left shadow overflow-hidden px-0" 
    style="position:relative; top:0px; left:-1rem;">
    <nav style="min-height: 100vh;">
        @guest
        <i class="fas fa-lock"></i>
        @else

        <a href="/dashboard" class="side {{ Request::is('dashboard') ? 'text-light bg-dark' : '' }}">
            <i class="px-2 fas fa-tachometer-alt"></i>
            <div class="tag">Dashboard</div>
        </a>

        <a href="/warehouses" class="side {{ Request::is('warehouses') ? 'text-light bg-dark' : '' }}">
            <i class="px-2 fas fa-warehouse"></i>
            <div class="tag">Warehouses</div>
        </a>

        <a href="/products" class="side {{ Request::is('products') ? 'text-light bg-dark' : '' }}">
            <i class="px-2 fas fa-boxes"></i>
            <div class="tag">Products</div>
        </a>

        <a href="/prodqtys" class="side {{ Request::is('prodqtys') ? 'text-light bg-dark' : '' }}">
            <i class="px-2 fas fa-cubes"></i>
            <div class="tag">Manage Qty's</div>
        </a>

        <a href="/clients" class="side {{ Request::is('clients') ? 'text-light bg-dark' : '' }}">
            <i class="px-2 fas fa-users"></i>
            <div class="tag">Clients</div>
        </a>

        @if (Session::has('clientid'))

        <a href="/invoices/create" class="side {{ Request::is('invoices') ? 'text-light bg-dark' : '' }}">
            <i class="px-2 fas fa-file-invoice-dollar"></i>
            <div class="tag">Delivery Note</div>
        </a>
        @endif

        @endguest
    </nav>
</div>