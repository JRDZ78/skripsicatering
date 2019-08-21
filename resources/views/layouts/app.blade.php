<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cater Sirih</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- Custom fonts for this template -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900')}}"
          rel="stylesheet">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i')}}"
          rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/one-page-wonder.min.css')}}" rel="stylesheet">

    <style>
        body, html {
            padding-bottom: 3em;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            z-index: 100;
            padding: 1em 0 1em;
        }

        .footer p {
            margin: 0;
        }

        fieldset {
            border: none !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: auto;
            padding: 0 10px;
            border-bottom: none;
        }
    </style>

    @yield('css')
    @yield('head-script')
    @yield('style')

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{(Auth::check()) ? "/homepage" : "/"}}" style="padding-left: 80px">Cater
                Sirih</a>
        </div>
        <ul class="nav navbar-nav navbar-right" style="padding-right: 80px">
            @if(Auth::check())

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Auth::user()->username}}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::user()->isAdmin())
                            <li><a href="/manageUserForm">Manage User</a></li>
                            <li><a href="/manageCaterForm">Manage Catering Services</a></li>
                            <li><a href="/viewProfileForm">View Admin Profile</a></li>
                        @else
                            <li><a href="/viewProfileForm">View Profile</a></li>
                            <li><a href="/viewCaterProfileForm">View Catering Profile</a></li>
                        @endif
                        <li><a href="/logout">Log Out</a></li>
                    </ul>
                </li>
                @if(!Auth::user()->isAdmin())
                    <li class=""><a href="/transactionListForm">Notification</a></li>
                @endif
            @else
                <li><a href="/loginform">Log In</a></li>
                <li><a href="#">About Us</a></li>
            @endif

        </ul>
    </div>
</nav>

@yield('full-content')

<div class="container">
    @yield('content')
</div>


<footer class="footer">
    <p>Copyright &copy; Cater Sirih 2019</p>
</footer>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@yield('script')
</html>
