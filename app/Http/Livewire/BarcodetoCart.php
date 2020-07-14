<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;

class BarcodetoCart extends Component
{
    public $quantity;
    public $buscar;

    public function mount()
    {
        $this->buscar = '';
        $this->quantity = 1;
    }

    public function render()
    {
        return view('livewire.barcodeto-cart');
    }

    public function barcodesearch()
    {
        $search = $this->buscar;
        $quantity = $this->quantity;
        $product = Product::where('barcode', $search)->get();

        //dd($search,$quantity,$product[0]->id);
        if (!$product) {
            $this->emit('sweet-alert', 'Producto NO emcontrado!');
        } else {
            $product=$product[0];
            $prodID = $product->id;
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
                    "price" => $product->salesprice1
                ];
            }
            session()->put('cart', $cart);
            $this->buscar='';
            $this->quantity = 1;
            $this->emit('cartItemAdded');
        }
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
        $this->buscar='';
        $this->quantity = 1;
        $this->emit('cartItemAdded');
    }
}
