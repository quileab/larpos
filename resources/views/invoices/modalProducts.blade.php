<div id="ProductsModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div>
          <div class="input-group">
            <input class="form-control" type="search" name="descripcion" wire:model="buscar">
            <input class="form-control" type="number" min="1" name="cantidad" wire:model="quantity">
            <div class="input-group-append">
              <button class="btn btn-primary" wire:click="wiresearch"><i class="fas fa-cart-plus"></i></button>
            </div>
          </div>

          @if ($products)
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Description</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td class="small text-break">{{ $product->brand }}, {{ $product->description }}</td>
                <td>
                  <div class="input-group">
                    <select name="price" class="custom-select custom-select-sm">
                      <option value="{{ $product->salesprice1 }}">{{ $product->salesprice1 }}</option>
                      <option value="{{ $product->salesprice2 }}">{{ $product->salesprice2 }}</option>
                    </select>
                    <button class="btn btn-success btn-sm" wire:click="addToCart({{ $product->id }},{{ $quantity }},{{ $product->price }})">
                      <i class="fas fa-cart-plus"></i>
                    </button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @endif
        </div>

      </div> <!-- end modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>