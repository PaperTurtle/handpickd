<x-app-layout>
    <div class="bg-background">
        <header class="relative overflow-hidden">
            <!-- Hero section -->
            <div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-40">
                <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
                    <div class="sm:max-w-lg">
                        <h1 class="text-4xl font-bold tracking-tight font-heading">Handpickd</h1>
                        <p class="mt-4 text-base text-gray-500 leading-8">Welcome to Handpickd, a community-driven
                            platform
                            that
                            celebrates creativity and craftsmanship. </br> Handpickd provides a space for artisans to
                            showcase their handmade goods and for enthusiasts to discover unique, handcrafted items.</p>
                    </div>
                    <div>
                        <div class="mt-10">
                            <!-- Decorative image grid -->
                            <div aria-hidden="true"
                                class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                                <div
                                    class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                                    <div class="flex items-center space-x-6 lg:space-x-8">
                                        <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div
                                                class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                                                <img src="{{ URL('images/index_1.jpg') }}" alt="Index Image 1"
                                                    class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="{{ URL('images/index_2.jpg') }}" alt="Index Image 2"
                                                    class="h-full w-full object-cover object-center">
                                            </div>
                                        </div>
                                        <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="{{ URL('images/index_3.jpg') }}" alt="Index Image 3"
                                                    class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="{{ URL('images/index_4.jpg') }}" alt="Index Image 4"
                                                    class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="{{ URL('images/index_5.jpg') }}" alt="Index Image 5"
                                                    class="h-full w-full object-cover object-center">
                                            </div>
                                        </div>
                                        <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="{{ URL('images/index_6.jpg') }}" alt="Index Image 6"
                                                    class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="{{ URL('images/index_7.jpg') }}" alt="Index Image 7"
                                                    class="h-full w-full object-cover object-center">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('products.index') }}"
                                class="inline-block rounded-md border border-transparent bg-primary px-6 py-3 text-center font-bold text-background hover:bg-accent transition-all delay-[20ms]">Browse
                                Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <!-- Category section -->
            <section aria-labelledby="category-heading" class="bg-primary">
                <div class="mx-auto max-w-[2000px] mb-[100px] px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
                    <div class="sm:flex sm:items-baseline sm:justify-between">
                        <h2 id="category-heading"
                            class="text-3xl font-bold tracking-tight text-background font-heading">Shop by
                            Category</h2>
                    </div>

                    <!-- Erstes Element -->
                    <div
                        class="mt-6 grid grid-cols-1 grid-rows-2 gap-y-6 sm:grid-cols-5 sm:grid-rows-2 sm:gap-x-6 lg:gap-8">
                        <div
                            class="group aspect-h-1 aspect-w-3 overflow-hidden rounded-lg sm:aspect-h-1 sm:aspect-w-1 sm:row-span-1 transition ease-in-out delay-[20ms] hover:scale-105 hover:shadow hover:brightness-[.85]">
                            <img src="{{ URL('images/category_1.jpg') }}" alt="orange clay jugs on a table"
                                class="object-cover object-center">
                            <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50"></div>
                            <div class="flex items-end p-6">
                                <div>
                                    <h3 class="font-semibold text-white">
                                        <a href="/products?categories[]=1">
                                            <span class="absolute inset-0"></span>
                                            Handmade Crafts
                                        </a>
                                    </h3>
                                    <p aria-hidden="true" class="mt-1 text-sm text-white">Shop now</p>
                                </div>
                            </div>
                        </div>

                        <!-- Zweites Element -->
                        <div
                            class="group aspect-h-1 aspect-w-2 overflow-hidden rounded-lg sm:aspect-none sm:relative sm:h-full transition ease-in-out delay-[20ms] hover:scale-105 hover:shadow hover:brightness-[.85]">
                            <img src="{{ URL('images/category_2.jpg') }}"
                                alt="diamond drop earrings on a blue background"
                                class="object-cover object-center sm:absolute sm:inset-0 sm:h-full sm:w-full">
                            <div aria-hidden="true"
                                class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0">
                            </div>
                            <div class="flex items-end p-6 sm:absolute sm:inset-0">
                                <div>
                                    <h3 class="font-semibold text-white">
                                        <a href="/products?categories[]=3">
                                            <span class="absolute inset-0"></span>
                                            Jewelry & Accessories
                                        </a>
                                    </h3>
                                    <p aria-hidden="true" class="mt-1 text-sm text-white">Shop now</p>
                                </div>
                            </div>
                        </div>

                        <!-- Drittes Element -->
                        <div
                            class="group aspect-h-1 aspect-w-2 overflow-hidden rounded-lg sm:aspect-none sm:relative sm:h-full sm:row-span-2 transition ease-in-out delay-[20ms] hover:scale-105 hover:shadow hover:brightness-[.85]">
                            <img src="{{ URL('images/category_3.jpg') }}"
                                alt="a hanging rack in a industrial looking room"
                                class="object-cover object-center sm:absolute sm:inset-0 sm:h-full sm:w-full">
                            <div aria-hidden="true"
                                class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0">
                            </div>
                            <div class="flex items-end p-6 sm:absolute sm:inset-0">
                                <div>
                                    <h3 class="font-semibold text-white">
                                        <a href="/products?categories[]=4">
                                            <span class="absolute inset-0"></span>
                                            Home & Living
                                        </a>
                                    </h3>
                                    <p aria-hidden="true" class="mt-1 text-sm text-white">Shop now</p>
                                </div>
                            </div>
                        </div>

                        <!-- Viertes Element -->
                        <div
                            class="group aspect-h-1 aspect-w-2 overflow-hidden rounded-lg sm:aspect-h-1 sm:aspect-w-1 sm:row-auto transition ease-in-out delay-[20ms] hover:scale-105 hover:shadow hover:brightness-[.85]">
                            <img src="{{ URL('images/category_4.jpg') }}" alt="wall with many different paintings"
                                class="object-cover object-center">
                            <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50">
                            </div>
                            <div class="flex items-end p-6">
                                <div>
                                    <h3 class="font-semibold text-white">
                                        <a href="/products?categories[]=5">
                                            <span class="absolute inset-0"></span>
                                            Art & Collectibles
                                        </a>
                                    </h3>
                                    <p aria-hidden="true" class="mt-1 text-sm text-white">Shop now</p>
                                </div>
                            </div>
                        </div>

                        <!-- Fünftes Element -->
                        <div
                            class="group aspect-h-1 aspect-w-2 overflow-hidden rounded-lg sm:aspect-none sm:relative sm:h-full transition ease-in-out delay-[20ms] hover:scale-105 hover:shadow hover:brightness-[.85]">
                            <img src="{{ URL('images/category_5.jpg') }}"
                                alt="a hanging rack in an industrial like room"
                                class="object-cover object-center sm:absolute sm:inset-0 sm:h-full sm:w-full">
                            <div aria-hidden="true"
                                class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0">
                            </div>
                            <div class="flex items-end p-6 sm:absolute sm:inset-0">
                                <div>
                                    <h3 class="font-semibold text-white">
                                        <a href="/products?categories[]=6">
                                            <span class="absolute inset-0"></span>
                                            Clothing & Shoes
                                        </a>
                                    </h3>
                                    <p aria-hidden="true" class="mt-1 text-sm text-white">Shop now</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sechstes Element -->
                        <div
                            class="group aspect-h-1 aspect-w-2 overflow-hidden rounded-lg sm:aspect-none sm:relative sm:h-full transition ease-in-out delay-[20ms] hover:scale-105 hover:shadow hover:brightness-[.85]">
                            <img src="{{ URL('images/category_6.jpg') }}"
                                alt="wedding shoes and bouquet of white roses"
                                class="object-cover object-center sm:absolute sm:inset-0 sm:h-full sm:w-full">
                            <div aria-hidden="true"
                                class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0">
                            </div>
                            <div class="flex items-end p-6 sm:absolute sm:inset-0">
                                <div>
                                    <h3 class="font-semibold text-white">
                                        <a href="/products?categories[]=7">
                                            <span class="absolute inset-0"></span>
                                            Wedding & Party
                                        </a>
                                    </h3>
                                    <p aria-hidden="true" class="mt-1 text-sm text-white">Shop now</p>
                                </div>
                            </div>
                        </div>

                        <!-- Siebtes Element -->
                        <div
                            class="group aspect-h-1 aspect-w-2 overflow-hidden rounded-lg sm:aspect-none sm:relative sm:h-full transition ease-in-out delay-[20ms] hover:scale-105 hover:shadow hover:brightness-[.85]">
                            <img src="{{ URL('images/category_7.jpg') }}"
                                alt="a wooden giraffe, crocodile and an elephant sit on top of a book"
                                class="object-cover object-center sm:absolute sm:inset-0 sm:h-full sm:w-full">
                            <div aria-hidden="true"
                                class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0">
                            </div>
                            <div class="flex items-end p-6 sm:absolute sm:inset-0">
                                <div>
                                    <h3 class="font-semibold text-white">
                                        <a href="/products?categories[]=8">
                                            <span class="absolute inset-0"></span>
                                            Toys & Entertainment
                                        </a>
                                    </h3>
                                    <p aria-hidden="true" class="mt-1 text-sm text-white">Shop now</p>
                                </div>
                            </div>
                        </div>

                        <!-- Achtes Element -->
                        <div
                            class="group aspect-h-1 aspect-w-2 overflow-hidden rounded-lg sm:aspect-none sm:relative sm:h-full transition ease-in-out delay-[20ms] hover:scale-105 hover:shadow hover:brightness-[.85]">
                            <img src="{{ URL('images/category_8.jpg') }}"
                                alt="a chair with a chest on top and a bike next to each other outside of a store"
                                class="object-cover object-center sm:absolute sm:inset-0 sm:h-full sm:w-full">
                            <div aria-hidden="true"
                                class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0">
                            </div>
                            <div class="flex items-end p-6 sm:absolute sm:inset-0">
                                <div>
                                    <h3 class="font-semibold text-white">
                                        <a href="/products?categories[]=9">
                                            <span class="absolute inset-0"></span>
                                            Vintage
                                        </a>
                                    </h3>
                                    <p aria-hidden="true" class="mt-1 text-sm text-white">Shop now</p>
                                </div>
                            </div>
                        </div>

                        <!-- Neuntes Element -->
                        <div
                            class="group aspect-h-1 aspect-w-2 overflow-hidden rounded-lg sm:aspect-none sm:relative sm:h-full transition ease-in-out delay-[20ms] hover:scale-105 hover:shadow hover:brightness-[.85]">
                            <img src="{{ URL('images/category_9.jpg') }}"
                                alt="a white sink surrounded by a circular mirror with cosmetics on top"
                                class="object-cover object-center sm:absolute sm:inset-0 sm:h-full sm:w-full">
                            <div aria-hidden="true"
                                class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0">
                            </div>
                            <div class="flex items-end p-6 sm:absolute sm:inset-0">
                                <div>
                                    <h3 class="font-semibold text-white">
                                        <a href="/products?categories[]=10">
                                            <span class="absolute inset-0"></span>
                                            Bath & Beauty
                                        </a>
                                    </h3>
                                    <p aria-hidden="true" class="mt-1 text-sm text-white">Shop now</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Browse Categories mobile -->
                    <div class="mt-6 sm:hidden">
                        <a href="#"
                            class="block text-sm font-semibold rounded-md border border-transparent bg-background px-4 py-1 text-primary hover:shadow-lg hover:scale-105 transition-all delay-[20ms]">
                            Browse all categories
                            <span aria-hidden="true"> &rarr;</span>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Wir als Handpickd section -->
            <section aria-labelledby="cause-heading">
                <div class="relative bg-gray-800 px-6 py-32 sm:px-12 sm:py-40 lg:px-16">
                    <div class="absolute inset-0 overflow-hidden">
                        <img src="{{ URL('images/we_as_handpickd.jpg') }}" alt="We As Handpickd"
                            class="h-full w-full object-cover object-center">
                    </div>
                    <div aria-hidden="true" class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>
                    <div class="relative mx-auto flex max-w-3xl flex-col items-center text-center">
                        <h2 id="cause-heading"
                            class="text-3xl font-bold tracking-tight text-background sm:text-4xl font-heading">
                            Long-term thinking</h2>
                        <p class="mt-3 text-xl text-background">We're committed to create a space for responsible,
                            sustainable, and ethical manufacturing. Our small-scale approach allows our users to focus
                            on quality and not quantity. We're doing our best to delay the inevitable heat-death of the
                            universe :)</p>
                        <a href="{{ route('about-us') }}"
                            class="mt-4 inline-block rounded-md border border-transparent bg-primary px-8 py-3 text-center font-bold text-background hover:bg-accent transition-all delay-[20ms]">Find
                            out more about us</a>
                    </div>
                </div>
            </section>

            <!-- Favorites section -->
            <section aria-labelledby="favorites-heading">
                <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
                    <div class="sm:flex sm:items-baseline sm:justify-between">
                        <h2 id="favorites-heading"
                            class="text-3xl font-bold tracking-tight text-primary font-heading">Top Rated
                            Products</h2>
                        <a href="{{ route('products.index', ['sort' => 'rating']) }}"
                            class="hidden text-base font-semibold rounded-md border border-transparent bg-primary px-4 py-2 text-background hover:shadow-lg hover:scale-105 sm:block transition-all delay-[20ms]">
                            Browse top rated products
                            <span aria-hidden="true"> &rarr;</span>
                        </a>
                    </div>

                    <!-- 1st Favorite  -->
                    <div class="mt-6 grid grid-cols-1 gap-y-10 sm:grid-cols-3 sm:gap-x-6 sm:gap-y-0 lg:gap-x-8">
                        @foreach ($topRatedProducts as $product)
                            <div class="group relative">
                                <div
                                    class="h-96 w-full overflow-hidden rounded-lg sm:aspect-h-3 sm:aspect-w-2 transition ease-in-out delay-[20ms] group-hover:scale-105 group-hover:shadow sm:h-auto">
                                    <img src="{{ Storage::url($product->images->first()->resized_image_path) }}"
                                        alt="{{ $product->description }}"
                                        class="h-full w-full object-cover object-center">
                                </div>
                                <h3 class="mt-4 text-base font-semibold text-primary">
                                    <a href="{{ route('products.show', $product->id) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-primary">{{ $product->price }} €</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Browse all favorites mobile  -->
                    <div class="mt-6 sm:hidden">
                        <a href="{{ route('products.index') }}"
                            class="block text-base font-semibold text-center rounded-md border border-transparent bg-primary px-4 py-2 text-background hover:shadow-lg hover:scale-105 transition-all delay-[20ms]">
                            Browse top rated products
                            <span aria-hidden="true"> &rarr;</span>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Customer reviews -->
            <section aria-labelledby="testimonial-heading"
                class="bg-primary mb-20 relative mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8 lg:py-10 rounded-lg">
                <div class="mx-auto max-w-2xl lg:max-w-none">
                    <h2 id="testimonial-heading"
                        class="text-3xl font-bold tracking-tight text-background font-heading text-center">What are
                        people saying?</h2>

                    <div class="mt-16 space-y-16 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
                        <blockquote class="sm:flex lg:block relative">
                            <svg width="24" height="18" viewBox="0 0 24 18" aria-hidden="true"
                                class="flex-shrink-0 text-background opacity-75">
                                <path
                                    d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                    fill="currentColor" />
                            </svg>
                            <div class="mt-8 sm:ml-6 sm:mt-0 lg:ml-0 lg:mt-10">
                                <p class="text-lg text-background">My order arrived super quickly. The leather wallet
                                    is even better than I hoped it would be. Very happy customer over here!</p>
                                <cite class="mt-4 block font-semibold not-italic text-background opacity-75">- Hannah
                                    Davis</cite>
                            </div>
                            <svg width="24" height="18" viewBox="0 0 24 18" aria-hidden="true"
                                class="flex-shrink-0 text-background opacity-75 absolute right-0 bottom-0 scale-y-[-1]">
                                <path
                                    d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                    fill="currentColor" />
                            </svg>
                        </blockquote>
                        <hr class="mt-1 mb-1 w-1/2 mx-auto block sm:hidden">
                        <blockquote class="sm:flex lg:block relative">
                            <svg width="24" height="18" viewBox="0 0 24 18" aria-hidden="true"
                                class="flex-shrink-0 text-background opacity-75">
                                <path
                                    d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                    fill="currentColor" />
                            </svg>
                            <div class="mt-8 sm:ml-6 sm:mt-0 lg:ml-0 lg:mt-10">
                                <p class="text-lg text-background">I had to return a purchase that didn’t meet my
                                    expectations. The whole process was so simple that I ended up ordering two new
                                    items!</p>
                                <cite class="mt-4 block font-semibold not-italic text-background opacity-75">- George
                                    Miller</cite>
                            </div>
                            <svg width="24" height="18" viewBox="0 0 24 18" aria-hidden="true"
                                class="flex-shrink-0 text-background opacity-75 absolute right-0 bottom-0 scale-y-[-1]">
                                <path
                                    d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                    fill="currentColor" />
                        </blockquote>
                        <hr class="mt-1 mb-1 w-1/2 mx-auto block sm:hidden">
                        <blockquote class="sm:flex lg:block relative">
                            <svg width="24" height="18" viewBox="0 0 24 18" aria-hidden="true"
                                class="flex-shrink-0 text-background opacity-75">
                                <path
                                    d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                    fill="currentColor" />
                            </svg>
                            <div class="mt-8 sm:ml-6 sm:mt-0 lg:ml-0 lg:mt-10">
                                <p class="text-lg text-background">Now that christmas is approaching, I’ll probably
                                    order a few more of the handwoven scarves. It’s just so convenient.</p>
                                <cite class="mt-4 block font-semibold not-italic text-background opacity-75">- Ryan
                                    Moore</cite>

                            </div>
                            <svg width="24" height="18" viewBox="0 0 24 18" aria-hidden="true"
                                class="flex-shrink-0 text-background opacity-75 absolute right-0 bottom-0 scale-y-[-1]">
                                <path
                                    d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                    fill="currentColor" />
                        </blockquote>
                    </div>
                </div>
            </section>
        </main>
    </div>
</x-app-layout>
