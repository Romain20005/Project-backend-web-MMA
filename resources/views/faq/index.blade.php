<x-app-layout>

    <div class="max-w-5xl mx-auto py-10">

        <h1 class="text-4xl font-bold mb-8">
            Frequently Asked Questions
        </h1>

        @forelse($categories as $category)

            <div class="mb-10">

                <h2 class="text-2xl font-bold mb-4 text-blue-500">
                    {{ $category->name }}
                </h2>

                @forelse($category->faqs as $faq)

                    <div class="bg-gray-800 text-white p-6 rounded-lg mb-4">

                        <h3 class="text-xl font-bold mb-2">
                            {{ $faq->question }}
                        </h3>

                        <p>
                            {{ $faq->answer }}
                        </p>

                        @auth

                            @if(auth()->user()->is_admin)

                                <a
                                    href="{{ route('faq.edit', $faq) }}"
                                    class="bg-yellow-500 text-white px-4 py-2 rounded inline-block mb-2"
                                >
                                    Edit FAQ
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('faq.destroy', $faq) }}"
                                    class="mt-4"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-red-600 text-white px-4 py-2 rounded"
                                    >
                                        Delete FAQ
                                    </button>

                                </form>

                            @endif

                        @endauth
                    </div>

                @empty

                    <p>No FAQs in this category.</p>

                @endforelse

            </div>

        @empty

            <p>No FAQ categories found.</p>

        @endforelse

    </div>

</x-app-layout>
