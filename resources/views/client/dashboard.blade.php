<x-app-layout>

    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6">
            Benvingut {{ auth()->user()->name }}
        </h1>

        {{-- CATEGORIES --}}
        <h2 class="text-xl font-semibold mb-4">Categories</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">

            @foreach($categories ?? [] as $cat)

                <div class="p-4 bg-white shadow rounded">

                    <h3 class="font-bold text-lg">
                        {{ $cat->nom }}
                    </h3>

                    <p class="text-sm text-gray-600">
                        {{ $cat->descripcio }}
                    </p>

                    <a class="text-blue-500 mt-2 inline-block hover:underline"
                       href="{{ route('categories.exercicis', $cat->id) }}">
                        Veure exercicis →
                    </a>

                </div>

            @endforeach

        </div>

        <br>
        <br>

        {{-- RUTINES --}}
        <div class="flex items-center justify-between mb-4">

            <h2 class="text-xl font-semibold">
                Les meves rutines
            </h2>

        </div>

        <div class="space-y-4">

            @forelse($rutines ?? [] as $r)

                <div class="p-4 bg-white shadow rounded">

                    <h3 class="font-bold text-lg">
                        {{ $r->nom }}
                    </h3>

                    <p class="text-sm text-gray-600">
                        {{ $r->descripcio }}
                    </p>

                    <p class="text-xs text-gray-500 mt-1">
                        {{ $r->duracio }} minuts
                    </p>

                    <a class="text-blue-500 mt-2 inline-block hover:underline"
                       href="{{ route('rutines.show', $r->id) }}">
                        Veure detall →
                    </a>

                </div>

            @empty

                <p class="text-gray-500">
                    No tens rutines encara
                </p>

            @endforelse

        </div>

    </div>

</x-app-layout>