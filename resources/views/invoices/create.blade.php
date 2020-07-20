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
            <div class="col-5">
              @livewire("barcodeto-cart")
            </div>
            <!---- OPEN Advanced Search MODAL ---->
            <div class="col-4">
              <button class="btn btn-primary" data-toggle="modal" data-target="#ProductsModal">
                &nbsp;Producto&nbsp;
                <i class="fas fa-search" aria-hidden="true"></i>&nbsp;
              </button>
            </div>
            <!---- Tipo y Punto de Comprobante ---->
            <div class="col-3">
              <div class="input-group">
                <select title="Comprobante" class="form-control selectpicker">
                  <option>X</option>
                  <option>A</option>
                  <option>B</option>
                  <option>C</option>
                </select>
                <input class="form-control" type="number" name="quantity" id="srchquantity" min="1" value="1" wire:model="quantity" wire:keydown.enter="barcodesearch">
              </div>
            </div>
          </div>
        </div><!-- /Card Header -->
        <div class="card-body">
          @livewire("productslist")
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
@endsection