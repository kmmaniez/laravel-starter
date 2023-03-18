<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- DataTables --}}
    <link href="{{ url('sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">
    
    @include('sweetalert::alert')
    <!-- Page Wrapper -->

    <div id="wrapper">

        <x-admin.sidebar></x-admin.sidebar>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <x-admin.top-bar></x-admin.top-bar>

                <!-- Begin Page Content -->

                @yield('konten')

                <!-- End Page Content -->

            </div>
            <!-- End of Main Content -->

            {{-- <x-footer></x-footer> --}}

        </div>
        <!-- End of Content Wrapper -->
        @include('components.admin.create-modal')
        @include('components.admin.update-modal')
        
    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('sb-admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Sweetalert -->
    <script src="{{ url('vendor/sweetalert/sweetalert.all.js') }}"></script>
    
    <!-- Custom scripts -->
    <script src="{{ url('js/main.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ url('sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('sb-admin/js/demo/datatables-demo.js') }}"></script>
    
</body>

</html>