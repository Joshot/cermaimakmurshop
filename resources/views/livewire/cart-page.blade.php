<div class="w-full max-w-[85rem] py-12 px-6 sm:px-8 lg:px-12 mx-auto">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white">Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Cart Items -->
            <div class="md:w-3/4">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 mb-6">
                    <table class="w-full">
                        <thead class="border-b dark:border-gray-700">
                        <tr>
                            <th class="text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Product</th>
                            <th class="text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Price</th>
                            <th class="text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Quantity</th>
                            <th class="text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Total</th>
                            <th class="text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Remove</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                        @forelse ($cart_items as $item)
                        <tr wire:key="{{ $item['product_id'] }}">
                            <td class="py-4">
                                <div class="flex items-center space-x-4">
                                    <img class="h-16 w-16 rounded-md shadow" src="{{ url('storage', $item['image']) }}" alt="{{ $item['name'] }}">
                                    <span class="font-semibold text-gray-800 dark:text-gray-300">{{ $item['name'] }}</span>
                                </div>
                            </td>
                            <td class="py-4 text-gray-600 dark:text-gray-400">{{ Number::currency($item['unit_amount']) }}</td>
                            <td class="py-4">
                                <div class="flex items-center space-x-2">
                                    <button wire:click="decreaseQty({{ $item['product_id'] }})" class="border border-gray-300 rounded-md py-2 px-4 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600">-</button>

                                    <!-- Quantity Input -->
                                    @if ($editingQty === $item['product_id'])
                                    <input wire:model.defer="cart_items.{{ $item['product_id'] }}.quantity"
                                           wire:keydown.enter="saveQty({{ $item['product_id'] }})"
                                           wire:blur="saveQty({{ $item['product_id'] }})"
                                           type="text"
                                           class="text-center w-16 border border-gray-300 rounded-md py-1 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                           value="{{ $item['quantity'] }}">
                                    @else
                                    <span wire:click="editQty({{ $item['product_id'] }})"
                                          class="text-center cursor-pointer w-16 border border-gray-300 rounded-md py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ $item['quantity'] }}</span>
                                    @endif

                                    <button wire:click="increaseQty({{ $item['product_id'] }})" class="border border-gray-300 rounded-md py-2 px-4 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600">+</button>
                                </div>
                            </td>
                            <td class="py-4 text-gray-600 dark:text-gray-400">{{ Number::currency($item['total_amount']) }}</td>
                            <td class="py-4">
                                <button wire:click="removeItem({{ $item['product_id'] }})" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                    Remove
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-xl font-semibold text-gray-500 dark:text-gray-400">
                                No items available in cart!
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="md:w-1/4">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                    <h2 class="text-xl font-bold mb-6 text-gray-800 dark:text-white">Summary</h2>
                    <div class="flex justify-between mb-4">
                        <span class="text-gray-600 dark:text-gray-400">Subtotal</span>
                        <span class="text-gray-800 dark:text-white">{{ Number::currency($grand_total) }}</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="text-gray-600 dark:text-gray-400">Taxes</span>
                        <span class="text-gray-800 dark:text-white">{{ Number::currency(0) }}</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="text-gray-600 dark:text-gray-400">Shipping</span>
                        <span class="text-gray-800 dark:text-white">{{ Number::currency(0) }}</span>
                    </div>
                    <hr class="my-4 border-gray-300 dark:border-gray-700">
                    <div class="flex justify-between mb-6">
                        <span class="font-bold text-gray-800 dark:text-white">Grand Total</span>
                        <span class="font-bold text-gray-800 dark:text-white">{{ Number::currency($grand_total) }}</span>
                    </div>
                    @if ($cart_items)
                    <a href="/checkout" class="bg-blue-600 hover:bg-blue-700 text-white block text-center py-3 px-4 rounded-lg w-full">Checkout</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
