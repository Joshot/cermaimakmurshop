<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 bg-gray-50 font-poppins dark:bg-gray-800 rounded-lg shadow-md">
        <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
            <div class="flex flex-wrap mb-12 -mx-3">
                <div class="w-full pr-2 lg:w-1/4 lg:block">
                    <!-- Categories Section -->
                    <div class="p-6 mb-6 bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-xl shadow-xl transition duration-300">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Categories</h2>
                        <div class="w-20 pb-2 mb-6 border-b-4 border-rose-600"></div>
                        <ul class="space-y-4">
                            @foreach ($categories as $category)
                            <li class="flex items-center space-x-2 hover:bg-rose-50 dark:hover:bg-gray-700 p-2 rounded-lg transition duration-200">
                                <input type="checkbox" wire:model.live="selected_categories" id="{{ $category->slug }}" value="{{ $category->id }}" class="w-5 h-5 text-rose-600 rounded focus:ring-2 focus:ring-rose-500">
                                <label for="{{ $category->slug }}" class="text-lg font-medium text-gray-700 dark:text-gray-300 cursor-pointer">{{ $category->name }}</label>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Brand Section -->
                    <div class="p-6 mb-6 bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-xl shadow-xl transition duration-300">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Brand</h2>
                        <div class="w-20 pb-2 mb-6 border-b-4 border-rose-600"></div>
                        <ul class="space-y-4">
                            @foreach ($brands as $brand)
                            <li class="flex items-center space-x-2 hover:bg-rose-50 dark:hover:bg-gray-700 p-2 rounded-lg transition duration-200">
                                <input type="checkbox" wire:model.live="selected_brands" id="{{ $brand->slug }}" value="{{ $brand->id }}" class="w-5 h-5 text-rose-600 rounded focus:ring-2 focus:ring-rose-500">
                                <label for="{{ $brand->slug }}" class="text-lg font-medium text-gray-700 dark:text-gray-300 cursor-pointer">{{ $brand->name }}</label>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Product Status Section -->
                    <div class="p-6 mb-6 bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-xl shadow-xl transition duration-300">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Product Status</h2>
                        <div class="w-20 pb-2 mb-6 border-b-4 border-rose-600"></div>
                        <ul class="space-y-4">
                            <li class="flex items-center space-x-2 hover:bg-rose-50 dark:hover:bg-gray-700 p-2 rounded-lg transition duration-200">
                                <input type="checkbox" id="featured" wire:model.live="featured" value="1" class="w-5 h-5 text-rose-600 rounded focus:ring-2 focus:ring-rose-500">
                                <label for="featured" class="text-lg font-medium text-gray-700 dark:text-gray-300 cursor-pointer">Featured Products</label>
                            </li>
                            <li class="flex items-center space-x-2 hover:bg-rose-50 dark:hover:bg-gray-700 p-2 rounded-lg transition duration-200">
                                <input type="checkbox" id="on_sale" wire:model.live="on_sale" value="1" class="w-5 h-5 text-rose-600 rounded focus:ring-2 focus:ring-rose-500">
                                <label for="on_sale" class="text-lg font-medium text-gray-700 dark:text-gray-300 cursor-pointer">On Sale</label>
                            </li>
                        </ul>
                    </div>

                    <!-- Price Range Section -->
                    <div class="p-6 bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-xl shadow-xl transition duration-300">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Price</h2>
                        <div class="w-20 pb-2 mb-6 border-b-4 border-rose-600"></div>
                        <div class="space-y-2">
                            <span class="text-lg font-semibold text-gray-700 dark:text-gray-300">{{ Number::currency($price_range) }}</span>
                            <input type="number" wire:model.live="price_range"
                                   class="w-24 p-2 text-center border rounded-md focus:ring-2 focus:ring-rose-500"
                                   min="0" max="500" step="1">
                            <input type="range" wire:model.live="price_range"
                                   class="w-full h-2 bg-rose-100 rounded-lg cursor-pointer focus:outline-none accent-rose-600"
                                   max="500" step="1">
                            <div class="flex justify-between">
                                <span class="text-lg font-bold text-blue-500">{{ Number::currency(0) }}</span>
                                <span class="text-lg font-bold text-blue-500">{{ Number::currency(500) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full px-3 lg:w-3/4">

                    <div class="px-3 mb-6">
                        <div class="flex items-center justify-between p-4 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-800 rounded-xl shadow-lg">
                            <div class="flex items-center ml-auto"> <!-- Tambahkan ml-auto di sini -->
                                <label for="sort" class="mr-4 text-lg font-semibold text-gray-700 dark:text-gray-300">Sort By:</label>
                                <div class="relative">
                                    <select id="sort" wire:model.live="sort" class="block w-52 p-3 text-base bg-white border border-gray-300 rounded-lg shadow-sm cursor-pointer appearance-none dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 focus:ring-rose-500 focus:border-rose-500">
                                        <option value="latest">🔄 Sort by Latest</option>
                                        <option value="price">💲 Sort by Price</option>
                                    </select>
                                    <span class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4M16 15l-4 4-4-4" />
                    </svg>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex flex-wrap items-center ">
                        @foreach ($products as $product)
                        <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3 lg:w-1/4">
                            <div class="relative border border-gray-300 dark:border-gray-700 rounded-lg shadow-md transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                                <div class="relative bg-gray-200 overflow-hidden rounded-t-lg">
                                    <a href="/products/{{ $product->slug }}" class="block">
                                        <img src="{{ url('storage', $product->images[0]) }}" alt="{{ $product->name }}" class="object-cover w-full h-56 transition-transform duration-300">
                                    </a>
                                </div>
                                <div class="p-4">
                                    <!-- Product title with ellipsis -->
                                    <h3 class="text-lg font-semibold dark:text-gray-400 whitespace-nowrap overflow-hidden text-ellipsis" title="{{ $product->name }}">
                                        <a href="/products/{{ $product->slug }}" class="hover:font-bold" title="{{ $product->name }}">{{ Str::limit($product->name, 12, '...') }}</a>
                                    </h3>
                                    <p class="text-xl font-bold text-blue-600 dark:text-gray-200">
                                        {{ Number::currency($product->price) }}
                                    </p>
                                    <!-- Add to Cart button -->
                                    <button wire:click.prevent="addToCart({{ $product->id }})" class="absolute bottom-4 right-4 flex items-center justify-center p-2 text-white bg-teal-500 rounded-full hover:bg-teal-600 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-5 h-5 bi bi-cart3" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
