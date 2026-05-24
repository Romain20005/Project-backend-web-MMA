<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">
            Create News Article
        </h1>

        <form method="POST"
              action="{{ route('news.store') }}"
              enctype="multipart/form-data">

            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label class="block mb-2 font-bold">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    class="w-full border rounded p-2"
                    value="{{ old('title') }}"
                >

                @error('title')
                <p class="text-red-500">
                    {{ $message }}
                </p>
                @enderror
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
                >{{ old('content') }}</textarea>

                @error('content')
                <p class="text-red-500">
                    {{ $message }}
                </p>
                @enderror
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
                    value="{{ old('published_at') }}"
                >

                @error('published_at')
                <p class="text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mt-4">

                <label for="image" class="text-white block mb-2">
                    News Image
                </label>

                <input
                    type="file"
                    name="image"
                    id="image"
                    class="text-white"
                >

            </div>

            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded"
            >
                Create Article
            </button>

        </form>

    </div>

</x-app-layout>
