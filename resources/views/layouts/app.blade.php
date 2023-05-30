<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Oasis - @yield('titulo')</title>
  <!-- <link rel="stylesheet" href="/css/app-57681ef3.css"> -->
  @vite(['resources/css/app.scss'])
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
</style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="background">
@include('layouts.nav')
@include('layouts.botonScroll')
@yield('contenido')

@include('layouts.footer')
</div>
</body>
<script type="text/javascript" src="/js/scroll.js"></script>
<script type="text/javascript" src="/js/calendar.js"></script>
<script type="text/javascript" src="/js/addinput.js"></script>
<script type="text/javascript" src="/js/adminBarra.js"></script>
<script type="text/javascript" src="/js/masFechas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</html>