<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SaludNFC</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/datepicker3.css">
    <link rel="stylesheet" href="/vendors/dist/css/selectize.bootstrap3.css">
    <link rel="stylesheet" href="/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/css/skin-green.min.css">

    <style>
        body{
            font-family: 'Dosis', sans-serif;
        }
    </style>
</head>
<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

		@include('layouts.navbar')
		@include('layouts.sidebar')

        <div class="content-wrapper">
            @if(Session::has('message'))
                @include('layouts.flash')
            @endif
            <section class="content-header">
                @yield('title')
            </section>


            <div class="container-fluid">

                <section class="content">
                    <div class="row">
                        @yield('content')
                    </div>
                </section>
            </div>
        </div>
    </div>


    <script src="/js/jquery-2.2.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/app.min.js"></script>
    <script src="/js/bootstrap-datepicker.js"></script>
    <script src="/vendors/dist/js/standalone/selectize.js"></script>
    <script src="/js/searcher.js"></script>

    <script type="text/javascript">
        $(function () {
            //Date picker
            $('#datepicker').datepicker({
                autoclose: true,
                formatSubmit: 'dd-mm-yyyy',
                format: 'dd-mm-yyyy',
                endDate: '+0d'
            });
        });

        $(function () {
            //Date picker
            $('.datepicker').datepicker({
                autoclose: true,
                formatSubmit: 'dd-mm-yyyy',
                format: 'dd-mm-yyyy',
                endDate: '+0d'
            });
        });

        $('#flash').modal();

        setTimeout(function(){
            $('#flash').modal('hide');
        }, 2000);

        $('.popoverData').popover();

    </script>

    <script>
    	$(document).ready(function(){
    	    $('#searchbox').selectize();
    	});
    </script>

    <script type="text/javascript">
        var root = '{{url("/")}}';
    </script>
</body>
</html>
