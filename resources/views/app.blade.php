<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- maybe required by axios to bne able to POST a form -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="<%= BASE_URL %>favicon.ico">
    <title><%= htmlWebpackPlugin.options.title %></title>
  </head>
  <body>
    <noscript>
      <strong>We're sorry but <%= htmlWebpackPlugin.options.title %> doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
    </noscript>

    <div id="app"></div>
    <!-- built files will be auto injected -->


    <!-- TODO: check if loading JS here is necessary. Can it be injected/controlled elsewhere, more practically? -->

    <!-- FAIL: Vue app doesn't work this, despite some tutorials using it -->
    <!-- returns error: Source map error: Error: JSON.parse: unexpected character at line 1 column 1 of the JSON data
Resource URL: http://127.0.0.1:8000/js/app.js -->
   <!-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> -->

    <!-- SUCCESS: Vue app works with this -->
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>