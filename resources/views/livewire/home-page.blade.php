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
                        <img src="{{ url('storage', $product->images[0]) }}" alt="{{ $product->name }}" class="object-cover w-full h-auto">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center p-6">
                            <div class="text-center text-white max-w-4xl" style="max-width: 60%;">
                                <h1 class="text-3xl font-bold sm:text-4xl lg:text-6xl lg:leading-tight">{{ $product->name }}</h1>
                                <p class="mt-3 text-lg">{{ $product->description }}</p>
                            </div>
                        </div>
                        <!-- Breadcrumbs in the bottom right corner -->
                        <div class="absolute bottom-2 right-2 text-sm text-white z-10">
                            <p class="font-semibold">
                                <a href="/products?selected_brands[0]={{ $product->brand->id }}" class="hover:underline">{{ $product->brand->name }}</a> >
                                <a href="/products?selected_brands[0]={{ $product->brand->id }}&selected_categories[0]={{ $product->category->id }}" class="hover:underline">{{ $product->category->name }}</a> >
                                <a href="/products/{{ $product->slug }}" class="hover:underline">{{ $product->name }}</a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!--  Brand Section Start  -->
    <section class="py-20 bg-white">
        <div class="max-w-xl mx-auto">
            <div class="text-center ">
                <div class="relative flex flex-col items-center">
                    <h1 class="text-5xl font-bold dark:text-gray-200"> Product
                        <span class="text-blue-500">
                        Season
                    </span>
                    </h1>
                    <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                        <div class="flex-1 h-2 bg-blue-200"></div>
                        <div class="flex-1 h-2 bg-blue-400"></div>
                        <div class="flex-1 h-2 bg-blue-600"></div>
                    </div>
                </div>
                <p class="mb-12 text-base text-center text-gray-500">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus magni eius eaque? Pariatur
                    numquam, odio quod nobis ipsum ex cupiditate?
                </p>
            </div>
        </div>
        <div class="max-w-6xl px-4 py-4 mx-auto lg:py-0">
            <div class="grid grid-cols-1 gap-6">
                @foreach ($brands as $brand)
                <div class="bg-white rounded-lg shadow-md dark:bg-gray-800" wire:key="{{ $brand->id }}">
                    <a href="/products?selected_brands[0]={{ $brand->id }}" class="">
                        <img src="{{ url('storage', $brand->image) }}" alt="{{ $brand->name }}" class="object-cover w-full h-64 rounded-t-lg">
                    </a>
                    <div class="p-5 text-center">
                        <a href="" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                            {{ $brand->name }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--  Brand Section End  -->


    <!--  Category Section Start  -->
    <div class="bg-white py-20">
        <div class="max-w-xl mx-auto">
            <div class="text-center ">
                <div class="relative flex flex-col items-center">
                    <h1 class="text-5xl font-bold dark:text-gray-200"> Browse <span class="text-red-500"> Categories
          </span> </h1>
                    <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                        <div class="flex-1 h-2 bg-red-200">
                        </div>
                        <div class="flex-1 h-2 bg-red-400">
                        </div>
                        <div class="flex-1 h-2 bg-red-600">
                        </div>
                    </div>
                </div>
                <p class="mb-12 text-base text-center text-gray-500">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus magni eius eaque?
                    Pariatur
                    numquam, odio quod nobis ipsum ex cupiditate?
                </p>
            </div>
        </div>

        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">
                @foreach ($categories as $category)
                <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}">
                    <div class="p-4 md:p-5">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <img class="h-[2.375rem] w-[2.375rem] rounded-full" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                                <div class="ms-3">
                                    <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                        {{ $category->name }}
                                    </h3>
                                </div>
                            </div>
                            <div class="ps-3">
                                <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
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
