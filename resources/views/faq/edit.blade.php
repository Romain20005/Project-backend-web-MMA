<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">
            Edit FAQ
        </h1>

        <form
            method="POST"
            action="{{ route('faq.update', $faq) }}"
        >

            @csrf
            @method('PATCH')

            <!-- Question -->
            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Question
                </label>

                <input
                    type="text"
                    name="question"
                    value="{{ old('question', $faq->question) }}"
                    class="w-full border rounded p-2"
                >

            </div>

            <!-- Answer -->
            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Answer
                </label>

                <textarea
                    name="answer"
                    rows="6"
                    class="w-full border rounded p-2"
                >{{ old('answer', $faq->answer) }}</textarea>

            </div>

            <!-- Category -->
            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Category
                </label>

                <select
                    name="f_a_q_category_id"
                    class="w-full border rounded p-2"
                >

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected($faq->f_a_q_category_id == $category->id)
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>

            <button
                type="submit"
                class="bg-yellow-500 text-white px-4 py-2 rounded"
            >
                Update FAQ
            </button>

        </form>

    </div>

</x-app-layout>
