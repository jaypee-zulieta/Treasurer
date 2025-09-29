@props(['pageTitle' => 'Syborg Treasurer'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar></x-navbar>
    <div class="flex min-h-screen">
        <x-menu></x-menu>
        <div class="w-full">
            {{ $slot }}
        </div>
    </div>
    <x-footer></x-footer>
</body>

</html>
