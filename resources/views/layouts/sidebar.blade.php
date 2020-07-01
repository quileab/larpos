<div class="sidebar float-left bg-dark shadow-sm" style="width: 200px; align-items: stretch; position:relative; top:0px; left:-15px;">
    <nav id="sidebar" style="min-height: 100vh;">
    @guest

    @else
    <ul class="list-group" id="sidebar">
        <li class="{{ Request::is('dashboard') ? 'active' : '' }} list-group-item list-group-item-action">
            <a href="/dashboard" class="{{ Request::is('dashboard') ? 'text-light' : '' }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li class="{{ Request::is('warehouses') ? 'active' : '' }} list-group-item list-group-item-action">
            <a href="/warehouses" class="{{ Request::is('warehouses') ? 'text-light' : '' }}">
            <i class="fas fa-warehouse"></i> Warehouses</a>
        </li>
        <li class="{{ Request::is('products') ? 'active' : '' }} list-group-item list-group-item-action">
            <a href="/products" class="{{ Request::is('products') ? 'text-light' : '' }}">
            <i class="fas fa-boxes"></i> Products</a>
        </li>
        <li class="{{ Request::is('prodqtys') ? 'active' : '' }} list-group-item list-group-item-action">
            <a href="/prodqtys" class="{{ Request::is('prodqtys') ? 'text-light' : '' }}">
            <i class="fas fa-cubes"></i> Manage Qty's</a>
        </li>
        <li class="{{ Request::is('clients') ? 'active' : '' }} list-group-item list-group-item-action">
            <a href="/clients" class="{{ Request::is('clients') ? 'text-light' : '' }}">
            <i class="fas fa-users"></i> Clients</a>
        </li>

        @if (Session::has('clientid'))
        <li class="{{ Request::is('deliverynotes') ? 'active' : '' }} list-group-item list-group-item-action">
            <a href="/invoices/create" class="{{ Request::is('invoices') ? 'text-light' : '' }}">
            <i class="fas fa-file-invoice-dollar"></i> Delivery Note</a>
            <p class="text-warning text-truncate">
            <a href="clients/deselect">
                <i class="fas fa-user-slash text-danger"></i></a>&nbsp;
            <small> ({{{ Session::get('clientid') }}}) &nbsp; {{{ Session::get('clientname') }}}</small>
            </p>
        </li>
        @endif


    </ul>
    @endguest
    </nav>
</div>
