@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4"><h4>Warehouses</h4></div>
                        <div class="col-6">search:</div>
                        <div class="col-2">
                            <a href="{{route('warehouses.create')}}"
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
        <div class="btn-group" role="group" aria-label="Actions">
        <a class="btn btn-sm btn-primary"
            href="warehouses/{{ $warehouse->id }}/edit"
        ><i class="fas fa-edit"></i></a>

        <a class="btn btn-sm btn-success"
            href="wareselect/{{ $warehouse->id }}"
        ><i class="fas fa-check-circle"></i></a>
        <a href="{{ route('warehouses.destroy', [$warehouse->id])}}" title="{{ $warehouse->name }}"
            class="btn btn-sm btn-danger btn-delete"
            csrf-token='{{csrf_field()}}'
            ><i class="fas fa-trash"></i>
        </a>

        <!--form method="POST" action="{{ route('warehouses.destroy', [$warehouse->id]) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
        </form-->
    </div>
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
