<!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

        <script src="{{ asset('js/app.js') }}"></script>

<!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js">
        </script>
    </head>
<body>

<!-- Navbar -->
    @include('layouts.navbar')
        <div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-3">
            @include('layouts.sidebar')
</div>
<div class="col-md-9">

<!-- Breadcrumb -->
    @include('layouts.breadcrumb')
    @yield('content')
    </div>
        </div>
            </div>
    </body>
</html>
