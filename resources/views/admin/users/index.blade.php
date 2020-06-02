@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4"><h4>Users</h4></div>
                        <div class="col-6">search:</div>
                        <div class="col-2">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-success btn-sm btn-block"><i class="fas fa-plus"></i></a>
                        @endif

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Actions</th>
                            </tr></thead>
                            <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
                        <td>
                        @can('manage-users')
                        <div class="btn-group" role="group" aria-label="Actions">
                        <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{route('admin.users.destroy',$user)}}" method="POST" class="float-left">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        @endcan
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
