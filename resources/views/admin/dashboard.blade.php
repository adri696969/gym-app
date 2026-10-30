<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Panell Administrador
    </h1>

    {{-- CATEGORIES --}}
    <h2 class="text-xl font-semibold mb-2">Categories</h2>

    <table class="w-full bg-white shadow rounded mb-8">
        <tr class="border-b">
            <th class="p-2 text-center">Nom</th>
            <th class="p-2 text-center">Accions</th>
        </tr>

        @foreach($categories as $cat)
            <tr class="border-b">
                <td class="p-2 text-center">{{ $cat->nom }}</td>
                <td class="p-2 text-center">

                    <a href="{{ route('admin.categories.edit', $cat) }}"
                       class="text-blue-600">
                        Editar
                    </a>

                    <form action="{{ route('admin.categories.destroy', $cat) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="text-red-600 ml-2">
                            Eliminar
                        </button>

                    </form>

                </td>
            </tr>
        @endforeach
    </table>
    <br>

    <a href="{{ route('admin.categories.create', $cat) }}" style="background:#1e3a8a;color:white;padding:10px 20px;border-radius:8px;">
            Crear Categoria
    </a>

    <br>
    


    <br>
    <br>


    {{-- EXERCICIS --}}
    <h2 class="text-xl font-semibold mb-2">Exercicis</h2>

    <table class="w-full bg-white shadow rounded">
        <tr class="border-b">
            <th class="p-2 text-center">Nom</th>
            <th class="p-2 text-center">Categoria</th>
            <th class="p-2 text-center">Accions</th>
        </tr>

        @foreach($exercicis as $ex)
            <tr class="border-b">
                <td class="p-2 text-center">{{ $ex->nom }}</td>
                <td class="p-2 text-center">{{ $ex->categoria->nom ?? '' }}</td>
                <td class="p-2 text-center">

                    <a href="{{ route('admin.exercicis.edit', $ex) }}"
                       class="text-blue-600">
                        Editar
                    </a>

                    <form action="{{ route('admin.exercicis.destroy', $ex) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="text-red-600 ml-2">
                            Eliminar
                        </button>

                    </form>

                </td>
            </tr>
        @endforeach
    </table>

    <br>

    <a href="{{ route('admin.exercicis.create', $cat) }}" style="background:#1e3a8a;color:white;padding:10px 20px;border-radius:8px;">
            Crear Exercici
    </a>

</div>

</x-app-layout>