<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">
            Create FAQ
        </h1>

        <form
            method="POST"
            action="{{ route('faq.store') }}"
        >

            @csrf

            <!-- Question -->
            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Question
                </label>

                <input
                    type="text"
                    name="question"
                    class="w-full border rounded p-2"
                    value="{{ old('question') }}"
                >

            </div>

            <!-- Answer -->
            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Answer
                </label>

                <textarea
                    name="answer"
                    rows="5"
                    class="w-full border rounded p-2"
                >{{ old('answer') }}</textarea>

            </div>

            <!-- Category -->
            <div class="mb-6">

                <label class="block mb-2 font-bold">
                    Category
                </label>

                <select
                    name="f_a_q_category_id"
                    class="w-full border rounded p-2"
                >

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded"
            >
                Create FAQ
            </button>

        </form>

    </div>

</x-app-layout>
