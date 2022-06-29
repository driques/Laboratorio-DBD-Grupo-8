@if (count ($canciones))
    @foreach ($canciones as $item)
        <p class ="p-2 border-bottom" >
            {{$item->id.'-'.$item->nombre_cancion}}

            <button onclick="getSong('{{$item->nombre_cancion}}'); limpiar(); getUrl('{{$item->url_cancion}}');">Reproducir</button>
        </p>
        @endforeach
    @endif