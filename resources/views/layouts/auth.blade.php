<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Employee Management System</title>
</head>
<body class="grey lighten-4">
    <main class="pl-0 main-login">
        @yield('content')
    </main>
    <footer class="page-footer gradient-bg pl-0">
        <div class="footer-copyright">
            <div class="container">
                © 2018 Copyright SagarMaheshwary
            </div>
        </div>
    </footer>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/materialize.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- Include the Script after materialize.js is loaded -->
    @include('inc.message')
</body>
</html>