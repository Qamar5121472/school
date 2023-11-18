<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layout.navbar')

        @include('layout.sidebar')

        @yield('content')
    @show
    @include('layout.fotter')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layout.script')
</body>

</html>
