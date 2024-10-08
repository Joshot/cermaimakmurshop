<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;


#[Title('Products - Cermaimakmur Shop')]

class ProductsPage extends Component {

    use LivewireAlert;
    use WithPagination;

    #[Url]
    public $selected_categories = [];

    #[Url]
    public $selected_brands = [];

    #[Url]
    public $featured;

    #[Url]
    public $on_sale;

    #[Url]
    public $price_range = 250;

    #[Url]
    public $sort = 'suggested';

    #[Url]
    public $searchQuery = ''; // Add search query property

    //Add To Cart
    public function addToCart($product_id) {
        $total_count = CartManagement::addItemToCart($product_id);
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);
        $this->alert('success', 'Product added to the cart!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render() {
        $productQuery = Product::query()->where('is_active', 1);

        if (!empty($this->searchQuery)) {
            $productQuery->where('name', 'like', '%' . $this->searchQuery . '%');
        }
        if(!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories);
        }
        if(!empty($this->selected_brands)) {
            $productQuery->whereIn('brand_id', $this->selected_brands);
        }
        if($this->featured) {
            $productQuery->where('is_featured', 1);
        }
        if($this->on_sale) {
            $productQuery->where('on_sale', 1);
        }
        if($this->price_range) {
            $productQuery->whereBetween('price', [0, $this->price_range]);
        }

        // Handling sort
        if ($this->sort == 'suggested') {
            $productQuery->inRandomOrder(); // Tambahkan sorting random
        } elseif ($this->sort == 'price') {
            $productQuery->orderBy('price');
        } elseif ($this->sort == 'latest') {
            $productQuery->latest();
        }

        return view('livewire.products-page', [
            'products' => $productQuery->paginate(9),
            'brands' => Brand::where('is_active', 1)->get(['id', 'name', 'slug']),
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug']),
        ]);

    }
}
