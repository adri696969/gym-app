<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Nova categoria
    </h1>

    <form method="POST" action="{{ route('admin.categories.store') }}"
          class="bg-white p-6 shadow rounded">

        @csrf

        {{-- NOM --}}
        <div class="mb-4">
            <label class="block font-semibold">Nom</label>
            <input type="text"
                   name="nom"
                   class="border w-full p-2 rounded"
                   required>
        </div>

        {{-- DESCRIPCIO --}}
        <div class="mb-4">
            <label class="block font-semibold">Descripció</label>
            <textarea name="descripcio"
                      class="border w-full p-2 rounded"></textarea>
        </div>

        <button type="submit" style="background:#1e3a8a;color:white;padding:10px 20px;border-radius:8px;">
            Guardar
        </button>

    </form>

</div>

</x-app-layout>