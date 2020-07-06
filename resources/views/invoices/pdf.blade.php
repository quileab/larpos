@extends('layouts.invoicePrint')

@section('content')
@php
$importe=0;
$total=0;
@endphp
<div class="container">
    <div class="row">
        <div class="col-5">
            <!-- Client Data -->
            <strong>Cliente: </strong>{{ $invoice->client_Name }}<br />
            <strong>Dirección: </strong>{{ $invoice->client_address }} ({{ $invoice->client_City }})<br />
            <strong>Teléfono: </strong>{{ $invoice->client_phone }}
        </div>
        <!-- Document Type letter -->
        <div class="col-1 bg-g1 txt-ctr"><br />
            <h1>{{ $invoice->letter }}
                <h1>
        </div>
        <!-- Document Data -->
        <div class="col-3">
            <h4>{{ str_pad($invoice->serial,4,'0', STR_PAD_LEFT) }} - {{ str_pad($invoice->number,8,'0', STR_PAD_LEFT) }}</h4>
            {{ $invoice->seller }}
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Cant.</th>
                <th scope="col">P/U</th>
                <th scope="col">Importe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoicesitems as $item)
            @php
            $importe=$item->quantity*$item->price;
            $total+=$importe;
            @endphp

            <tr>
                <td><small>{{ $item->products_id }}</small></td>
                <td class="txt-lft"><small>{{ $item->brand }}, {{ $item->description }} {{ $item->type }}</small></td>
                <td class="txt-rgt">{{ $item->quantity }}</td>
                <td class="txt-rgt">{{ $item->price }}</td>
                <td class="txt-rgt">@qbmoney($importe ?? '')</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="width:100%; border:2px solid gray; padding:5px; text-align:right;">
        <small>TOTAL:</small> <strong>@qbmoney($total ?? '')</strong>
    </div>
</div>
@endsection