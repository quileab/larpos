@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h4>Warehouse</h4></div>
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
<!-- - - - - - - - - - - - -->
    @if(!isset($data->id))
        <form method = "post" action="{{route('warehouses.store')}}">
    @else
        <form method = "post" action="{{route('warehouses.update',$data->id)}}">
        @method('PATCH')
    @endif
        @csrf
                <div class="form-group">
                <div class="row">
                    <div class="col-10">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" placeholder="Nombre" name="name"
                        value="{{$data->name}}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" disabled name="id" value="{{{ $data->id }}}">
                    </div>

                </div>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Descripción"
                        value="{{$data->description}}">
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>
                <div class="float-right">
                <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> </button>
                </div>

            </form>

<!-- - - - - - - - - - - - - -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
