<!doctype html>
<html>
<head>
	@include('template.head')
</head>
<body>
    <div id="wrapper" class="">
        @include('template.menu')
        @yield('content')
    </div>
</body>
</html>