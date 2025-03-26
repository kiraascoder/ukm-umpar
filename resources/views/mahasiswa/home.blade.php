@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <header>
        <nav class="p-6">
            <div class="flex justify-between items-center">
            </div>
        </nav>
        <div class="container mx-auto bg-[#608BC1] h-96 rounded-md flex items-center">
            <div class="sm:ml-20 text-gray-50 text-center sm:text-left">
                <h1 class="text-5xl font-bold mb-4">
                    Book saunas <br />
                    everywhere.
                </h1>
                <p class="text-lg inline-block sm:block">The largest online community to rent saunas in Finland.</p>
                <button class="mt-8 px-4 py-2 bg-gray-600 rounded">Browse saunas</button>
            </div>
        </div>
    </header>

    <main class="py-16 container mx-auto px-6 md:px-0">
        <section>
            <div class="container mx-auto rounded-md text-center">
                <h1 class="text-5xl font-bold mb-4">
                    Book saunas <br />
                    everywhere.
                </h1>
                <p class="text-lg inline-block sm:block">The largest online community to rent saunas in Finland.</p>
            </div>
            <h1 class="text-3xl font-bold text-gray-600 mb-10">Explore exotic locations in Finland</h1>
            <div class="grid sm:grid-cols-3 gap-4 grid-cols-2">
                <div>
                    <div class="bg-gray-300 h-44"></div>
                    <h3 class="text-lg font-semibold text-gray-500 mt-2">Saunas in <span
                            class="text-gray-700">Helsinki</span></h3>
                </div>
                <div>
                    <div class="bg-gray-300 h-44"></div>
                    <h3 class="text-lg font-semibold text-gray-500 mt-2">Saunas in <span
                            class="text-gray-700">Rovaniemi</span></h3>
                </div>
                <div>
                    <div class="bg-gray-300 h-44"></div>
                    <h3 class="text-lg font-semibold text-gray-500 mt-2">Saunas in <span class="text-gray-700">Ruka</span>
                    </h3>
                </div>
            </div>

        </section>

        <section>
            <h1 class="inline-block text-gray-600 font-bold text-3xl mt-2">
                The holy sauna ritual <br />
                (or how does Saunatime work).
            </h1>

            <div class="grid grid-cols-3 gap-4 mt-10">
                <div>
                    <h3 class="text-lg font-semibold text-gray-500 mt-2">1. Browse and book</h3>
                    <p class="text text-gray-400">Start by searching for a location. Once you find a sauna you like,
                        simply check the availability, book it, and make a secure payment right away.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-500 mt-2">2. Have a great bath</h3>
                    <p class="text text-gray-400">Meet your host on the date you chose and enjoy the home sauna
                        experience. We'll handle the payment to the host after your experience.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-500 mt-2">3. Review the host</h3>
                    <p class="text text-gray-400">If you enjoyed the experience, let others know by giving a review to
                        your sauna host. This way others will know where to go.</p>
                </div>
            </div>
        </section>
    </main>

    <div class="mx-auto max-w-screen-2xl mb-6">
        <div class="mb-4 flex items-center justify-between gap-8 sm:mb-8 md:mb-12">
            <div class="flex items-center gap-12">
                <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl dark:text-white">Gallery</h2>

                <p class="hidden max-w-screen-sm text-gray-500 dark:text-gray-300 md:block">
                    This is a section of some simple filler text,
                    also known as placeholder text. It shares some characteristics of a real written text.
                </p>
            </div>

            <a href="#"
                class="inline-block rounded-lg border bg-white dark:bg-gray-700 dark:border-none px-4 py-2 text-center text-sm font-semibold text-gray-500 dark:text-gray-200 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">
                More
            </a>
        </div>

        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8">
            <!-- image - start -->
            <a href="#"
                class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600"
                    loading="lazy" alt="Photo by Minh Pham"
                    class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                <div
                    class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                </div>

                <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">VR</span>
            </a>
            <!-- image - end -->

            <!-- image - start -->
            <a href="#"
                class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:col-span-2 md:h-80">
                <img src="https://images.unsplash.com/photo-1542759564-7ccbb6ac450a?auto=format&q=75&fit=crop&w=1000"
                    loading="lazy" alt="Photo by Magicle"
                    class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                <div
                    class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                </div>

                <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">Tech</span>
            </a>
            <!-- image - end -->

            <!-- image - start -->
            <a href="#"
                class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:col-span-2 md:h-80">
                <img src="https://images.unsplash.com/photo-1610465299996-30f240ac2b1c?auto=format&q=75&fit=crop&w=1000"
                    loading="lazy" alt="Photo by Martin Sanchez"
                    class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                <div
                    class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                </div>

                <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">Dev</span>
            </a>
            <!-- image - end -->

            <!-- image - start -->
            <a href="#"
                class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&q=75&fit=crop&w=600"
                    loading="lazy" alt="Photo by Lorenzo Herrera"
                    class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                <div
                    class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                </div>

                <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">Retro</span>
            </a>
            <!-- image - end -->
        </div>
    </div>
@endsection
