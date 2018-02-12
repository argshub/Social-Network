<!DOCTYPE html>
<html lang="en">
<head>
    <title>Xenon | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@include('template.style')
</head>
<body>
@include('template.topnav')
<div id="mainWrapper">
    <div class="container">
        <div class="row">
            @if(Session::has('info'))
                <div class="alert alert-info" role="alert">
                    <p>{{ Session::get('info') }}</p>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</div>


</body>
</html>
