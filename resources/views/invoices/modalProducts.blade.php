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


        <table class="table">
          <thead>
            <tr>
              <th scope="col">Description</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td>{{ $product->brand }}, {{ $product->description }}</td>
              <td>
                <form name="item{{ $product->id }}" method="post" action="{{route('invoices.addtocart')}}">
                  @csrf
                  <div class="input-group">
                    <select name="price" class="custom-select custom-select-sm">
                      <option value="{{ $product->salesprice1 }}">{{ $product->salesprice1 }}</option>
                      <option value="{{ $product->salesprice2 }}">{{ $product->salesprice2 }}</option>
                    </select>
                    <input type="hidden" name="quantity" id="quantity{{ $product->id }}" value="1" size="2" width=20px>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button class="btn btn-success btn-sm" type="submit" onclick="
                                                            $('#quantity{{ $product->id }}').val(parseFloat(document.getElementById('qty').value));">
                      <i class="fas fa-cart-plus"></i></button>
                    <!-- input type="submit" value="Agregar" onclick="$('#quantity{{ $product->id }}').val(parseFloat(document.getElementById('qty').value));"-->
                  </div>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        {{ $products->links() }}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
