@if (count ($canciones))
    @foreach ($canciones as $item)
        <p class ="p-2 border-bottom" >
            {{$item->id.'-'.$item->nombre_cancion}}
            <button onclick="redirect('{{$item->nombre_cancion}}','{{$item->url_cancion}}','{{$item->id}}')">Reproducir</button>
        </p>
        @endforeach
    @foreach($usuarios as $item)
    <p class ="p-2 border-bottom" >
        {{'Usuario '.$item->id.'-'.$item->name}}
        <button onclick="redirectToProfile('{{$item->id}}','{{$item->name}}')">Ir al perfil</button>
    </p>
    @endforeach
    @endif