<x-app-layout>

    <div class="p-6">

        {{-- INFO RUTINA --}}
        <div class="mb-6">

            <h1 class="text-2xl font-bold">
                {{ $rutina->nom }}
            </h1>

            <p class="text-gray-600">
                {{ $rutina->descripcio }}
            </p>

            <p class="text-sm text-gray-500 mt-1">
                Duració estimada: {{ $rutina->duracio }} minuts
            </p>

        </div>

        {{-- EXERCICIS DE LA RUTINA --}}
        <h2 class="text-xl font-semibold mb-4">
            Exercicis
        </h2>

        <div class="space-y-4 mb-8">

            @forelse($rutina->exercicis as $ex)

                <div class="p-4 bg-white shadow rounded flex justify-between items-center">

                    <div>

                        <h3 class="font-bold text-lg">
                            {{ $ex->nom }}
                        </h3>

                        <p class="text-gray-600 text-sm">
                            {{ $ex->descripcio }}
                        </p>

                        <p class="text-sm mt-1 text-gray-700">
                            Sèries: <strong>{{ $ex->pivot->series }}</strong>
                            · Repeticions: <strong>{{ $ex->pivot->repeticions }}</strong>
                        </p>

                    </div>

                    {{-- ELIMINAR EXERCICI --}}
                    <form method="POST"
                          action="{{ route('rutines.exercicis.remove', [$rutina->id, $ex->id]) }}">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="text-red-600 hover:underline">
                            Eliminar
                        </button>

                    </form>

                </div>

            @empty

                <p class="text-gray-500">
                    Aquesta rutina encara no té exercicis
                </p>

            @endforelse

        </div>

        <hr class="my-6">

        {{-- AFEGIR EXERCICIS --}}
        <h2 class="text-xl font-bold mb-4">
            Afegir exercicis
        </h2>

        @if(isset($exercicis) && count($exercicis) > 0)

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                @foreach($exercicis as $ex)

                    <div class="p-4 bg-white shadow rounded">

                        <h3 class="font-bold">
                            {{ $ex->nom }}
                        </h3>

                        <form method="POST"
                              action="{{ route('rutines.exercicis.add', $rutina->id) }}">

                            @csrf

                            <input type="hidden" name="exercici_id" value="{{ $ex->id }}">

                            <input type="number"
                                   name="series"
                                   placeholder="Sèries"
                                   class="border p-2 w-full mt-2"
                                   required>

                            <input type="number"
                                   name="repeticions"
                                   placeholder="Repeticions"
                                   class="border p-2 w-full mt-2"
                                   required>

                            <br>
                            <br>

                            <button type="submit" style="background:#1e3a8a;color:white;padding:10px 20px;border-radius:8px;">
                                Guardar
                            </button>

                        </form>

                    </div>

                @endforeach

            </div>

        @else

            <p class="text-gray-500">
                No hi ha exercicis disponibles
            </p>

        @endif

    </div>

</x-app-layout>