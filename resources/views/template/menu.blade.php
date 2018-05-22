<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Donnez vie à vos projets</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"> <a href="{{ url('/')}}">Home</a></li>
            <li><a href="{{ route('ListeDesProjets')}}">Liste des Projets</a></li>
            <li><a href="https://laravel.com/docs">Documentation</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
        <button class="btn btn-danger navbar-btn">Button</button>
    </div>
</nav>