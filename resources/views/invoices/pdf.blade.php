@extends('layouts.invoicePrint')

@section('content')
@php
$importe=0;
$total=0;
@endphp
<div class="container">
    {{ $invoice->letter }}
    {{ $invoice->serial }}
    {{ $invoice->number }}
    {{ $invoice->client_Name }}

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
                <th>{{ $item->id }}</th>
                <td>{{ $item->brand }}, {{ $item->description }} {{ $item->type }}</td>
                <td class="text-right">{{ $item->quantity }}</td>
                <td class="text-right">{{ $item->price }}</td>
                <td class="text-right">@qbmoney($importe ?? '')</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection