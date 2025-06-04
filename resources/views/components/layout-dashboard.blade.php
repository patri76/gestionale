<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Include i file generati da Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen antialiased">

    {{ $slot }}

</body>
</html>
