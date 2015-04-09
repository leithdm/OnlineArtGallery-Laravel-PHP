<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    @yield('title')


    <!-- Bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    {{ HTML::style('css/main.css') }}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- NAVBAR
================================================== -->
<body>
<div class="navbar-wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed"
                            data-toggle="collapse"
                            data-target="#navbar"
                            aria-expanded="false"
                            aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img alt="Brand" src="/brand/brand.jpg"
                                                          style="width:35px;height:30px">
                    </a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="/ims/arts/index" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">Inventory <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/ims/arts"><span class="glyphicon glyphicon-search"></span> View all items</a>
                                </li>
                                <li><a href="/ims/arts/create"><span class="glyphicon glyphicon-plus"></span> Add an
                                        item</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="/ims/artists/index" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">Artists <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/ims/artists"><span class="glyphicon glyphicon-search"></span> View all
                                        artists</a></li>
                                <li><a href="/ims/artists/create"><span class="glyphicon glyphicon-plus"></span> Add an
                                        artist</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="/ims/customers/index" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">Customers <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/ims/customers"><span class="glyphicon glyphicon-search"></span> View all
                                        customers</a></li>
                                <li><a href="/ims/customers/create"><span class="glyphicon glyphicon-plus"></span> Add a
                                        customer</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="/ims/orders/index" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">Orders <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/ims/orders"><span class="glyphicon glyphicon-search"></span> View all
                                        orders</a></li>
                                <li><a href="/ims/orders/create"><span class="glyphicon glyphicon-plus"></span> Add an
                                        order</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="/ims/employees/index" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">Staff <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/ims/employees"><span class="glyphicon glyphicon-search"></span> View all
                                        staff</a></li>
                                <li><a href="/ims/employees/create"><span class="glyphicon glyphicon-plus"></span> Add a
                                        staff member</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="/ims/events/index" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">Events <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/ims/events"><span class="glyphicon glyphicon-search"></span> View all
                                        events</a></li>
                                <li><a href="/ims/events/create"><span class="glyphicon glyphicon-plus"></span> Add an
                                        event</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#Paintings" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">Howdy, {{ Auth::user()->username }}<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/logout">Logout</a></li>
                                <li><a href="#">Edit Profile</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- SIDEBAR
================================================== -->
@include('flash::message')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-1 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="/ims/dashboard"><span class="glyphicon glyphicon-home"></span>
                        Dashboard<span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="/ims/arts"><span class="glyphicon glyphicon-shopping-cart"></span> Inventory</a>
                <li><a href="/ims/artists"><span class="glyphicon glyphicon-tint"></span> Artists</a></li>
                </li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="/ims/customers"><span class="glyphicon glyphicon-king"></span> Customers</a>
                </li>
                <li><a href="/ims/orders"><span class="glyphicon glyphicon-euro"></span> Orders</a>
                </li>
                <li><a href="/ims/employees"><span class="glyphicon glyphicon-user"></span> Staff</a></li>
                <li><a href="/ims/events"><span class="glyphicon glyphicon-calendar"></span> Events</a></li>
                <li><a href="/ims/gallery"><span class="glyphicon glyphicon-camera"></span> Art Gallery</a></li>
                <li><a href="/ims/carousel"><span class="glyphicon glyphicon-play"></span> Carousel</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-book"></span> Reports</a></li>
            </ul>
        </div>
        {{--<div class="col-sm-9 col-sm-offset-3 col-md-11 col-md-offset-1 main">--}}
        <!-- MAIN CONTENT
        ================================================== -->
        @yield('content')

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script>$('#flash-overlay-modal').modal();</script>

{{--<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>--}}
{{--{{ HTML::script('js/script.js') }}--}}

{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/jquery.datetimepicker.js') }}
{{ HTML::style('css/jquery.datetimepicker.css') }}
<script>
    jQuery('#datetimepicker').datetimepicker({
        formatDate:'Y/m/d',
        minDate:'-1970/01/02'
    });
</script>

{{--<script>--}}
    {{--$(function() {--}}
        {{--$("#datepicker").datepicker({--}}
            {{--changeMonth: true,--}}
            {{--changeYear: true,--}}
            {{--dateFormat: 'yy-mm-dd'--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}

</body>
</html>