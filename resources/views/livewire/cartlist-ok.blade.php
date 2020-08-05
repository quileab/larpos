<div>
    <div class="row">
        <div class="col-6">
            <div class="btn-group" role="group" aria-label="Acciones">
                @if(session('cart'))
                <div class="input-group">
                    <a href="#" class="href" title="Borrar Items" wire:click="cleancart()">
                        <button type="button" class="btn btn-warning btn-sm"><i class="fas fa-trash"></i></button></a>
                    @endif
                    <a href="#" class="href">
                        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></button></a>
                    @if(session('cart'))
                    <a href="{{route('invoices.savePrintOrder')}}" class="href" title="Imprimir Comprobante">
                        <button type="button" class="btn btn-success">
                            <i class="fas fa-print px-3"></i>
                        </button></a>

                    <select id="larposLetter" title="Comprobante" class="form-control selectpicker" name="invoiceLetter">
                        <option>X</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                    </select>
                    <input id="larposPoint" class="form-control" type="number" name="invoicePoint" min="1">
                    <button class="btn btn-primary btn-sm" onclick="setDefaultTypePoint();"><i class="fas fa-thumbtack"></i></button>
                </div>
                @endif
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
                <th scope="col" class="text-center">Cant.</th>
                <th scope="col" class="text-center">Precio</th>
                <th scope="col" class="text-center"><small><i class="fas fa-info text-warning"></i></small></th>
            </tr>
        </thead>
        <tbody>
            @if(session('cart'))
            @foreach(session('cart') as $key => $cartitem)
            <tr>
                <td><small class='text-muted'>{{ $key }}</small> <small>{{ $cartitem['brand'] }}, {{ $cartitem['description'] }} ({{ $cartitem['type'] }})</small></td>
                <td class="text-right">{{ $cartitem['quantity'] }}</td>
                <td class="text-right">@qbmoney($cartitem['price'])</td>
                <td>
                    <button class="btn btn-primary-outline btn-sm" wire:click="removefromcart({{ $key }})">
                        <i class="fas fa-times text-danger"></i>
                    </button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
<script>
    const tipo = localStorage.getItem('qbtipo');
    const punto = localStorage.getItem('qbpunto');
    tipo != null ? document.getElementById("larposLetter").selectedIndex = tipo : 0;
    punto != null ? document.getElementById("larposPoint").value = punto : 1;

    function setDefaultTypePoint() {
        localStorage.setItem('qbtipo',
            document.getElementById("larposLetter").selectedIndex);
        localStorage.setItem('qbpunto',
            document.getElementById("larposPoint").value);
        return false;
    }
</script>