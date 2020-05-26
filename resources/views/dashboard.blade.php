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
                    {{{ Session::get('WH') }}}
                @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
