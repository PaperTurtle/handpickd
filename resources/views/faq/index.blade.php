<x-app-layout>
    <div class="container mx-auto px-4 pb-24 pt-16 sm:px-6 max-w-4xl lg:px-8 text-text"
        x-data="{ chosenTopic : 'general' }" x-cloak>
        <h2 class="text-3xl font-bold">FAQ / Support</h2>
        <h2 class="text-2xl mt-10">Frequently asked questions</h2>
        <div class="flex justify-between mt-5">

            <label
                class="bg-white border-2 border-grey-300 rounded-md px-5 py-3 mr-2 text-xl text-center font-bold w-full cursor-pointer"
                :class="{'border-accent' : chosenTopic === 'general'}">
                <input type="radio" name="topic" value="general" class="sr-only" x-model="chosenTopic">General</input>
            </label>

            <label
                class="bg-white border-2 border-grey-300 rounded-md px-5 py-3 mr-2 text-xl text-center font-bold w-full cursor-pointer"
                :class="{'border-accent' : chosenTopic === 'customers'}">
                <input type="radio" name="topic" value="customers" class="sr-only" x-model="chosenTopic">For our
                Customers</input>
            </label>

            <label
                class="bg-white border-2 border-grey-300 rounded-md px-5 py-3 text-xl text-center font-bold w-full cursor-pointer"
                :class="{'border-accent' : chosenTopic === 'artisans'}">
                <input type="radio" name="topic" value="artisans" class="sr-only" x-model="chosenTopic">For our
                Artisans</input>
            </label>
        </div>
        <ul>
            <li x-show="chosenTopic === 'general'"
                x-data="{openGeneralQuestionOne: false, openGeneralQuestionTwo: false, openGeneralQuestionThree: false}">
                <dl>
                    <!-- Question One -->
                    <div class="border-t border-gray-300 mt-6 pt-4">
                        <dt>
                            <button @click="openGeneralQuestionOne = !openGeneralQuestionOne"
                                class="text-left text-base font-bold w-full flex"
                                :class="{'mb-2' : openGeneralQuestionOne}">
                                <!-- Question -->
                                <div>
                                    What is Handpickd?
                                </div>
                                <!-- closed -->
                                <svg x-show="!openGeneralQuestionOne" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                <!-- open -->
                                <svg x-show="openGeneralQuestionOne" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
                            </button>
                        </dt>
                        <dd x-show="openGeneralQuestionOne">
                            <!-- Answer -->
                            <p>Handpickd is a digital marketplace dedicated to showcasing unique, handcrafted items. It
                                connects artisans with enthusiasts who value bespoke creations.</p>
                        </dd>
                    </div>

                    <!-- Question two -->
                    <div class="border-t border-gray-300 mt-4 pt-4">
                        <dt>
                            <button @click="openGeneralQuestionTwo = !openGeneralQuestionTwo"
                                class="text-left text-base font-bold w-full flex" :class="{'mb-2' : openGeneralQuestionTwo}">
                                <!-- Question -->
                                <div>
                                    Who can use Handpickd?
                                </div>
                                <!-- closed -->
                                <svg x-show="!openGeneralQuestionTwo" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                <!-- open -->
                                <svg x-show="openGeneralQuestionTwo" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
                            </button>
                        </dt>
                        <dd x-show="openGeneralQuestionTwo">
                            <!-- Answer -->
                            <p>Handpickd is designed for both artisans who create handcrafted goods and individuals
                                looking for unique, handmade products.</p>
                        </dd>
                    </div>

                    <!-- Question three -->
                    <div class="border-y border-gray-300 mt-4 py-4">
                        <dt>
                            <button @click="openGeneralQuestionThree = !openGeneralQuestionThree"
                                class="text-left text-base font-bold w-full flex"
                                :class="{'mb-2' : openGeneralQuestionThree}">
                                <!-- Question -->
                                <div>
                                    Who are the authors of Handpickd?
                                </div>
                                <!-- closed -->
                                <svg x-show="!openGeneralQuestionThree" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                <!-- open -->
                                <svg x-show="openGeneralQuestionThree" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
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
            <li x-show="chosenTopic === 'customers'"
                x-data="{openCustomersQuestionOne: false, openCustomersQuestionTwo: false, openCustomersQuestionThree: false}">
                <dl>
                    <!-- Question One -->
                    <div class="border-t border-gray-300 mt-6 pt-4">
                        <dt>
                            <button @click="openCustomersQuestionOne = !openCustomersQuestionOne"
                                class="text-left text-base font-bold w-full flex"
                                :class="{'mb-2' : openCustomersQuestionOne}">
                                <!-- Question -->
                                <div>
                                    How do I find products on Handpickd?
                                </div>
                                <!-- closed -->
                                <svg x-show="!openCustomersQuestionOne" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                <!-- open -->
                                <svg x-show="openCustomersQuestionOne" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
                            </button>
                        </dt>
                        <dd x-show="openCustomersQuestionOne">
                            <!-- Answer -->
                            <p>You can browse products by category, price range, and reviews, or use the search bar to
                                find products by keywords.</p>
                        </dd>
                    </div>

                    <!-- Question two -->
                    <div class="border-t border-gray-300 mt-4 pt-4">
                        <dt>
                            <button @click="openCustomersQuestionTwo = !openCustomersQuestionTwo"
                                class="text-left text-base font-bold w-full flex"
                                :class="{'mb-2' : openCustomersQuestionTwo}">
                                <!-- Question -->
                                <div>
                                    Can I review and rate products?
                                </div>
                                <!-- closed -->
                                <svg x-show="!openCustomersQuestionTwo" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                <!-- open -->
                                <svg x-show="openCustomersQuestionTwo" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
                            </button>
                        </dt>
                        <dd x-show="openCustomersQuestionTwo">
                            <!-- Answer -->
                            <p>Yes, users can post and update reviews for products, providing valuable feedback to the
                                community.</p>
                        </dd>
                    </div>

                    <!-- Question three -->
                    <div class="border-y border-gray-300 mt-4 py-4">
                        <dt>
                            <button @click="openCustomersQuestionThree = !openCustomersQuestionThree"
                                class="text-left text-base font-bold w-full flex"
                                :class="{'mb-2' : openCustomersQuestionThree}">
                                <!-- Question -->
                                <div>
                                    How does the shopping cart and checkout process work?
                                </div>
                                <!-- closed -->
                                <svg x-show="!openCustomersQuestionThree" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                <!-- open -->
                                <svg x-show="openCustomersQuestionThree" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
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
            <li x-show="chosenTopic === 'artisans'"
                x-data="{openArtisansQuestionOne: false, openArtisansQuestionTwo: false, openArtisansQuestionThree: false, openArtisansQuestionFour: false}">
                <dl>
                    <!-- Question One -->
                    <div class="border-t border-gray-300 mt-6 pt-4">
                        <dt>
                            <button @click="openArtisansQuestionOne = !openArtisansQuestionOne"
                                class="text-left text-base font-bold w-full flex"
                                :class="{'mb-2' : openArtisansQuestionOne}">
                                <!-- Question -->
                                <div>
                                    How can I list my products on Handpickd?
                                </div>
                                <!-- closed -->
                                <svg x-show="!openArtisansQuestionOne" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                <!-- open -->
                                <svg x-show="openArtisansQuestionOne" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
                            </button>
                        </dt>
                        <dd x-show="openArtisansQuestionOne">
                            <!-- Answer -->
                            <p>Once registered, you can list your handmade items under the 'Products' section by
                                providing detailed descriptions and images.</p>
                        </dd>
                    </div>

                    <!-- Question two -->
                    <div class="border-t border-gray-300 mt-4 pt-4">
                        <dt>
                            <button @click="openArtisansQuestionTwo = !openArtisansQuestionTwo"
                                class="text-left text-base font-bold w-full flex"
                                :class="{'mb-2' : openArtisansQuestionTwo}">
                                <!-- Question -->
                                <div>
                                    Can I update information about my products?
                                </div>
                                <!-- closed -->
                                <svg x-show="!openArtisansQuestionTwo" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                <!-- open -->
                                <svg x-show="openArtisansQuestionTwo" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
                            </button>
                        </dt>
                        <dd x-show="openArtisansQuestionTwo">
                            <!-- Answer -->
                            <p>Yes, you can update product information and images through the 'Edit Product' option in
                                your profile.</p>
                        </dd>
                    </div>

                    <!-- Question three -->
                    <div class="border-t border-gray-300 mt-4 pt-4">
                        <dt>
                            <button @click="openArtisansQuestionThree = !openArtisansQuestionThree"
                                class="text-left text-base font-bold w-full flex"
                                :class="{'mb-2' : openArtisansQuestionThree}">
                                <!-- Question -->
                                <div>
                                    How do I manage my orders?
                                </div>
                                <!-- closed -->
                                <svg x-show="!openArtisansQuestionThree" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                <!-- open -->
                                <svg x-show="openArtisansQuestionThree" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
                            </button>
                        </dt>
                        <dd x-show="openArtisansQuestionThree">
                            <!-- Answer -->
                            <p>The 'Dashboard' provides a personalized overview of your pending and completed orders.
                            </p>
                        </dd>
                    </div>

                    <!-- Question four -->
                    <div class="border-y border-gray-300 mt-4 py-4">
                        <dt>
                            <button @click="openArtisansQuestionFour = !openArtisansQuestionFour"
                                class="text-left text-base font-bold w-full flex"
                                :class="{'mb-2' : openArtisansQuestionFour}">
                                <!-- Question -->
                                <div>
                                    Can I remove my products from the marketplace?
                                </div>
                                <!-- closed -->
                                <svg x-show="!openArtisansQuestionFour" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                <!-- open -->
                                <svg x-show="openArtisansQuestionFour" class="h-6 w-6 ml-auto" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
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
        <div class="mt-10 text-xl">
            Can't find the answer to your question?<br>
            <div class="md:flex">
                <p class="font-bold mr-3">
                    Contact our support:
                </p>
                <a href="mailto:">handpickd.shop@gmail.com
                </a>
            </div>
        </div>
    </div>
</x-app-layout>