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

    </div>

</x-app-layout>
