<!doctype html>
<html @lang('en')>
    <head>
        @include('master/head')
        @include('master/css') 
    </head>

    <body class="nav-md" >
        
        <div class="container body">
            <div class="main_container">
            @include('master/nav-bar')
            @include('master/navigation-menu') 
            </div>
        </div>
        <div>
            @yield('contenido')
        </div>

        @include('master/foot')
        @include('master/script')   
    </body>
</html>