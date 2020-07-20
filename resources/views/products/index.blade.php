@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4"><h4>Products</h4></div>
                        <div class="col-6">

                        <form action="{{ route('products.search') }}" method="get" spellcheck="false">
                        <div class="input-group md-form form-sm form-2">
                            <input class="form-control" type="search" name="search" placeholder="Buscar" aria-label="Search">
                        <div class="input-group-append">
                        <button class="input-group-text btn btn-success" type="submit">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                        </div>
                        </div>
                        </form>

                        </div>
                        <div class="col-2">
                            <a href="{{route('products.create')}}"
                            class="btn btn-success btn-sm btn-block"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>

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
            <a class="btn btn-sm btn-primary"
                href="{{ route('products.edit', [$product->id])}}">
                <i class="fas fa-edit"></i></a>
            <a href="{{ route('products.destroy', [$product->id])}}" title="{{ $product->brand }}, {{ $product->type }}"
                class="btn btn-sm btn-danger btn-delete"
                csrf-token='{{csrf_field()}}'
                ><i class="fas fa-trash"></i>
            </a>
            <a class="btn btn-sm btn-success"
                href="products.select/{{ $product->id }}">
                <i class="fas fa-check-circle"></i>
            </a>
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
