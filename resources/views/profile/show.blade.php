<x-app-layout>
    <div class="container mx-auto px-4 pb-24 pt-16 sm:px-6 max-w-4xl lg:px-8 text-text text-sm">
        <h2 class="text-3xl font-bold">Profile</h2>
        <!-- Personal Information -->
        <h2 class="text-2xl mt-10">Personal information</h2>
        <section class="mt-6 border-t border-gray-300 pt-8 h-fit">
            <div class="flex">
                <div>
                    <img src="" alt="" class="w-60 h-60">
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
            <div class="relative mt-10">
                <button class="absolute border-2 border-black bottom-0 right-0 w-20 ">edit</button>
            </div>
        </section>

        @php
        $hasProducts = sizeof($user->products) > 0;
        $hasOrders = sizeof($user->transactions) > 0;
        @endphp

        @if ($user->isArtisan)
        <!-- Your Products -->
        <section class="border-t border-gray-300 mt-8 pt-8 pb-8 h-fit">
            <h3 class="text-xl"> Your Products</h3>
            @if ($hasProducts)
            <div class="mt-4">these are your products</div>
            @endif
            @if (!$hasProducts)
            <div class="mt-4">
                You are registered as artisan, but you havent't uploaded any goods so far.
            </div>
            @endif
        </section>
        @endif

        <!-- Your Orders -->
        <section>
            <h3 class="text-xl mb-4">Your Orders</h3>
            @if ($hasOrders)
            <div>your orders</div>
            @endif
            @if (!$hasOrders)
            <div>You havn't ordered anything yet.</div>
            <div>Visit the product page to order something.</div>
            @endif
        </section>
    </div>
</x-app-layout>