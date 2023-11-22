<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    {{ "Hello " . Auth::user()->name . " ur email is " . Auth::user()->email}}
                </div>
            </div>
        </div>
    </div>


    @csrf
    <div class="container text-center">
        <h1 class="text-center">Bienvenido {{ Auth::user()->name }}. Estas son tus sugerencias.</h1>

        @if($todasSugerencias->count() > 0)
        <ul>
            @foreach($todasSugerencias as $sugerencia)
            <li>{{ "id sugerencia: " .$sugerencia->id }} </li>
            <li>{{ "creada en: " .$sugerencia->created_at }}</li>
            <li>{{ "sugerencia: " .$sugerencia->mensaje}}</li>
            <li>
                <form method="POST" action="{{ route('borrarSugerencia' , $sugerencia) }}">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Eliminar </button>
                </form>

                <form method="POST" action="{{ route('editarSugerencia' , $sugerencia) }}">
                    @csrf
                    <input type="text" name="mensaje" value="{{ $sugerencia->mensaje}}">
                    <input type="number" name ="id" value ="{{ $sugerencia->id }} " hidden>
                    <button type="submit">Editar </button>
                </form>
            </li>
            @endforeach
        </ul>
        @else
        <p>No hay sugerencias disponibles.</p>
        @endif
        <div class="form-group">

        </div>

</x-app-layout>