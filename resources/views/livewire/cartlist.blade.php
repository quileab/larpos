<div>
    <div class="row">
        <div class="col">
            <div class="btn-group" role="group" aria-label="Acciones">
                <a href="#" class="href" title="Borrar Items" wire:click="cleancart()">
                    <button type="button" class="btn btn-warning"><i class="fas fa-trash"></i></button></a>
                <a href="#" class="href">
                    <button type="button" class="btn btn-primary"><i class="fas fa-info-circle"></i></button></a>
                <a href="{{route('invoices.savePrintOrder')}}" class="href" title="Imprimir Comprobante">
                    <button type="button" class="btn btn-success"><i class="fas fa-print"></i></button></a>
            </div>
        </div>
        <div class="col text-right">
            <h2>@qbmoney($total ?? '')</h2>
        </div>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
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
                <td><small class='text-muted'>{{ $key }}</small> <small>{{ $cartitem['brand'] }}, {{ $cartitem['description'] }} ({{ $cartitem['type'] }})</small></td>
                <td class="text-right">{{ $cartitem['quantity'] }}</td>
                <td class="text-right">{{ $cartitem['price'] }}</td>
                <td>
                    <button class="btn btn-primary-outline" wire:click="removefromcart({{ $key }})">
                        <i class="fas fa-times text-danger"></i>
                    </button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>