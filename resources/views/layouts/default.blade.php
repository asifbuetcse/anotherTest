<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('layouts.includes.styles')
  @include('layouts.includes.scripts')
  <base href="/">
</head>
<body>
 @include('layouts.includes.header')
<div class="container-fluid text-center">
  <div class="row content">
  	@yield('content')
  </div>
</div>

@include('layouts.includes.footer')

</body>
</html>

