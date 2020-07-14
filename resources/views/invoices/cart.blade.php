@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-header">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <div class="row">
            <div class="col-6">
              <!---- BUSQUEDA de productos ---->
              <form action="{{ route('invoices.productssearch') }}" method="get" spellcheck="false">
                <div class="input-group md-form form-sm form-2">
                  <input type="hidden" name="quantity" id="srchquantity" value="1">
                  <input class="form-control form-control-sm" type="search" name="search" placeholder="Buscar" aria-label="Search">
                  <div class="input-group-append form-control-sm">
                    <button class="input-group-text btn btn-success" type="submit" onclick="$('#srchquantity').val(parseFloat(document.getElementById('qty').value));">
                      <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <!---- Empty col ---->
            <div class="col-6">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ProductsModal">
              &nbsp;Producto
                      <i class="fas fa-search" aria-hidden="true"></i>&nbsp;
                    </button>
            </div>
            <!-- div class="col-2">
                <input class="form-control form-control-sm" type="number" name="qty" id="qty" placeholder="Cantidad" aria-label="Cantidad" value="1">
            </div -->
          </div>
        </div><!-- Card Header -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              @livewire("productslist")
            </div>
          </div>
          <div class="row">
            <div class="col">
              <!-- List of searched products -->
              @livewire("cartlist")
              <!-- end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection