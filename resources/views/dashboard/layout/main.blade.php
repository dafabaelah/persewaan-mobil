<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <title>Dashboard - Admin</title>
</head>
<body class="">
    <div class="min-h-full">
        @include('dashboard.layout.navbar')
        @include('dashboard.layout.aside')
        @include('sweetalert::alert')
        <main>
            <div class="p-4 sm:ml-64">
                <div class="flex-auto justify-center rounded mt-14 p-2">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <script>
        function confirmDeleteCar(id) {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</body>
</html>