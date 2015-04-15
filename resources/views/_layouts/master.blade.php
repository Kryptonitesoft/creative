<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    {!! HTML::Style('css\bootstrap.css') !!}
    {!! HTML::Style('css\input.css') !!}
    {!! HTML::script('jquery-2.1.3.min.js') !!}
    {!! HTML::script('input.js') !!}
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{!! URL::to('files') !!}">File Manager</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{!! URL::to('files') !!}">View All Files</a></li>
            <li><a href="{!! URL::to('files/create') !!}">Upload a file</a>
        </ul>
    </nav>

    @yield('content')

</div>
</body>
</html