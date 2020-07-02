@extends('layouts.app')

@section('content')

@php
$total=0;
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row pb-2 text-light">
                        <!-- Client Data -->
                        <div class="col">
                            <h5>
                                <small>{{ unserialize(Session::get('invoice'))['client_ID'] }}) </small>
                                {{ unserialize(Session::get('invoice'))['client_Name'] }}
                                <small> |
                                    {{ unserialize(Session::get('invoice'))['client_ID_type'] }}
                                    {{ unserialize(Session::get('invoice'))['client_ID_number'] }}
                                </small>
                            </h5>
                        </div>
                        <!-- Order Data & Cart Options -->
                        <div class="col">
                            Orden:
                            {{ unserialize(Session::get('invoice'))['letter'] }}
                            {{ unserialize(Session::get('invoice'))['serial'] }}-
                            {{ unserialize(Session::get('invoice'))['number'] }}
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('invoices.cleancart')}}" class="href">
                                    <button type="button" class="btn btn-warning"><i class="fas fa-trash"></i></button></a>
                                <a href="{{route('invoices.printpdf')}}" class="href">
                                    <button type="button" class="btn btn-primary"><i class="fas fa-info-circle"></i></button></a>
                                <a href="{{route('invoices.savePrintOrder')}}" class="href">
                                    <button type="button" class="btn btn-success"><i class="fas fa-print"></i></button></a>
                            </div>
                        </div>
                        <!-- Cart Total -->
                        <div class="col text-right">
                            @if(session('cart'))
                            @foreach(session('cart') as $key => $cartitem)

                            @php
                            $total+= $cartitem['price'] * $cartitem['quantity'];
                            @endphp
                            @endforeach
                            @endif
                            <h2>@qbmoney($total ?? '')</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('invoices.productssearch') }}" method="get" spellcheck="false">
                                <div class="input-group md-form form-sm form-2">
                                    <input class="form-control form-control-sm" type="search" name="search" placeholder="Buscar" aria-label="Search">
                                    <div class="input-group-append form-control-sm">
                                        <button class="input-group-text btn btn-success" type="submit">
                                            <i class="fas fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-2">
                            <input class="form-control form-control-sm" type="number" name="qty" id="qty" placeholder="Cantidad" aria-label="Cantidad" value="1">
                        </div>
                    </div>
                </div><!-- Card Header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <!-- List of searched products -->
                            @include('invoices.inlineProducts')
                            <!-- end -->
                        </div>
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cant.</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col"><i class="fas fa-info text-warning"></i></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(session('cart'))
                                    @foreach(session('cart') as $key => $cartitem)
                                    <tr>
                                        <td><small>{{ $key }}</small></td>
                                        <td><small>{{ $cartitem['brand'] }}, {{ $cartitem['description'] }} ({{ $cartitem['type'] }})</small></td>
                                        <td class="text-right">{{ $cartitem['quantity'] }}</td>
                                        <td class="text-right">{{ $cartitem['price'] }}</td>
                                        <td>
                                            <a href="{{ route('invoices.removefromcart', $key) }}">
                                                <i class="fas fa-times text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection