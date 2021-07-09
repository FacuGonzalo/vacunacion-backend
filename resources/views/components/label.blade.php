<link href="{{asset('css/estilo.css')}}" type="text/css" rel="stylesheet">

@props(['value'])

<label id="texto-card">
    {{ $value ?? $slot }}
</label>
