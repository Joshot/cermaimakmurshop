<div class="w-full max-w-[85rem] py-20 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="text-center mb-12">
        <h1 class="text-5xl font-bold text-gray-800 dark:text-gray-200">
            Explore Our <span class="text-blue-600">Categories</span>
        </h1>
        <div class="flex justify-center mt-4 mb-6">
            <div class="flex w-48 h-1 bg-blue-600 rounded-full"></div>
        </div>
        <p class="text-gray-600 dark:text-gray-400 text-lg">
            Dive into our categories and discover what we have in store for you!
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($categories as $category)
        <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="relative group block bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
            <div class="relative overflow-hidden">
                <img src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}" class="w-full h-40 object-cover filter blur-sm group-hover:scale-110 transition-transform">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-75"></div>
                <div class="absolute inset-0 flex items-end justify-center p-4 text-center text-white">
                    <div>
                        <h3 class="text-lg font-semibold group-hover:text-yellow-400">
                            {{ $category->name }}
                        </h3>
                        <p class="mt-2 text-sm opacity-75">
                            @if($category->name == 'Gift Box')
                            Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.
                            @elseif($category->name == 'Gift Bag')
                            A present is made for the pleasure of who received them. Give an extravagant design and a present that comes from your heart then it will be the best gift of all.
                            @elseif($category->name == 'Gift Card / Tag')
                            Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.
                            @elseif($category->name == 'Gift Wrap')
                            A little splash of color can make your moment more colorful.
                            @elseif($category->name == 'Gift Sack')
                            Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.
                            @elseif($category->name == 'Tissue')
                            Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.
                            @elseif($category->name == 'Bow & Ribbon')
                            Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.
                            @elseif($category->name == 'Crackers')
                            Fabulously crackers designs are the perfect way to find a shocking magnificent gift.
                            @elseif($category->name == 'Stickers')
                            Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.
                            @elseif($category->name == 'Box')
                            Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.
                            @else
                            Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-red-500"></div>
        </a>
        @endforeach
    </div>
</div>
