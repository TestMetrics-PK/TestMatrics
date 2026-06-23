<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TestMatrics</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
    <body class="bg-gray-100">
    <div class="min-h-screen">
      <main class="container mx-auto p-4">
        @yield('content')
      </main>
    </div>
  </body>
</html>
