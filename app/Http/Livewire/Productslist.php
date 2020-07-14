<?php

namespace App\Http\Livewire;

use App\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Productslist extends Component
{
    public $products;
    public $total;
    public $quantity;
    public $buscar;

    public function mount()
    {
        $this->buscar = '';
        $this->total = 0;
        $this->quantity = 1;
        //$this->wiresearch(); // funciona y llama a la función OK
        $this->products = [];
    }

    public function render()
    {
        $products = $this->products;
        return view('livewire.productslist', compact('products'));
    }

    public function wiresearch()
    {
        $search = $this->buscar;
        $cadena = preg_replace('/\s\s+/', ' ', $search);
        $cadena = preg_replace("@[^A-Za-z0-9\w\ ]@", "", $cadena);
        $cadenas = explode(' ', $cadena);

        $this->products = Product::where(function ($query) use ($cadenas) {
            foreach ($cadenas as $cadena) {
                $query->where(DB::raw('concat(brand," ",type," ",description)'), 'like', '%' . $cadena . '%');
            }
        })->take(40)->get();
    }

    public function addToCart($prodID, $quantity, $price)
    {
        $product = Product::find($prodID);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$prodID])) {
            $cart[$prodID]['quantity'] += $quantity;
        } else {
            // if item not exist in cart then add to cart with quantity
            $cart[$prodID] = [
                "brand" => $product->brand,
                "type" => $product->type,
                "description" => $product->description,
                "quantity" => $quantity,
                "price" => $price,
            ];
        }
        session()->put('cart', $cart);
        $this->quantity=1;
        $this->emit('cartItemAdded');
    }
}