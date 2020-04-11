<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Manager Portal</title>
</head>
<body>
    @include('layout.navbar')
    @include('layout.messages')

    <main role="main" class="container" style="padding-top: 2rem">

        <div>
            @yield('content')
        </div>
      
      </main>

  
</body>