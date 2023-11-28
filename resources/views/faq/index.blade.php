<x-app-layout>
    <div class="container" x-data="{ openGeneral: true, openForCustomers: false, openForArtisans: false }">
        <h2>FAQ / Support</h2>
        <h2>Frequently asked questions</h2>
        <div class="flex w-fit">
            <button class="border-2 rounded-md px-3 border-accent"
                @click="openGeneral = !openGeneral, openForCustomers = false, openForArtisans = false">General</button>
            <button class="border-2 rounded-md px-3 border-accent"
                @click="openForCustomers = !openForCustomers, openGeneral = false, openForArtisans = false">For our
                Customers</button>
            <button class="border-2 rounded-md px-3 border-accent"
                @click="openForArtisans = !openForArtisans, openGeneral = false, openForCustomers = false">For our
                Artisans</button>
        </div>
        <ul>
            <li x-show="openGeneral" x-data="{openGeneralQuestionOne: false, openGeneralQuestionTwo: false, openGeneralQuestionThree: false}">
                <dl>
                    <!-- Question One -->
                    <div>
                        <dt>
                            <button @click="openGeneralQuestionOne = !openGeneralQuestionOne">
                                <!-- Question -->
                                <div>
                                    question 1
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openGeneralQuestionOne">
                            <!-- Answer -->
                            <p>answer 1</p>
                        </dd>
                    </div>

                    <!-- Question two -->
                    <div>
                        <dt>
                            <button @click="openGeneralQuestionTwo = !openGeneralQuestionTwo">
                                <!-- Question -->
                                <div>
                                    question 2
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openGeneralQuestionTwo">
                            <!-- Answer -->
                            <p>answer 2</p>
                        </dd>
                    </div>

                    <!-- Question three -->
                    <div>
                        <dt>
                            <button @click="openGeneralQuestionThree = !openGeneralQuestionThree">
                                <!-- Question -->
                                <div>
                                    question 3
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openGeneralQuestionThree">
                            <!-- Answer -->
                            <p>answer 3</p>
                        </dd>
                    </div>
                </dl>
            </li>
            <!-- Customers -->
            <li x-show="openForCustomers" x-data="{openCustomersQuestionOne: false, openCustomersQuestionTwo: false, openCustomersQuestionThree: false}">
                <dl>
                    <!-- Question One -->
                    <div>
                        <dt>
                            <button @click="openCustomersQuestionOne = !openCustomersQuestionOne">
                                <!-- Question -->
                                <div>
                                    question 1
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openCustomersQuestionOne">
                            <!-- Answer -->
                            <p>answer 1</p>
                        </dd>
                    </div>

                    <!-- Question two -->
                    <div>
                        <dt>
                            <button @click="openCustomersQuestionTwo = !openCustomersQuestionTwo">
                                <!-- Question -->
                                <div>
                                    question 2
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openCustomersQuestionTwo">
                            <!-- Answer -->
                            <p>answer 2</p>
                        </dd>
                    </div>

                    <!-- Question three -->
                    <div>
                        <dt>
                            <button @click="openCustomersQuestionThree = !openCustomersQuestionThree">
                                <!-- Question -->
                                <div>
                                    question 3
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openCustomersQuestionThree">
                            <!-- Answer -->
                            <p>answer 3</p>
                        </dd>
                    </div>
                </dl>
            </li>
            <!-- Artisans -->
            <li x-show="openForArtisans" x-data="{openArtisansQuestionOne: false, openArtisansQuestionTwo: false, openArtisansQuestionThree: false, openArtisansQuestionFour: false}">
                <dl>
                    <!-- Question One -->
                    <div>
                        <dt>
                            <button @click="openArtisansQuestionOne = !openArtisansQuestionOne">
                                <!-- Question -->
                                <div>
                                    question 1
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openArtisansQuestionOne">
                            <!-- Answer -->
                            <p>answer 1</p>
                        </dd>
                    </div>

                    <!-- Question two -->
                    <div>
                        <dt>
                            <button @click="openArtisansQuestionTwo = !openArtisansQuestionTwo">
                                <!-- Question -->
                                <div>
                                    question 2
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openArtisansQuestionTwo">
                            <!-- Answer -->
                            <p>answer 2</p>
                        </dd>
                    </div>

                    <!-- Question three -->
                    <div>
                        <dt>
                            <button @click="openArtisansQuestionThree = !openArtisansQuestionThree">
                                <!-- Question -->
                                <div>
                                    question 3
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openArtisansQuestionThree">
                            <!-- Answer -->
                            <p>answer 3</p>
                        </dd>
                    </div>
                    
                    <!-- Question four -->
                    <div>
                        <dt>
                            <button @click="openArtisansQuestionFour = !openArtisansQuestionFour">
                                <!-- Question -->
                                <div>
                                    question 4
                                </div>
                            </button>
                        </dt>
                        <dd x-show="openArtisansQuestionFour">
                            <!-- Answer -->
                            <p>answer 4</p>
                        </dd>
                    </div>
                </dl>
            </li>
        </ul>
    </div>
</x-app-layout>