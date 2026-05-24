<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">
            Latest News
        </h1>

        @forelse ($news as $article)

            <div class="bg-gray-800 text-white p-6 rounded-lg mb-4">

                @if ($article->image)

                    <img
                        src="{{ asset('storage/' . $article->image) }}"
                        alt="News Image"
                        class="w-full h-64 object-cover rounded mb-4"
                    >

                @endif

                <h2 class="text-2xl font-bold">
                    <a href="{{ route('news.show', $article) }}">
                        {{ $article->title }}
                    </a>
                </h2>

                <p class="mt-2">
                    {{ $article->content }}
                </p>

                <p class="mt-4 text-sm text-gray-400">
                    Published at:
                    {{ $article->published_at }}
                </p>

                <p class="text-sm text-gray-400">
                    By:
                    {{ $article->user->username }}
                </p>

            </div>

        @empty

            <p>No news articles found.</p>

        @endforelse

    </div>

</x-app-layout>
