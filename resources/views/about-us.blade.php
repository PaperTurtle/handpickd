<x-app-layout>
    <main class="isolate">
        <div class="relative isolate -z-10">
            <svg class="absolute inset-x-0 top-0 -z-10 h-[64rem] w-full stroke-gray-200 [mask-image:radial-gradient(32rem_32rem_at_center,white,transparent)]"
                aria-hidden="true">
                <defs>
                    <pattern id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84" width="200" height="200" x="50%" y="-1"
                        patternUnits="userSpaceOnUse">
                        <path d="M.5 200V.5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
                        stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0"
                    fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)" />
            </svg>
            <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                aria-hidden="true">
                <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
                    style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 48.4% 0%, 44.6% 4.7%, 54.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 63.1% 29.5%)">
                </div>
            </div>
            <div class="overflow-hidden">
                <div class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-8 lg:pt-32">
                    <div class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center">
                        <div class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl">
                            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl font-heading">We’re
                                changing the
                                way people create.</h1>
                            <p class="relative mt-6 text-lg leading-8 text-gray-600 sm:max-w-md lg:max-w-none">Handpickd
                                is a community-driven platform that celebrates creativity and craftsmanship. This
                                marketplace is a school project that provides a space for artisans to showcase their
                                handmade goods and for enthusiasts to discover unique, handcrafted items.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content section -->
        <div class="mx-auto -mt-12 max-w-7xl px-6 sm:mt-0 lg:px-8 xl:-mt-8">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl font-heading">Our mission</h2>
                <div class="mt-6 flex flex-col gap-x-8 gap-y-20 lg:flex-row">
                    <div class="lg:w-full lg:max-w-2xl lg:flex-auto">
                        <p class="text-xl leading-10 text-gray-600">Handpickd offers an alternative to mass-produced
                            goods by highlighting unique, handcrafted items. It's a digital homage to the tradition of
                            artisanry, designed to connect makers with those who appreciate the value of bespoke
                            creations.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image section -->
        <div class="mt-32 sm:mt-40 xl:mx-auto xl:max-w-7xl xl:px-8">
            <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2832&q=80"
                alt="" class="aspect-[5/2] w-full object-cover xl:rounded-3xl">
        </div>

        <!-- Team section -->
        <div class="mx-auto mt-16 mb-16 max-w-7xl px-6 sm:mt-24 sm:mb-24 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl font-heading">Our team</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">This Web Application has been created by a team of
                    talented individuals</p>
            </div>
            <ul role="list"
                class="mx-auto mt-4 grid max-w-2xl grid-cols-2 gap-x-8 gap-y-16 text-center sm:grid-cols-3 md:grid-cols-4 lg:mx-0 lg:max-w-none lg:grid-cols-5 xl:grid-cols-6">
                <li>
                    <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">Seweryn Czabanowski
                    </h3>
                    <p class="text-sm leading-6 text-gray-600">Software Developer</p>
                </li>
                <li>
                    <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">Loran Heinzel</h3>
                    <p class="text-sm leading-6 text-gray-600">Software Developer</p>
                </li>
                <li>
                    <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">Tobias Neubert</h3>
                    <p class="text-sm leading-6 text-gray-600">Software Developer</p>
                </li>
            </ul>
        </div>
    </main>
</x-app-layout>
