<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{asset('css/material-dashboard.css?')}}" rel="stylesheet" />

    <!-- Custom CSS Libraries -->
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
</head>

<body>
    <div id="app">
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            @guest
                            <li><a href="" class="btn btn-primary btn-round">Login</a></li>
                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                    <div class="ripple-container"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{
                                        __('Logout') }} </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    {{-- <a class="dropdown-item" href="{{ route('admin') }}">Admin</a> --}}
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('error'))
        toastr.error("{!! Session::get('error')!!}");
        @endif
        // toastr.error('asasd');
    </script>

    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $(document).ready(function() {
            $("#addOrderTestItemButton").click(function () {
                var myValue = $("#orderItemName").val();
                // alert(myValue);
                $.post("http://127.0.0.1:8000/api/ordertestitem", {
                        name: myValue
                    },
                    function (data, status) {
                        $("<label><input checked type=\"checkbox\" value=\""+data.data.id+"\" name=\"order_test_items_array[]\"/><span>"+data.data.name+"</span</label>").appendTo("#addOrderTestItem");
                });
            });
            // $("#addTestItemButton").click(function () {
            //     var itemName = $("#itemName").val();
            //     var specifiedValue = $("#specifiedValue").val();
            //     $.post("http://127.0.0.1:8000/api/testitem", {
            //             name: itemName, 
            //             specified_value: specifiedValue  
            //         },
            //         function (data, status) {
            //             $("<label><input checked type=\"checkbox\" value=\""+data.data.id+"\" name=\"test_items_array[]\"/><span>"+data.data.name+"</span</label>").appendTo("#addTestItem");
            //     });



                // $.ajax({
                //     type: "POST",
                //     url: "http://127.0.0.1:8000/api/testitem",
                //     data: {
                //         name: itemName, 
                //         specied_value: specifiedValue  
                //     },
                //     success: function(resultData){
                //         console.log(resultData);
                //     }
                // });
            });
        });
    </script>
</body>

</html>
