<x-app-layout>
    <div role="alert" class="mt-10 mx-4">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
          Crear una incidencia
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            {!! Form::open(['route' =>'incidencias.store']) !!}
            @include('incidencias.partials.form')

            {!! Form::submit('Crear Incidencia', ['class' => 'btn btn-primary mt-2']) !!}
    {!! Form::close() !!}
        </div>
      </div>

</x-app-layout>
