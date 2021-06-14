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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
{{$styles ?? ''}}
  </head>
  <body>

  {{ $slot }}
  <x-footer />
  {{ $scripts ?? '' }}

  <script src="{{asset('js\script.js')}}"></script>
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
  <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
 <script>
  function addDarkmodeWidget() {
    new Darkmode().showWidget();
  }
  window.addEventListener('load', addDarkmodeWidget);
  const options = {
  bottom: '64px', // default: '32px'
  right: 'unset', // default: '32px'
  left: '32px', // default: 'unset'
  time: '0.5s', // default: '0.3s'
  mixColor: '#fff', // default: '#fff'
  backgroundColor: '#000',  // default: '#fff'
  buttonColorDark: '#100f2c',  // default: '#100f2c'
  buttonColorLight: '#fff', // default: '#fff'
  saveInCookies: false, // default: true,
  // label: '🌓', // default: ''
  autoMatchOsTheme: true // default: true
}
const darkmode = new Darkmode(options);
darkmode.showWidget();
</script>


</body>
</html>
