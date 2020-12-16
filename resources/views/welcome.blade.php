<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'build') }}" rel="stylesheet">
    <livewire:styles />
</head>
<body>
<livewire:counter/>
<hr>
<livewire:contact-form/>
<!-- Scripts -->
<script src="{{ mix('js/app.js', 'build') }}"></script>
<livewire:scripts />
</body>
</html>
