@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4"><h4>Clients</h4></div>
                        <div class="col-6">

                        <form action="{{ route('clients.search') }}" method="get" spellcheck="false">
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
                            <a href="{{route('clients.create')}}"
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
      <th scope="col">Address</th>
      <th scope="col">Phone/s</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($data as $item)
<tr>
    <th scope="row">{{ $item->id }}</th>
    <td>{{ $item->fullname }}</td>
    <td>{{ $item->address }} <small>({{ $item->city }})</small></td>
    <td>{{ $item->phones }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="Actions">
        <a class="btn btn-sm btn-primary"
            href="clients/{{ $item->id }}/edit">
            <i class="fas fa-edit"></i></a>
        <a href="{{ route('clients.destroy', [$item->id])}}" title="{{ $item->fullname }}"
            class="btn btn-sm btn-danger btn-delete"
            csrf-token='{{csrf_field()}}'
            ><i class="fas fa-trash"></i>
        </a>

        <a class="btn btn-sm btn-success"
            href="{{ route('clients.select', [$item->id])}}">
            <i class="fas fa-check-circle"></i></a>
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
