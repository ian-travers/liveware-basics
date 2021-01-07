<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire Examples</title>
    <link rel="stylesheet" href="{{ mix('css/app.css', 'build') }}">
    <livewire:styles />
</head>

<body>
<main class="container mx-auto">
    @yield('content')
</main>

<livewire:scripts />
<script src="{{ mix('js/app.js', 'build') }}"></script>
</body>

</html>

