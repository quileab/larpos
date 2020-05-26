@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Warehouses</div>

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
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($warehouses as $warehouse)
<tr>
    <th scope="row">{{ $warehouse->id }}</th>
    <td>{{ $warehouse->name }}</td>
    <td>{{ $warehouse->description }}</td>
    <td>
        <a class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
        <a class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
        <a class="btn btn-sm btn-success"
            href="wareselect/{{ $warehouse->id }}"
        ><i class="fas fa-check-circle"></i></a>
    </td>
</tr>
@endforeach
  </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
