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
            <!---- BARCODE Search ---->
            <div class="col-9">
              @livewire("barcodeto-cart")
            </div>
            <!---- OPEN Advanced Search MODAL ---->
            <div class="col-3">
              <button class="btn btn-primary" data-toggle="modal" data-target="#ProductsModal">
                Productos<i class="fas fa-search px-2" aria-hidden="true"></i>&nbsp;
              </button>
            </div>
          </div>
        </div><!-- /Card Header -->
        <div class="card-body">
          @livewire("productslist")
          <!--div class="col" -->

            <!-- List of searched products -->
            @livewire("cartlist")
            <!-- end -->

          <!--/div -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection