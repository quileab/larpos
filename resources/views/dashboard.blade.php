@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h5>{{ Auth::user()->name }}</h5> assigned to <strong>{{ Auth::user()->warehouse->name }}</strong> Warehouse
                    @if (Session::has('WH'))
                    <p class="text-warning">Overriden by:
                        <small>({{{ Session::get('WH') }}})</small> {{{ Session::get('warehouse') }}}
                        &nbsp;<a class="btn btn-sm btn-warning" href="waredeselect">
                            &nbsp;<i class="fas fa-eye-slash">&nbsp;</i></a>
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection