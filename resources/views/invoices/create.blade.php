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
            @livewire("barcodeto-cart")
          </div>
            <!---- OPEN Advanced Search MODAL ---->
            <div class="col-6">
              <button class="btn btn-primary" data-toggle="modal" data-target="#ProductsModal">
                &nbsp;Producto&nbsp;
                <i class="fas fa-search" aria-hidden="true"></i>&nbsp;
              </button>
            </div>
            <!-- div class="col-2">
                <input class="form-control form-control-sm" type="number" name="qty" id="qty" placeholder="Cantidad" aria-label="Cantidad" value="1">
            </div -->
          </div>
        </div><!-- Card Header -->
        <div class="card-body">
          @livewire("productslist")
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