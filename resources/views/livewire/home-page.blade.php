<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Swiper.js JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #ffffff; /* Putih */
        }

        .swiper-pagination-bullet {
            background-color: #ffffff; /* White color */
            border: 1px solid #cccccc; /* Optional: border color to make bullets visible on light backgrounds */
        }

        .swiper-pagination-bullet-active {
            background-color: #ffffff; /* White color for active bullet */
            border: 1px solid #333333; /* Optional: darker border for active bullet to make it stand out */
        }

        .swiper-slide .absolute {
            z-index: 10; /* Ensure it is above other content */
        }

        .swiper-slide .bottom-2.right-2 {
            z-index: 50; /* Ensure breadcrumb is on top */
            padding: 0.5em; /* Add padding if necessary */
        }

        .hover\:underline:hover {
            text-decoration: underline; /* Ensure hover effect */
        }
    </style>
</head>

<body>
<div>

    <!-- Hero Section Start -->
    <div class="flex items-center bg-white justify-center" style="padding: 1em;">
        <div class="w-full h-screen relative overflow-hidden" style="max-width: 90%; max-height: 35em; border-radius: 1em">
            <!-- Swiper -->
            <div class="swiper-container h-full w-full">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                    <div class="swiper-slide relative flex justify-center items-start">
                        <!-- Gambar Produk -->
                        <img src="{{ url('storage', $product->images[0]) }}" alt="{{ $product->name }}" class="object-cover w-full h-auto">

                        <!-- Nama Produk dan Breadcrumbs di pojok kanan bawah -->
                        <div class="absolute bottom-4 right-4 z-10 bg-white bg-opacity-90 p-3 rounded-md">
                            <!-- Nama Produk -->
                            <a href="/products/{{ $product->slug }}" class="hover:text-black text-md font-bold text-gray-800">
                                {{ $product->name }}
                            </a>

                            <!-- Breadcrumbs -->
                            <p class="text-xs text-gray-600 mt-1">
                                <a href="/products?selected_brands[0]={{ $product->brand->id }}" class="hover:underline">{{ $product->brand->name }}</a> >
                                <a href="/products?selected_brands[0]={{ $product->brand->id }}&selected_categories[0]={{ $product->category->id }}" class="hover:underline">{{ $product->category->name }}</a> >
                                <a href="/products/{{ $product->slug }}" class="hover:underline">{{ $product->name }}</a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination Swiper -->
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </div>
    <!-- Hero Section End -->

    <!--  Brand Section Start  -->
    <section class="py-20 bg-white">
        <div class="max-w-xl mx-auto">
            <div class="text-center">
                <div class="relative flex flex-col items-center">
                    <h1 class="text-5xl font-bold dark:text-gray-200">
                        Product
                        <span class="text-blue-500">Season</span>
                    </h1>
                    <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                        <div class="flex-1 h-2 bg-blue-200"></div>
                        <div class="flex-1 h-2 bg-blue-400"></div>
                        <div class="flex-1 h-2 bg-blue-600"></div>
                    </div>
                </div>
                <p class="mb-12 text-base text-center text-gray-500">
                    Discover a selection of products tailored to fit your needs, whether for the season, special occasions, or daily essentials.
                </p>
            </div>
        </div>

        <div class="max-w-6xl px-4 py-4 mx-auto lg:py-0">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach ($brands as $brand)
                @if($brand->name == 'Seasonal Products')
                <!-- Seasonal Products -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 group">
                    <a href="/products?selected_brands[0]={{ $brand->id }}">
                        <img src="{{ url('storage', $brand->image) }}" alt="{{ $brand->name }}" class="object-cover w-full h-64 rounded-t-lg">
                    </a>
                    <div class="p-5 text-center">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                            Seasonal Products
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mt-4">
                            Discover products perfect for the changing seasons, handpicked to match the mood.
                        </p>
                        <a href="/products?selected_brands[0]={{ $brand->id }}" class="text-blue-600 hover:text-blue-800 font-medium flex justify-center items-center gap-1 mt-6">
                            Explore Seasonal
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 -5 20 20" fill="currentColor">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
                @elseif($brand->name == 'Special Products')
                <!-- Special Products -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 group">
                    <a href="/products?selected_brands[0]={{ $brand->id }}">
                        <img src="{{ url('storage', $brand->image) }}" alt="{{ $brand->name }}" class="object-cover w-full h-64 rounded-t-lg">
                    </a>
                    <div class="p-5 text-center">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                            Special Products
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mt-4">
                            Unique, limited edition products curated for those special moments.
                        </p>
                        <a href="/products?selected_brands[0]={{ $brand->id }}" class="text-blue-600 hover:text-blue-800 font-medium flex justify-center items-center gap-1 mt-6">
                            Explore Special
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 -5 20 20" fill="currentColor">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
                @elseif($brand->name == 'Everyday Products')
                <!-- Everyday Products -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 group">
                    <a href="/products?selected_brands[0]={{ $brand->id }}">
                        <img src="{{ url('storage', $brand->image) }}" alt="{{ $brand->name }}" class="object-cover w-full h-64 rounded-t-lg">
                    </a>
                    <div class="p-5 text-center">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                            Everyday Products
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mt-4">
                            Essentials that fit perfectly into your daily life, always available.
                        </p>
                        <a href="/products?selected_brands[0]={{ $brand->id }}" class="text-blue-600 hover:text-blue-800 font-medium flex justify-center items-center gap-1 mt-6">
                            Explore Everyday
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 -5 20 20" fill="currentColor">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    <!--  Brand Section End  -->



    <!--  Category Section Start  -->
    <div class="bg-white py-20">
        <div class="max-w-xl mx-auto">
            <div class="text-center">
                <div class="relative flex flex-col items-center">
                    <h1 class="text-5xl font-bold dark:text-gray-200">
                        Browse <span class="text-red-500">Categories</span>
                    </h1>
                    <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                        <div class="flex-1 h-2 bg-red-200"></div>
                        <div class="flex-1 h-2 bg-red-400"></div>
                        <div class="flex-1 h-2 bg-red-600"></div>
                    </div>
                </div>
                <p class="mb-12 text-base text-center text-gray-500">
                    Explore a variety of categories tailored to your interests and needs!
                </p>
            </div>
        </div>

        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach ($categories as $category)
                @if($category->name == 'Gift Box')
                <!-- Gift Box -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Gift Box</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>
                @elseif($category->name == 'Gift Bag')
                <!-- Gift Bag -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">A present is made for the pleasure of who received them. Give an extravagant design and a present that comes from your heart then it will be the best gift of all.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Gift Bag</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>
                @elseif($category->name == 'Gift Card / Tag')
                <!-- Gift Card / Tag -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Gift Card / Tag</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>

                @elseif($category->name == 'Gift Wrap')
                <!-- Gift Wrap -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">A little splash of color can makes your moment more colorful.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Gift Wrap</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>

                @elseif($category->name == 'Gift Cards & Gift Tags')
                <!-- Gift Cards & Gift Tags -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">A little splash of color can makes your moment more colorful.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Gift Cards & Gift Tags</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>

                @elseif($category->name == 'Gift Sack')
                <!-- Gift Sack -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Gift Sack</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>

                @elseif($category->name == 'Tissue')
                <!-- Tissue -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Tissue</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>

                @elseif($category->name == 'Bow & Ribbon')
                <!-- Bow & Ribbon -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Bow & Ribbon</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>

                @elseif($category->name == 'Crackers')
                <!-- Crackers -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Crackers</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>

                @elseif($category->name == 'Stickers')
                <!-- Stickers -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Stickers</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>

                @elseif($category->name == 'Box')
                <!-- Box -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Box</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>

                @elseif($category->name == 'Others')
                <!-- Others -->
                <a href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}" class="group flex flex-col bg-white border border-gray-200 shadow-lg rounded-lg hover:shadow-xl transition-transform transform hover:scale-105">
                    <div class="overflow-hidden rounded-t-lg">
                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-500 text-sm mt-2">Your sunny days immediately begin with garnishes of favorite and unique colors that always invite you to smile.</p>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">View Others</span>
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>

                @endif
                @endforeach
            </div>
        </div>
    </div>
    <!--  Category Section End  -->




</div>

<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

</body>

</html>
