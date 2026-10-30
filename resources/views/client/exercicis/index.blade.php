<x-app-layout>

    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">
            Exercicis - {{ $categoria->nom }}
        </h1>

        <div class="grid grid-cols-2 gap-4">
            @foreach($exercicis as $ex)
                <div class="p-4 bg-white shadow rounded">
                    
                    <h3 class="font-bold">{{ $ex->nom }}</h3>

                    <p>{{ $ex->descripcio }}</p>

                    @if($ex->imatge)
                        <img src="{{ $ex->imatge }}" class="mt-2 w-full">
                    @endif

                </div>
            @endforeach
        </div>

    </div>

</x-app-layout>