<div class="sidebar float-left bg-dark shadow-sm" style="width: 200px; align-items: stretch; position:relative; top:-24px; left:-15px;">
    <nav id="sidebar" style="min-height: 100vh;">
    @guest

    @else
    <!--
        <a class="btn btn-default" href="#ProdsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Products</a>
        <ul class="collapse list-group" id="ProdsSubmenu">
            <li class="list-group-item">

            </li>
            <li class="list-group-item">
                <a class="btn btn-default" href="/products">Update</a>
            </li>
            <li class="list-group-item">
                <a class="btn btn-default" href="/products">Delete</a>
            </li>
        </ul>
    -->
    <ul class="list-group" id="sidebar">
        <li class="{{ Request::is('dashboard') ? 'active' : '' }} list-group-item list-group-item-action">
            <a class="btn btn-default" href="/dashboard">
            <i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li class="{{ Request::is('warehouses') ? 'active' : '' }} list-group-item list-group-item-action">
            <a class="btn btn-default" href="/warehouses">
            <i class="fas fa-warehouse"></i> Warehouses</a>
        </li>
        <li class="{{ Request::is('products') ? 'active' : '' }} list-group-item list-group-item-action">
            <a class="btn btn-default" href="/products">
            <i class="fas fa-boxes"></i> Products</a>
        </li>
        <li class="{{ Request::is('prodqtys') ? 'active' : '' }} list-group-item list-group-item-action">
            <a class="btn btn-default" href="/prodqtys">
            <i class="fas fa-cubes"></i> Manage Qty's</a>
        </li>
    </ul>
    @endguest
    </nav>
</div>
