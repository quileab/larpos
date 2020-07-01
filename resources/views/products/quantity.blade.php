<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h4>Quatities</h4></div>
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
    @if(!isset($whqty->id))
        <form name="qtys" method = "post" action="{{route('whprodquantities.store')}}">
    @else
        <form name="qtys" method = "post" action="{{route('whprodquantities.update',$whqty->id)}}">
        @method('PATCH')
    @endif
        @csrf

        <input type="hidden" id="id" name="id" value="{{ $whqty->id }}">
        <input type="hidden" id="product_id" name="product_id" value="{{ $whqty->product_id }}">
        <input type="hidden" id="warehouse_id" name="warehouse_id" value="{{ $whqty->warehouse_id }}">

            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Cantidad"
                            value="{{$whqty->quantity}}">
                    </div>
                    <div class="col-4">
                        <label for="qtymin">Min Quantity</label>
                        <input type="text" class="form-control" id="qtymin" name="qtymin" placeholder="Cantidad Mínima"
                            value="{{$whqty->qtymin}}">
                    </div>
                    <div class="col-4">
                        <label for="qtymax">Max Quantity</label>
                        <input type="text" class="form-control" id="qtymax" name="qtymax" placeholder="Cantidad Máxima"
                            value="{{$whqty->qtymax}}">
                    </div>
                </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> </button>
                    </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</div>