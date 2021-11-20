@include('__partials.backend_header')
<body>
    <!-- Header (Topbar) -->

    @include('__partials.backend_topbar')

    <!-- End Header (Topbar) -->

    <main class="u-main" role="main">
        <!-- Sidebar -->
        @include('__partials.backend_sidebar')
        <!-- End Sidebar -->

        @yield('main_content')
    </main>

@include('__partials.backend_footer')
