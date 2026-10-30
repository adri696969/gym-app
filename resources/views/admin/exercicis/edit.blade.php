<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Editar exercici
    </h1>

    <form method="POST"
          action="{{ route('admin.exercicis.update', $exercici) }}"
          class="bg-white p-6 shadow rounded">

        @csrf
        @method('PUT')

        {{-- NOM --}}
        <div class="mb-4">
            <label class="block font-semibold">Nom</label>
            <input type="text"
                   name="nom"
                   value="{{ $exercici->nom }}"
                   class="border w-full p-2 rounded"
                   required>
        </div>

        {{-- DESCRIPCIO --}}
        <div class="mb-4">
            <label class="block font-semibold">Descripció</label>
            <textarea name="descripcio"
                      class="border w-full p-2 rounded">{{ $exercici->descripcio }}</textarea>
        </div>

        {{-- IMATGE --}}
        <div class="mb-4">
            <label class="block font-semibold">Imatge</label>
            <input type="text"
                   name="imatge"
                   value="{{ $exercici->imatge }}"
                   class="border w-full p-2 rounded">
        </div>

        {{-- CATEGORIA --}}
        <div class="mb-4">
            <label class="block font-semibold">Categoria</label>

            <select name="categoria_id"
                    class="border w-full p-2 rounded">

                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ $exercici->categoria_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nom }}
                    </option>
                @endforeach

            </select>
        </div>

        <button type="submit" style="background:#1e3a8a;color:white;padding:10px 20px;border-radius:8px;">
            Actualitzar
        </button>

    </form>

</div>

</x-app-layout>