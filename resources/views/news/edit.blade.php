<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">
            Edit News Article
        </h1>

        <form method="POST"
              action="{{ route('news.update', $news) }}">

            @csrf
            @method('PATCH')

            <!-- Title -->
            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    class="w-full border rounded p-2"
                    value="{{ old('title', $news->title) }}"
                >

            </div>

            <!-- Content -->
            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Content
                </label>

                <textarea
                    name="content"
                    rows="6"
                    class="w-full border rounded p-2"
                >{{ old('content', $news->content) }}</textarea>

            </div>

            <!-- Publication Date -->
            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Publication Date
                </label>

                <input
                    type="date"
                    name="published_at"
                    class="w-full border rounded p-2"
                    value="{{ old('published_at', $news->published_at) }}"
                >

            </div>

            <button
                type="submit"
                class="bg-yellow-500 text-white px-4 py-2 rounded"
            >
                Update Article
            </button>

        </form>

    </div>

</x-app-layout>
