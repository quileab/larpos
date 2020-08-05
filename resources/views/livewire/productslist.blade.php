<div wire:ignore.self id="ProductsModal" class="modal" role="dialog" tabindex="-1">
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
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Descipción</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="small text-break">
                                <a href="#" wire:click="addToCart({{ $product->id }},{{ $quantity }},{{ $product->price }})">
                                    {{ $product->brand }}, {{ $product->description }}
                                </a>
                            </td>
                            <td>
                                <select name="price" class="bg-light text-dark" style="width:100%;">
                                    <option value="{{ $product->salesprice1 }}">{{ $product->salesprice1 }}</option>
                                    <option value="{{ $product->salesprice2 }}">{{ $product->salesprice2 }}</option>
                                </select>
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