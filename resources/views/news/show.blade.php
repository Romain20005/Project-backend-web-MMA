<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">

        <div class="bg-gray-800 text-white p-6 rounded-lg">

            <h1 class="text-4xl font-bold mb-4">
                {{ $news->title }}
            </h1>

            <p class="mb-6">
                {{ $news->content }}
            </p>

            <p class="text-sm text-gray-400">
                Published at:
                {{ $news->published_at }}
            </p>

            <p class="text-sm text-gray-400">
                By:
                {{ $news->user->username }}
            </p>

        </div>
        @auth

            @if(auth()->user()->is_admin)

                <div class="mt-6">

                    <a
                        href="{{ route('news.edit', $news) }}"
                        class="bg-yellow-500 text-white px-4 py-2 rounded"
                    >
                        Edit Article
                    </a>

                    <form
                        method="POST"
                        action="{{ route('news.destroy', $news) }}"
                        class="mt-4"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-600 text-white px-4 py-2 rounded"
                        >
                            Delete Article
                        </button>

                    </form>

                </div>

            @endif

        @endauth

    </div>

</x-app-layout>
