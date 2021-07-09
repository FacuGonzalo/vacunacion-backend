<title>vacuNacion | Usuarios</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-200 border-b border-gray-200 shadow-lg">
                    Estos son los usuarios registrados actualmente
                    <br>
                    <br>
                    <hr />
                    <ul>
                        <br>
                        @foreach($usuarios as $usuario)
                        <li>
                            <b><a href="{{route('user.show', $usuario->id)}}">{{$usuario->name}}</a></b>
                        </li>
                        <hr/>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>