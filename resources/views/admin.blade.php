<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Cancion</th>
            <th>Likes</th>
            <th>Reproducciones</th>
            <th>Restriccion</th>
            <th>Duracion</th>
            <th>Id Album</th>
            <th>Id Genero</th>
            <th>Borrado</th>
            <th>Url</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datosCanciones as $datosCanciones)
        <tr>
            <td>{{$datosCanciones->id}}</td>
            <td>{{$datosCanciones->nombre_cancion}}</td>
            <td>{{$datosCanciones->likes}}</td>
            <td>{{$datosCanciones->reproduciones}}/td>
            <td>{{$datosCanciones->restriccion_etaria}}</td>
            <td>{{$datosCanciones->id_album}}</td>
            <td>{{$datosCanciones->id_genre}}</td>
            <td>{{$datosCanciones->id_artist}}</td>
            <td>{{$datosCanciones->borrado}}</td>
            <td>{{$datosCanciones->url_cancion}}</td>
            <td>Editar | Borrar | Escuchar</td>
        </tr>
        @endforeach
    </tbody>
</table>
