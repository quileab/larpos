        <table class="table">
          <thead>
            <tr>
              <th scope="col">Description</th>
              <th scope="col"><input class="form-control form-control-sm" type="number" name="qty" id="qty" placeholder="Cantidad" aria-label="Cantidad" value="1"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td class="small text-break">{{ $product->brand }}, {{ $product->description }}</td>
              <td>
                <form name="item{{ $product->id }}" method="post" action="{{route('invoices.addtocart')}}">
                  @csrf
                  <div class="input-group">
                    <select name="price" class="custom-select custom-select-sm">
                      <option value="{{ $product->salesprice1 }}">{{ $product->salesprice1 }}</option>
                      <option value="{{ $product->salesprice2 }}">{{ $product->salesprice2 }}</option>
                    </select>
                    <input type="hidden" name="quantity" id="quantity{{ $product->id }}" value="1">
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
