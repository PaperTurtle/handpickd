<x-app-layout>
    <div class="container mx-auto px-4 pb-24 pt-16 sm:px-6 max-w-4xl lg:px-8 text-text text-sm">
        <h2 class="text-3xl font-bold">Profile</h2>
        <!-- Personal Information -->
        <h2 class="text-2xl mt-10">Personal information</h2>
        <section class="mt-6 border-t border-b border-gray-300 pt-8 pb-6 h-fit">
            <div class="flex">
                <div>
                    <img src="{{Storage::url($user->profile->profile_picture)}}" alt="" class="w-60 h-60">
                    </img>
                </div>
                <div class="ml-40">
                    <div>
                        <div class="mt-4 font-bold">Name:</div>
                        <div class="mt-1"> {{$user->name}}</div>
                    </div>
                    <div>
                        <div class="mt-4 font-bold">Email:</div>
                        <div class="mt-1">{{$user->email}}</div>
                    </div>
                    <div>

                    </div>
                    <div class="mt-4 font-bold">Bio:</div>
                    <div class="mt-1">{{$user->profile->bio}}</div>
                </div>
            </div>
            <div class="relative mt-16 mb-4">
                <a href="{{ route('profile.edit', auth()->user()->id)}}"><button type="submit"
                    class="absolute bottom-0 right-0 w-20 py-2 bg-accent hover:bg-primary rounded-md text-white">Edit</button>
                </a>
                
            </div>
        </section>

        @php
        $hasProducts = sizeof($user->products) > 0;
        $hasOrders = sizeof($user->transactions) > 0;
        @endphp

        @if ($user->isArtisan)
        <!-- Your Products -->
        <section class="border-b border-gray-300 mt-6 pb-8 h-fit">
            <h3 class="text-2xl">Your Products</h3>
            @if ($hasProducts)
            <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-4">
                @foreach ($user->products as $product)
                <div class="mt-4 mb-4 row-span-4 justify-between grid">
                    <div class="flex">
                        <div class="mr-4">
                            <img class="w-32 h-32" src=""></img>
                        </div>
                        <div >
                            <div>{{$product->name}}</div>
                            <div class="mt-4">{{$product->price}} €</div>
                            <!-- <<div>{{$product->reviews}}</div> -->
                            <div class="mt-8">{{$product->description}}</div>
                        </div>
                    </div>
                    <button class="mt-4 border-2">edit</button>
                </div>
                @endforeach
            </div>
            @endif
            @if (!$hasProducts)
            <div class="mt-4">
                You are registered as artisan, but you haven't uploaded any goods so far.
            </div>
            @endif
        </section>
        @endif

        <!-- Your Orders -->
        <section class="border-b border-gray-300 pb-6 ">
            <h3 class="text-2xl mb-4 mt-6">Your Orders</h3>
            @if ($hasOrders)
            <div>your orders</div>
            @endif
            @if (!$hasOrders)
            <div>You havn't ordered anything yet.</div>
            <a href="{{route('products.index')}}">Visit the product page to order something.</a>
            @endif
        </section>
    </div>
</x-app-layout>