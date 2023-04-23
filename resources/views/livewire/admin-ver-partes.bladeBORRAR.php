<div>
    <div class="container">
        <div class="w-100">
            <p class=" font-semibold text-center">Día </p>
        </div>
        <div class="row d-flex justify-content-center pt-2">
            <input class="w-36" type="date"  value="{{$fechaDesde}}" min="{{$fechaDesde}}"  wire:model='fechaDesde'>
        </div>
    </div>
    <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">Trabajo</th>
            <th scope="col">Asignado</th>
            <th scope="col">Estimado</th>
            <th scope="col">Creado</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($jornadas as $eachjornada )
                @foreach ($eachjornada->trabajos as $trabajo )

                    <tr>
                        <th scope="row">{{$trabajo->name}}</th>
                        <td>{{$eachjornada->user->name}}</td>
                        <td>{{$trabajo->horas}}</td>
                        <td>{{$trabajo->creado}}    </td>

                    </tr>


                @endforeach


            @endforeach

        </tbody>
      </table>

</div>
