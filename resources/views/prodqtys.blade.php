@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Warehouses - Products Quantities</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Warehouse</th>
      <th scope="col">Brand-Description</th>
      <th scope="col">Qty's</th>
    </tr>
  </thead>
  <tbody>
@foreach ($prodqtys as $qtys)
<tr>
    <th scope="row">{{ $qtys->id }}</th>
    <td>{{ $qtys->warehouse->name }}</td>
    <td>{{ $qtys->product->brand }} : {{ $qtys->product->description }}</td>
    <td>{{ $qtys->quantity }}</td>
</tr>
@endforeach
    </tbody>
</table>
{{ $prodqtys->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
