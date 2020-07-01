@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h4>Products</h4></div>
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
<!-- - - - - - Check Type of Form Store/Update - - - - - -->
    @if(!isset($data->id))
        <form name="prod" method = "post" action="{{route('products.store')}}">
    @else
        <form name="prod" method = "post" action="{{route('products.update',$data->id)}}">
        @method('PATCH')
    @endif
        @csrf

            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="fullname">Barcode</label>
                        <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Código de barras"
                            value="{{$data->barcode}}">
                    </div>
                    <div class="col-8">
                        <label for="idnumber">Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Marca"
                            value="{{$data->brand}}">
                    </div>
                </div>
                <div class="row">
                <div class="col-4">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Type"
                        value="{{$data->type}}">
                </div>
                <div class="col-8">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Descripción"
                        value="{{$data->description}}">
                </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="unit_id">Unit</label>
                        <select class="form-control" id="unit_id" name="unit_id" value="{{$data->unit_id}}">
                        @foreach ($units as $item)
                            <option value="{{ $item->id }}"
                                @if ($data->unit_id == $item->id)
                                    selected="selected"
                                @endif
                            >{{ $item->unit }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="price"
                            step=".01"
                            value="{{$data->price}}">
                    </div>
                    <div class="col">
                        <label for="tax">IVA</label>
                        <input type="number" class="form-control" id="tax" name="tax" placeholder="IVA"
                            step=".01"
                            value="{{$data->tax}}">
                    </div>
                </div>
                <div class="row">
                <div class="col">
                    <label for="profit1">Ganancia 1</label>
                    <input type="number" class="form-control" id="profit1" name="profit1" placeholder="% Ganancia 1"
                        step=".01"
                        value="{{$data->profit1}}">
                </div>
                <div class="col">
                    <label for="profit2">Ganancia 2</label>
                    <input type="number" class="form-control" id="profit2" name="profit2" placeholder="% Ganancia 1"
                        step=".01"
                        value="{{$data->profit2}}">
                </div>
                </div>
                <div class="row">
                <div class="col">
                    <label for="salesprice1">Precio Venta 1</label>
                    <input type="number" class="form-control" id="salesprice1" name="salesprice1" placeholder="Precio de Vetna 1"
                        step=".01"
                        value="{{$data->salesprice1}}">
                </div>
                <div class="col pt-4">
                    <button class="form-control btn btn-primary" 
                        onclick="$('#salesprice1').val(
                            parseFloat(document.prod.price.value*(1+(document.prod.tax.value/100))*(1+(document.prod.profit1.value/100))).toFixed(2)
                        );
                        $('#salesprice2').val(
                            parseFloat(document.prod.price.value*(1+(document.prod.tax.value/100))*(1+(document.prod.profit2.value/100))).toFixed(2)
                        ); return false;">Calcular</button>
                </div>
                <div class="col">
                    <label for="salesprice2">Precio Venta 2</label>
                    <input type="number" class="form-control" id="salesprice2" name="salesprice2" placeholder="Precio de Vetna 2"
                        step=".01"
                        value="{{$data->salesprice2}}">
                </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="discount">Discount</label>
                        <input type="number" class="form-control" id="discount" name="discount" placeholder="Descuento"
                            step=".01"
                            value="{{$data->discount}}">
                    </div>
                </div>
            </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> </button>
                    </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('products.quantity')

@endsection