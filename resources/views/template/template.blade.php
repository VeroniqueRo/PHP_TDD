<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projects</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">        <link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
        
    </head>
        <header>
            @include('template.menu')
        </header>
    <body>
        <section>
            <div class="content">
                <div class="title m-b-md">
                    @yield('titre')
                </div>
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </section>
    </body>
</html>
