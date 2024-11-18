<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.head')
    </head>
<body>

    <div id='main'>
        @yield('content')
    </div>
    
    
    @stack('scripts')

</body>
</html>