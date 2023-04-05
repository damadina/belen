<div>
    <div class="card-header">
        <a href="{{route('admin.users.create')}}">Nuevo trabajador</a>
    </div>
   <div class="card">
        <div class="card-header">
            <input wire:model='search' class="form-control w-100" placeholder="Escriba un nombre">
        </div>
        @if ($users->count())

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user )
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>


                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('admin.users.edit',$user)}}">Editar</a>
                                </td>


                                <td width="10px">

                                <a wire:click="$emit('deleteUser',{{$user->id}})" class="btn btn-danger">Eliminar</a>

                                </td>



                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="card-footer">
                {{$users->links()}}
            </div>
            @else
            <div class="card-body">
                <strong>No hay ningún usuario con ese nombre</strong>
            </div>
        @endif
    </div>


</div>
