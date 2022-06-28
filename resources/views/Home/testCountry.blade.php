<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="mb-3">
        <label for="ID_Pais" class="form-label">País</label>
        <select class="form-select mb-4" aria-label="Seleccione un país:" name="ID_Pais" id="ID_Pais">
            @foreach ($countries as $country)
            <option value="{{$country->id}}">{{$country->name_country}}</option>
            @endforeach
        </select>
    </div>

</body>

</html>