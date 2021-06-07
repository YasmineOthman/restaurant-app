<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  </head>
  <body>
  <x-navbar />
  {{ $slot }}
  <x-footer />
  {{ $scripts ?? '' }}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('d3dc19b1d57129ecf0f0', {
      cluster: 'mt1'
    });

      var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script>

    $('.js-go-night').click(function(){
      // alert('Go to night mode - replace me with the CSS changing code!');
      $('body').addClass('night');
      $('div').addClass('night');
      $('li').addClass('night');
      $('form').addClass('night');
      $('label').addClass('night');
      $('button').addClass('night');
      $('section').addClass('night');
      $('.hero-body').addClass('night');
      $('h1').addClass('night');
    });
    $('.js-go-day').click(function(){
      // alert('Go to day mode - replace me with the CSS changing code!');
      $('body').removeClass('night');
      $('div').removeClass('night');
      $('li').removeClass('night');
      $('form').removeClass('night');
      $('label').removeClass('night');
      $('button').removeClass('night');
      $('section').removeClass('night');
      $('.hero-body').removeClass('night');
      $('h1').removeClass('night');
    });
    </script>
  </body>
</html>
