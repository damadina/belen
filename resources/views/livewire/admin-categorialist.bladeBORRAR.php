<div>
    <div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria )

                    <tr>

                        <td>{{$categoria->name}}</td>

                        <td width="10px">
                            <a class="btn btn-secondary"  href="{{route('admin.categorias.edit',$categoria)}}">Editar</a>
                        </td>

                        <td width="10px">
                            <form class="formulario-eliminar" action="{{route('admin.categorias.destroy',$categoria)}}" method="POST">
                                 @method('delete')
                                 @csrf
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                @empty
                    <tr>
                        <td colspan="4">No hay ninguna categoria refistrada</td>
                    </tr>
                @endforelse

            </tbody>

        </table>


    </div>

</div>
