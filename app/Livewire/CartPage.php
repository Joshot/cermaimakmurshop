<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Your Cart - Cermaimakmur Shop')]

class CartPage extends Component {
    public $cart_items = [];
    public $grand_total;
    public $editingQty = null;

    public function mount() {
        $this->cart_items = CartManagement::getCartItemsFromCookie();
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }

    public function removeItem($product_id) {
        $this->cart_items = CartManagement::removeCartItem($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);
    }

    public function increaseQty($product_id) {
        $this->cart_items = CartManagement::incrementQuantityToCartItem($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }

    public function decreaseQty($product_id) {
        $this->cart_items = CartManagement::decrementQuantityToCartItem($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }

    public function editQty($product_id) {
        $this->editingQty = $product_id;
    }

    public function saveQty($product_id) {
        $quantity = floatval($this->cart_items[$product_id]['quantity']);

        // If the input is empty or less than 1, set it to the minimum value of 1
        if ($quantity < 1 || $quantity == null) {
            $quantity = 1;
        }

        $this->cart_items[$product_id]['quantity'] = $quantity;
        $this->cart_items = CartManagement::addItemToCartWithQty($product_id, $quantity);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
        $this->editingQty = null;
    }

    public function render() {
        return view('livewire.cart-page');
    }

}
