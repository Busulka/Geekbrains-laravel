<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="wrapper">
        <x-header class="header" />
        <x-menu class="menu" />
        <div class="body">
            {{$slot}}
        </div>
        <x-footer class="footer" />
    </div>
</body>

</html>
