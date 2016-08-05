<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.includes.styles')
    @include('layouts.includes.scripts')
</head>
<body>
	@include('layouts.includes.header')
    @yield('content')
    @include('layouts.includes.footer')
</body>
</html>