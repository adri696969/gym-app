<x-app-layout>

<div class="p-6">

    <h1 class="text-xl font-bold mb-4">
        Crear rutina
    </h1>

    <form method="POST" action="{{ route('rutines.store') }}">
        @csrf

        <input class="border p-2 w-full mb-3"
               name="nom"
               placeholder="Nom rutina">

        <br>
        <br>

        <textarea class="border p-2 w-full mb-3"
                  name="descripcio"
                  placeholder="Descripció"></textarea>

        <br>
        <br>
        
        <input class="border p-2 w-full mb-3"
               type="number"
               name="duracio"
               placeholder="Duració (minuts)">

        <br>
        <br>

        <button type="submit" style="background:#1e3a8a;color:white;padding:10px 20px;border-radius:8px;">
            Guardar
        </button>

    </form>

</div>

</x-app-layout>sig