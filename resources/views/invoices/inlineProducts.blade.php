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
