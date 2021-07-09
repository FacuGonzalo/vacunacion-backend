<title>vacuNacion | {{$usuario->name}}</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$usuario->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-200 border-b border-gray-200 shadow-lg">
                    Datos del usuario:
                    <br>
                    <br>
                    <b>Nombre: {{$usuario->name}}</b>
                    <br>
                    <b>Email:</b> {{$usuario->email}}
                    <br>
                    <b>Rol:</b> {{$usuario->role}}
                    <br>
                    <br>
                    <a class="container mx-auto bg-white text-black font-bold py-2 px-4 border-b-4 hover:border-b-2 hover:border-t-2 border-blue-dark hover:border-blue rounded" href="{{route('user.edit', $usuario)}}">Editar Rol</a>
                    <br>
                    <br>
                    <hr />
                    <br>
                    <form action="{{route('user.destroy', $usuario)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-400 hover:bg-red-100 text-white-800 font-bold py-3 px-6 border border-gray-400 rounded shadow">Eliminar usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>