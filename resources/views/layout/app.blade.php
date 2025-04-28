<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel= "stylesheet" href="{{asset('/css/bootstrap.css')}}">

    </head>

    <body>
        <div class="container h-100">
            @yield("content")  
        </div>
    </body>
</html>