<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relation</title>
</head>
<body>
    @foreach ($countries as $country)
        <p>Country: {{ $country->name }}</p>
        <p>Cities:</p>
        <ul>
        @foreach ($country->cities as $city)
            <li>
                {{ $city->name }}
            </li>
        @endforeach
        </ul>
        @if (!$loop->last)
            <hr>
        @endif
    @endforeach
</body>
</html>
