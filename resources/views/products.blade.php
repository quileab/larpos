@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Products</div>

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
      <th scope="col">Brand</th>
      <th scope="col">Description</th>
      <th scope="col">Unit</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($products as $product)
<tr>
    <th scope="row">{{ $product->id }}</th>
    <td>{{ $product->brand }}</td>
    <td>{{ $product->description }}</td>
    <td>{{ $product->unit->unit }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="Actions">
        <a class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
        <a class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
        <a class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></a>
        </div>
    </td>
</tr>
@endforeach
    </tbody>
</table>
{{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
