<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">
            Contact Us
        </h1>
        @if(session('success'))

            <div class="bg-green-500 text-white p-4 rounded mb-6">
                {{ session('success') }}
            </div>

        @endif
        <form
            method="POST"
            action="{{ route('contact.store') }}"
        >

            @csrf

            <!-- Name -->
            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded p-2"
                >

            </div>

            <!-- Email -->
            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded p-2"
                >

            </div>

            <!-- Message -->
            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Message
                </label>

                <textarea
                    name="message"
                    rows="6"
                    class="w-full border rounded p-2"
                ></textarea>

            </div>

            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded"
            >
                Send Message
            </button>

        </form>

    </div>

</x-app-layout>
