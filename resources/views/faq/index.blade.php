<x-app-layout>
    <div class="container mx-auto px-4 pb-24 pt-16 sm:px-6 max-w-4xl lg:px-8"
        x-data="{ openGeneral: true, openForCustomers: false, openForArtisans: false }">
        <h2 class="text-3xl font-bold">FAQ / Support</h2>
        <h2 class="text-2xl">Frequently asked questions</h2>
        <div class="flex justify-between">
            <button class="border-2 rounded-md px-5 py-3 mr-2 border-accent text-xl font-bold w-full"
                @click="openGeneral = !openGeneral, openForCustomers = false, openForArtisans = false">General</button>
            <button class="border-2 rounded-md px-5 py-3 mr-2 border-accent text-xl font-bold w-full"
                @click="openForCustomers = !openForCustomers, openGeneral = false, openForArtisans = false">For our
                Customers</button>
            <button class="border-2 rounded-md px-5 py-3 border-accent text-xl font-bold w-full"
                @click="openForArtisans = !openForArtisans, openGeneral = false, openForCustomers = false">For our
                Artisans</button>
        </div>
        <ul>
            <li x-show="openGeneral"
                x-data="{openGeneralQuestionOne: false, openGeneralQuestionTwo: false, openGeneralQuestionThree: false}">
                <dl>
                    <!-- Question One -->
                    <div class="border-t border-gray-300 mt-6 pt-4">
                        <dt>
                            <button @click="openGeneralQuestionOne = !openGeneralQuestionOne"
                                class="text-left text-base font-bold" :class="{'mb-2' : openGeneralQuestionOne}">
                                <!-- Question -->
                                <div>
                                    What is Handpickd?
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openGeneralQuestionOne">
                            <!-- Answer -->
                            <p>Handpickd is a digital marketplace dedicated to showcasing unique, handcrafted items. It
                                connects artisans with enthusiasts who value bespoke creations.</p>
                        </dd>
                    </div>

                    <!-- Question two -->
                    <div class="border-t border-gray-300 mt-4 pt-2">
                        <dt>
                            <button @click="openGeneralQuestionTwo = !openGeneralQuestionTwo">
                                <!-- Question -->
                                <div>
                                    Who can use Handpickd?
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openGeneralQuestionTwo">
                            <!-- Answer -->
                            <p>Handpickd is designed for both artisans who create handcrafted goods and individuals
                                looking for unique, handmade products.</p>
                        </dd>
                    </div>

                    <!-- Question three -->
                    <div>
                        <dt>
                            <button @click="openGeneralQuestionThree = !openGeneralQuestionThree">
                                <!-- Question -->
                                <div>
                                    Who are the authors of Handpickd?
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openGeneralQuestionThree">
                            <!-- Answer -->
                            <p>Handpickd was masterfully created by Loran Heinzel, Seweryn Czabanowski and Tobias
                                Neubert.</p>
                        </dd>
                    </div>
                </dl>
            </li>
            <!-- Customers -->
            <li x-show="openForCustomers"
                x-data="{openCustomersQuestionOne: false, openCustomersQuestionTwo: false, openCustomersQuestionThree: false}">
                <dl>
                    <!-- Question One -->
                    <div>
                        <dt>
                            <button @click="openCustomersQuestionOne = !openCustomersQuestionOne">
                                <!-- Question -->
                                <div>
                                    How do I find products on Handpickd?
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openCustomersQuestionOne">
                            <!-- Answer -->
                            <p>You can browse products by category, price range, and reviews, or use the search bar to
                                find products by keywords.</p>
                        </dd>
                    </div>

                    <!-- Question two -->
                    <div>
                        <dt>
                            <button @click="openCustomersQuestionTwo = !openCustomersQuestionTwo">
                                <!-- Question -->
                                <div>
                                    Can I review and rate products?
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openCustomersQuestionTwo">
                            <!-- Answer -->
                            <p>Yes, users can post and update reviews for products, providing valuable feedback to the
                                community.</p>
                        </dd>
                    </div>

                    <!-- Question three -->
                    <div>
                        <dt>
                            <button @click="openCustomersQuestionThree = !openCustomersQuestionThree">
                                <!-- Question -->
                                <div>
                                    How does the shopping cart and checkout process work?
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openCustomersQuestionThree">
                            <!-- Answer -->
                            <p>You can add items to your cart and proceed to checkout for purchase. A confirmation email
                                will be sent upon completion of the purchase.</p>
                        </dd>
                    </div>
                </dl>
            </li>
            <!-- Artisans -->
            <li x-show="openForArtisans"
                x-data="{openArtisansQuestionOne: false, openArtisansQuestionTwo: false, openArtisansQuestionThree: false, openArtisansQuestionFour: false}">
                <dl>
                    <!-- Question One -->
                    <div>
                        <dt>
                            <button @click="openArtisansQuestionOne = !openArtisansQuestionOne">
                                <!-- Question -->
                                <div>
                                    How can I list my products on Handpickd?
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openArtisansQuestionOne">
                            <!-- Answer -->
                            <p>Once registered, you can list your handmade items under the 'Products' section by
                                providing detailed descriptions and images.</p>
                        </dd>
                    </div>

                    <!-- Question two -->
                    <div>
                        <dt>
                            <button @click="openArtisansQuestionTwo = !openArtisansQuestionTwo">
                                <!-- Question -->
                                <div>
                                    Can I update information about my products?
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openArtisansQuestionTwo">
                            <!-- Answer -->
                            <p>Yes, you can update product information and images through the 'Edit Product' option in
                                your profile.</p>
                        </dd>
                    </div>

                    <!-- Question three -->
                    <div>
                        <dt>
                            <button @click="openArtisansQuestionThree = !openArtisansQuestionThree">
                                <!-- Question -->
                                <div>
                                    How do I manage my orders?
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openArtisansQuestionThree">
                            <!-- Answer -->
                            <p>The 'Dashboard' provides a personalized overview of your pending and completed orders.
                            </p>
                        </dd>
                    </div>

                    <!-- Question four -->
                    <div>
                        <dt>
                            <button @click="openArtisansQuestionFour = !openArtisansQuestionFour">
                                <!-- Question -->
                                <div>
                                    Can I remove my products from the marketplace?
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openArtisansQuestionFour">
                            <!-- Answer -->
                            <p>Yes, you have the option to delete your products from the marketplace using the 'Delete
                                Product' feature.</p>
                        </dd>
                    </div>
                </dl>
            </li>
        </ul>
    </div>
</x-app-layout>