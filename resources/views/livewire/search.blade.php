<div class="relative">
    <input type="text" wire:model="query" placeholder="Search for products..." class="w-full p-2 border rounded" />

    @if(!empty($query))
    <div class="absolute z-10 w-full bg-white border rounded shadow-lg mt-1">
        @if(!empty($products))
        <ul>
            @foreach($products as $product)
            <li class="p-2 hover:bg-gray-100 cursor-pointer" wire:click="selectProduct({{ $product->id }})">
                {{ $product->name }}
            </li>
            @endforeach
        </ul>
        @else
        <div class="p-2 text-gray-600">No products found...</div>
        @endif
    </div>
    @endif
</div>
