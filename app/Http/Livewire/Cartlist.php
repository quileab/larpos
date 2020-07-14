<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;

class Cartlist extends Component
{
    public $total;

    protected function getListeners()
    {
        //return ['cartItemAdded' => 'render'];
        return ['cartItemAdded' => '$refresh'];
    }

    public function mount()
    {
        $this->total = 0;
    }

    public function render()
    {
        $total = 0;
        $cart = session()->get('cart');
        if ($cart) {
            foreach ($cart as $item) {
                $total += $item['quantity'] * $item['price'];
            }
        }
        $this->total = $total;
        return view('livewire.cartlist');
    }

    public function removefromcart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    }

    public function cleancart()
    {
        if (session()->get('cart')) {
            session()->forget('cart');
        }
    }
}
