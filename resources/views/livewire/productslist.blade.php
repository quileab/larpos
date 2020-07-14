<!-- VENTANA MODAL de búsqueda -->
<div wire:ignore.self id="ProductsModal" class="modal shadow" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Productos</h5>
                <button type="button" class="close btn-danger btn-sm" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- BUSCAR - Cantidad - [buscar] -->
                <div class="form-inline row">
                    <div class="col">
                        <input class="form-control" type="search" name="descripcion" wire:model="buscar" wire:keydown.enter="wiresearch">
                        <button class="form-control btn btn-primary col-xs-2" wire:click="wiresearch">
                            &nbsp;<i class="fas fa-search" aria-hidden="true"></i>&nbsp;
                        </button>
                        <input class="form-control" type="number" min="1" name="cantidad" wire:model="quantity" wire:keydown.enter="wiresearch">
                    </div>
                    <!-- // -->
                </div>

                @if ($products)
                <table class="">
                    <thead>
                        <tr>
                            <th scope="col">Description</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="small text-break">
                            <button class="btn btn-block btn-primary btn-sm" 
                                        wire:click="addToCart({{ $product->id }},{{ $quantity }},{{ $product->price }})">
                                {{ $product->brand }}, {{ $product->description }}
                            </button>
                            </td>
                            <td>
                                <div class="input-group">
                                    <select name="price" class="custom-select custom-select-sm">
                                        <option value="{{ $product->salesprice1 }}">{{ $product->salesprice1 }}</option>
                                        <option value="{{ $product->salesprice2 }}">{{ $product->salesprice2 }}</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h4 class="text-center">Listo para buscar?</h4>
                @endif


            </div> <!-- end modal-body -->
        </div>

    </div>
</div>