<!DOCTYPE html>
<html>
<!-- Mirrored from colorlib.com/polygon/adminator/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Dec 2018 06:31:07 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Dashboard</title>
    <style>#loader{transition:all .3s ease-in-out;opacity:1;visibility:visible;position:fixed;height:100vh;width:100%;background:#fff;z-index:90000}#loader.fadeOut{opacity:0;visibility:hidden}.spinner{width:40px;height:40px;position:absolute;top:calc(50% - 20px);left:calc(50% - 20px);background-color:#333;border-radius:100%;-webkit-animation:sk-scaleout 1s infinite ease-in-out;animation:sk-scaleout 1s infinite ease-in-out}@-webkit-keyframes sk-scaleout{0%{-webkit-transform:scale(0)}100%{-webkit-transform:scale(1);opacity:0}}@keyframes sk-scaleout{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}</style>
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script type="text/javascript">
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            setTimeout(() => {
                loader.classList.add('fadeOut');
            }, 300);
        });
    </script>
    <div>

        <!-- Sidebar -->
        @include('includes.sidebar')

        <div class="page-container">
            <div class="header navbar">
                <div class="header-container">
                    <ul class="nav-left">
                        <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
                        <li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);"><i
                                    class="search-icon ti-search pdd-right-10"></i>
                                <i class="search-icon-close ti-close pdd-right-10"></i></a></li>
                        <li class="search-input"><input class="form-control" type="text" placeholder="Search..."></li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                                data-toggle="dropdown">
                                <div class="peer mR-10"><img class="w-2r bdrs-50p" src="https://randomuser.me/api/portraits/men/10.jpg"
                                        alt=""></div>
                                <div class="peer"><span class="fsz-sm c-grey-900">{{ Auth::user()->name }}</span></div>
                            </a>
                            <ul class="dropdown-menu fsz-sm">
                                <li>
                                    <a href="#" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                        <i class="ti-settings mR-10"></i>
                                        <span>Setting</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                        <i class="ti-user mR-10"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}" 
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" 
                                        class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                        <i class="ti-power-off mR-10"></i>
                                        <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <!-- Admin User -->
                    <div class="row gap-20 masonry pos-r">
                        <div class="masonry-sizer col-md-6"></div>
                        <div class="masonry-item w-100">
                            <div class="row gap-20">
                                <!-- Unit of Measurement -->
                                <div class="col-md-4">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Unit of Measurement</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer">
                                                    <button type="button" class="btn cur-p btn-primary">Add Unit of Measurement</button>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="btn cur-p btn-success">Show list of Units</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sample/Product -->
                                <div class="col-md-4">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Sample/Product</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer">
                                                    <button type="button" class="btn cur-p btn-primary">Add Sample/Product</button>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="btn cur-p btn-success">Show list of Sample/Product</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- IS Standards -->
                                <div class="col-md-4">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">IS Standards</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer">
                                                    <button type="button" class="btn cur-p btn-primary">Add IS Standards for Sample/Product</button>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="btn cur-p btn-primary">Edit Sample/Product Info</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Test Items -->
                                <div class="col-md-4">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Test Items</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer">
                                                    <button type="button" class="btn cur-p btn-primary">Add Test Items</button>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="btn cur-p btn-primary">Show Test details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Normal user -->
                    <div class="row gap-20 masonry pos-r">
                        <div class="masonry-sizer col-md-6"></div>
                        <div class="masonry-item w-100">
                            <div class="row gap-20">
                                <!-- Test -->
                                <div class="col-md-4">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Add a test</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer">
                                                    <button type="button" class="btn cur-p btn-success">Customer already registered?</button>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="btn cur-p btn-primary">New Customer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Review test -->
                                <div class="col-md-4">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Test Review</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer">
                                                    <button type="button" class="btn cur-p btn-success">Show review list</button>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="btn cur-p btn-primary">demo button</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Jobs -->
                                <div class="col-md-4">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Jobs</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer">
                                                    <button type="button" class="btn cur-p btn-success">Assign a job</button>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="btn cur-p btn-primary">See your jobs</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600"><span>Copyright © 2017 Designed by <a href="https://colorlib.com/"
                        target="_blank" title="Colorlib">Colorlib</a>. All rights reserved.</span><!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];

                    function gtag() {
                        dataLayer.push(arguments);
                    }
                    gtag('js', new Date());

                    gtag('config', 'UA-23581568-13');

                </script>
            </footer>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/vendor.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bundle.js')}}"></script>
</body>
<!-- Mirrored from colorlib.com/polygon/adminator/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Dec 2018 06:31:26 GMT -->

</html>