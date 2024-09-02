<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Livewire;


class Search extends Component {

    public $query = '';
    public $products = [];

    public function updatedQuery() {
        if (strlen($this->query) > 2) {
            $this->products = Product::where('name', 'like', '%' . $this->query . '%')
                ->orWhere('description', 'like', '%' . $this->query . '%')
                ->take(5)
                ->get();
        } else {
            $this->products = [];
        }
    }

    public function selectProduct($slug) {
        return redirect()->route('product.show', $slug);
    }

    public function render() {
        return view('livewire.search');
    }

}
