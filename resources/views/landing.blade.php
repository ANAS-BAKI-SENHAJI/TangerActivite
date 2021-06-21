<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Tanger Activité</title>
    <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
    <style>
    </style>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <app></app>        
    </div>
    
    {{-- <script src="{{ mix('js/bootstrap.js') }}"></script> --}}
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
function resize(){
    if ($(window).width() < 1025) { 
      $(".hero-section img").attr('src', '/homeCov.png');
  } else {
    $(".hero-section img").attr('src', '/homePic.png');
  }
}
resize();
$(window).on('resize', resize);
    </script>
</body>
</html>