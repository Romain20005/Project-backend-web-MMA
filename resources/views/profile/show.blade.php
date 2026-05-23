<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">
        @if ($user->profile_picture)
            <img
                src="{{ asset('storage/' . $user->profile_picture) }}"
                alt="Profile Picture"
                class="w-32 h-32 rounded-full mb-4"
            >
        @endif
        <h1 class="text-3xl font-bold mb-4">
{{ $user->username }}
</h1>

<p class="mb-2">
    Name: {{ $user->name }}
</p>

<p class="mb-2">
    Email: {{ $user->email }}
</p>

<p class="mb-2">
    Birthday: {{ $user->birthday }}
</p>

<p class="mb-2">
    Bio: {{ $user->bio }}
</p>

</div>

</x-app-layout>
