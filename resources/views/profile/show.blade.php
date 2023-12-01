<x-app-layout>
    <div class="container mx-auto px-4 pb-24 pt-16 sm:px-6 max-w-4xl lg:px-8 text-text text-sm">
        <h2 class="text-3xl font-bold">Profile</h2>
        <!-- Personal Information -->
        <h2 class="text-2xl mt-10">Personal information</h2>
        <section class="mt-6 flex border-t border-gray-300 pt-8">
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
        </section>
        <!-- Your Products -->
        <section>

        </section>
        <!-- Your Orders -->
        <section>

        </section>
    </div>
</x-app-layout>