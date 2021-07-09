<title>vacuNacion | Editar rol de {{$usuario->name}}</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-200 border-b border-gray-200 shadow-lg">
                    Nuevo rol de {{$usuario->name}}

                    <br>
                    <br>
                    <hr />
                    <form action="{{route('user.update', $usuario)}}" method="POST">

                        @csrf
                        @method('PUT')

                        <br>
                        <label>
                            <b>Rol</b>
                            <br>
                            <input type="radio" id="admin" name="role" value="admin">
                            <label for="admin">Administrador</label><br>
                            <input type="radio" id="moderador" name="role" value="moderador">
                            <label for="admin">Moderador</label><br>
                        </label>
                        <br>
                        <br>
                        <hr />
                        <br>
                        <button class="bg-green-400 hover:bg-green-100 text-white-800 font-bold py-3 px-6 border border-gray-400 rounded shadow" type="submit">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>