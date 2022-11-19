<!DOCTYPE html>
<html lang="en">

    <head>

        @include('template.layouts.head')

    </head>

    <body id="page-top">

        <div id="wrapper">
            @include('template.sidebar.customer')
            <div id="content-wrapper" class="d-flex flex-column text-dark">
                <div id="content">
                    @include('template.navbar.customer')
                    @yield('content')
                </div>
                @include('template.layouts.footer')
            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        @include('template.layouts.modal')
        @yield('modal')
        @include('template.layouts.script')
        @yield('chart_area')

    </body>

</html>
