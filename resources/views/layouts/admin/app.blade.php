<html lang="{{app()->getLocale()}}">
    <head>
        <title>CRM - Dashboard</title>
        @include('layouts.partials.head')
    </head>
    <body>

        @include('layouts.partials.header')

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-dark  sidebar">
                    @include('layouts.partials.sidebar')
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


                    @yield('content')

                </main>
            </div>
        </div>

        @include('layouts.partials.foot')

    </body>
</html>
