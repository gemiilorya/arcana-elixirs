<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts._head')
</head>
<body>
    @include('layouts._navbar')
    
    <main class="container mx-auto py-4">
        @yield('content')
    </main>

    @include('layouts._footer')
    
    @stack('scripts')
</body>
</html>