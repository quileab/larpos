@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fas fa-user-edit pr-1"></i> {{$user->name}}</div>
                <div class="card-body">
                    <form action="{{route('admin.users.update',$user)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <!-- Email -->
                        <div class="form-group row">
                            <div class="col-5 text-right">
                                <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                            </div>
                            <div class="col-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Nombre -->
                        <div class="form-group row">
                            <label for="name" class="col-5 col-form-label text-right">Nombre</label>

                            <div class="col-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Roles -->
                        <div class="form-group row">
                            <label for="roles" class="col-5 col-form-label text-right">Roles</label>
                            <div class="col-md-7">
                                @foreach ($roles as $role)
                                <div class="form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}" @if ($user->roles->pluck('id')->contains($role->id)) checked
                                    @endif>
                                    <label>{{$role->name}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Warehouse -->
                        <div class="form-group row">
                            <label for="warehouses" class="col-5 col-form-label text-right">Depósito asignado</label>
                            <div class="col-md-7">
                                <select class="form-control" id="warehouse_id" name="warehouse_id" value="{{$user->warehouse_id}}">
                                    @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}" {{ $user->warehouse_id == $warehouse->id ? "selected" : "" }}>
                                        {{$warehouse->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Submit button -->
                        <div class="row text-right mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save px-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection