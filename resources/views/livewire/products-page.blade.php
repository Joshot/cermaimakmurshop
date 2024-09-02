<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 bg-gray-50 font-poppins dark:bg-gray-800 rounded-lg">
        <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
            <div class="flex flex-wrap mb-24 -mx-3">
                <div class="w-full pr-2 lg:w-1/4 lg:block">
                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:border-gray-900 rounded-xl dark:bg-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400"> Categories</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <ul>
                            @foreach ($categories as $category)
                            <li class="mb-4" wire:key="{{$category->id}}">
                                <label for="{{ $category->slug }}" class="flex items-center dark:text-gray-400 ">
                                    <input type="checkbox" wire:model.live="selected_categories" id="{{ $category->slug }}" value="{{ $category->id }}" class="w-4 h-4 mr-2">
                                    <span class="text-lg">{{ $category->name }}</span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 rounded-xl dark:border-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400">Brand</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <ul>
                            @foreach ($brands as $brand)
                            <li class="mb-4" wire:key="{{$brand->id}}">
                                <label for="{{ $brand->slug }}" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" wire:model.live="selected_brands" id="{{ $brand->slug }}" value="{{ $brand->id }}" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">{{ $brand->name }}</span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 rounded-xl dark:border-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400">Product Status</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <ul>
                            <li class="mb-4">
                                <label for="featured" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" id="featured" wire:mode.live="featured" value="1" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">Featured Products</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="on_sale" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" id="on_sale" wire:mode.live="on_sale" value="1" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">On Sale</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 rounded-xl dark:border-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400">Price</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <div>
                            <div class="flex items-center mb-2 space-x-2">
                                <span class="font-semibold">
                                    {{ Number::currency($price_range) }}
                                </span>
                            </div>
                            <input type="number" wire:model.live="price_range"
                                   class="w-20 p-1 text-center border border-gray-300 rounded"
                                   min="0" max="500" step="1">
                            <input type="range" wire:model.live="price_range"
                                   class="w-full h-1 mb-4 bg-blue-100 rounded appearance-none cursor-pointer"
                                   max="500" step="1">
                            <div class="flex justify-between ">
                                <span class="inline-block text-lg font-bold text-blue-400 ">
                                    {{ Number::currency(0) }}
                                </span>
                                <span class="inline-block text-lg font-bold text-blue-400 ">
                                    {{ Number::currency(500) }}
                                </span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="w-full px-3 lg:w-3/4">
                    <div class="px-3 mb-4">
                        <div class="items-center justify-between hidden px-3 py-2 bg-gray-100 md:flex dark:bg-gray-900 ">
                            <div class="flex items-center justify-between">
                                <select wire:model.live="sort" class="block w-40 text-base bg-gray-100 cursor-pointer dark:text-gray-400 dark:bg-gray-900">
                                    <option value="latest">Sort by latest</option>
                                    <option value="price">Sort by Price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center ">
                        @foreach ($products as $product)
                        <div class="w-full px-3 mb-6 sm:w-1/4 md:w-1/5" >
                            <div class="relative border border-gray-300 dark:border-gray-700 group">
                                <div class="relative bg-gray-200">
                                    <a href="/products/{{ $product->slug }}" class="block">
                                        <img src="{{ url('storage', $product->images[0]) }}" alt="{{ $product->name }}" class="object-cover w-full h-56 mx-auto ">
                                    </a>
                                </div>
                                <div class="p-3">
                                    <div class="flex items-center justify-between gap-2 mb-2">
                                        <h3 class="text-sm dark:text-gray-400">
                                            {{  $product->name }}
                                        </h3>
                                    </div>
                                    <p class="text-lg ">
                                        <span class="font-bold">
                                            {{ Number::currency($product->price) }}
                                        </span>
                                    </p>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-90 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <div class="space-y-2 grid grid-rows-3 grid-flow-col">
                                        <a href="/products/{{ $product->slug }}" class="flex text-sm items-center justify-center px-4 py-2 text-black hover:text-white bg-sky-300 rounded-md hover:bg-sky-600 transition-colors" style="height: 2.5em;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-5 h-5 bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-6-8-6S0 8 0 8s3 6 8 6 8-6 8-6zm-8 4.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-8a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7z"/>
                                            </svg>
                                            <span class="ml-2">View Product</span>
                                        </a>
                                        <button wire:click.prevent="addToCart({{ $product->id }})" class="flex text-sm items-center justify-center px-4 py-2 text-black hover:text-white bg-teal-300 rounded-md hover:bg-teal-600 transition-colors" style="height: 2.5em;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="w-5 h-5 bi bi-cart3" viewBox="0 0 16 16">
                                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <span class="ml-2">Add to Cart</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- pagination start -->
                    <div class="flex justify-end mt-6">
                        {{ $products->links() }}
                    </div>
                    <!-- pagination end -->
                </div>
            </div>
        </div>
    </section>

</div>
