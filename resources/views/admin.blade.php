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
        @foreach($canciones as $canciones)
        <tr>
            <td>{{$song->id}}</td>
            <td>{{$song->nombre_cancion}}</td>
            <td>{{$song->likes}}</td>
            <td>{{$song->reproduciones}}/td>
            <td>{{$song->restriccion_etaria}}</td>
            <td>{{$song->id_album}}</td>
            <td>{{$song->id_genre}}</td>
            <td>{{$song->id_artist}}</td>
            <td>{{$song->borrado}}</td>
            <td>{{$song->url_cancion}}</td>
            <td>Editar | Borrar</td>
        </tr>
        @endforeach
    </tbody>
</table>
