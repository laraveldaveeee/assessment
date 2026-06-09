 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>National Telecommunications Commission</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
   {{--  <link href="{{ asset('css/apple.css') }}" rel="stylesheet" /> --}} 
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/red.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/switchery.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-datepicker3.css') }}" rel="stylesheet" />
    <script src="{{ asset('css/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('css/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.gritter.css') }}" rel="stylesheet">
 
{{--     @trixassets --}}

    <link href="{{ asset('assets/plugins/datatable/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" >
     <style>
         
        #canvasDiv{
            position: relative;
            border: 2px dashed grey;
            height:300px;
        }


        .signature-wrapper {
          display: flex;
          justify-content: center;
          flex-direction: column;
        }

        .signature-img {
          width: 200px;
          height: 100px;
          object-fit: contain;
        }

        .signature-name {
          text-align: center;
          transform: translateY(-30px); // move to top 
        }
        
        
    </style>
</head>
 
    <body>
 <!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <!-- end #page-loader -->
    <!-- begin #page-container -->
        <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        @include('layouts.header')
    
        @if(auth()->user()->isAdmin())
            @include('layouts.sidebar')
        @elseif(auth()->user()->isChiefEngineer())
            @include('cheif-engineer-dashboard.partials.sidebar')
        @elseif(auth()->user()->isAccessor())
            @include('accessors-dashboard.sidebar.sidebar')
        @elseif(auth()->user()->isAccounting())
            @include('accounting-dashboard.sidebar.sidebar')
        @elseif(auth()->user()->isCashier())
            @include('cashier-dashboard.sidebar.sidebar')
        @elseif(auth()->user()->isAdminAide())
            @include('admin-aide-dashboard.sidebar.sidebar')
        @endif
        <main class="py">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('/js/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/app.min.js') }}"></script>
    <script src="{{ asset('/js/apple.min.js') }}"></script>
    <script src="{{ asset('/js/theme/default.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/js/toastr.min.js') }}"></script>
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/js/switchery.min.js') }}"></script>
    <script src="{{ asset('/js/particles.js') }}"></script>
    <script src="{{ asset('/js/stats.js') }}"></script>
    <script src="{{ asset('/js/app-js.js') }}"></script>
    <script src="{{ asset('/js/moment.js') }}"></script>
    <script src="{{ asset('/js/jquery.gritter.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script> 
    {{-- <script src="{{ asset('/js/jquery.validate.js') }}"></script> --}}
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  --}}
    <script>
         @if (Session::has('alert-login-dad'))
            $.gritter.add({
                title: 'Granted Access!',
                text: 'Welcome to the Admin Dashboard Panel.',
                image: '../img/code-kata.png',
                sticky: false,
                time: ''
            });
        @endif

        @if (Session::has('alert-assessment'))
            $.gritter.add({
                title: 'Administrator',
                text: "{{ Session::get('alert-assessment') }}",
                image: '../img/boy_01.png',
                time: ''
            });
        @endif

        @if (Session::has('alert-login-assessor'))
            $.gritter.add({
                title: 'Granted Success!',
                text: 'Welcome to the Asessor Dashboard Panel.',
                image: '../img/boy_01.png',
                time: ''
            });
        @endif

        @if (Session::has('alert-assessor'))
            $.gritter.add({
                title: 'Assessor!',
                text: "{{ Session::get('alert-assessment') }}",
                image: '../img/boy_01.png',
                time: ''
            });
        @endif

        
        @if (Session::has('alert-login-dsg'))
            $.gritter.add({
                title: 'Granted Access!',
                text: 'Welcome to the Cashier Dashboard Panel.',
                image: '../img/code-kata.png',
                sticky: false,
                time: ''
            });
        @endif

        @if (Session::has('alert-dsg'))
            $.gritter.add({
                title: 'Dianne S. Garcia',
                text: "{{ Session::get('alert-dsg') }}",
                image: '../../img/alert.png',
                image: '/img/girl.png',
                sticky: false,
                time: ''
            });
        @endif

        @if (Session::has('statuses'))
         swal("Good job!", "Success Submit!", "success");
        @endif
 
        @if (Session::has('alert-login-mog'))
            $.gritter.add({
                title: 'Granted Access!',
                text: 'Welcome to the Cashier Dashboard Panel.',
                image: '../img/code-kata.png',
                sticky: false,
                time: ''
            });
        @endif

        @if (Session::has('alert-mog'))
            $.gritter.add({
                title: 'Marivic O. Gumalo',
                text: "{{ Session::get('alert-mog') }}",
                image: '/img/marivic.png',
                sticky: false,
                time: ''
            });
        @endif

        @if (Session::has('alert-login-rsd'))
            $.gritter.add({
                title: 'Granted Access!',
                text: 'Welcome to the Accounting Dashboard Panel.',
                image: '../img/code-kata.png',
                sticky: false,
                time: ''
            });
        @endif

        @if (Session::has('status'))
            swal({
                icon: 'success',
                title: 'Access Granted!',
                showConfirmButton: false,
                timer: 1000
            });
        @endif

   
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
            {{ session()->forget('success') }}
        @endif

        @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
        @endif

        @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
    </script>
 
 <script>
     $(document).ready(function() {
        $('#slimScroll').slimScroll({
            height: '250px'
        });
    });
</script>
    
    @stack('scripts')
    <script src="{{ asset('assets/plugins/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/DataTables-1.10.18/js/dataTables.bootstrap.min.js') }}"></script>
</body>
</html>
    