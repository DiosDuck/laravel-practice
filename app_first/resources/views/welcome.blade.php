<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
    @php
    $list = ['test1', 'test2', 'test3'];
    @endphp
    @foreach($list as $item)
        <x-alert :text="$item"/>
    @endforeach
    <x-button>
        <x-slot name="second">Something else</x-slot>
        <x-slot name="first">Another something else</x-slot>
    </x-button>
    <x-button style="padding: 2px; color: blue"/>
</body>
</html>
