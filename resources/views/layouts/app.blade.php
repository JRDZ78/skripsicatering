<!DOCTYPE html>
<html lang="en">



<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cater Sirih</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.min.css" rel="stylesheet">
  <style type="text/css">body{padding-top:55px}</style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">Cater Sirih</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        @if(Auth::check())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                {{Auth::user()->username}}
              </a>
              <div class="dropdown-menu">
                @if(Auth::user()->isAdmin())
                <a class="dropdown-item" href="" >Manage Users</a>
                <a class="dropdown-item" href="" >Manage Customers</a>
                <a class="dropdown-item" href="" >Manage Catering Services</a>
                {{-- @else
                <a class="dropdown-item" href="" >Manage Menu</a>   --}}              
                @endif
                <a class="dropdown-item" href="" >Edit Profile</a>
                <a class="dropdown-item" href="/logout">Log Out</a>
              </div>
            </li>
        @else
            <li class="nav-item">
              <a class="nav-link" href="/loginform">Log In</a>
            </li>
        @endif     
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')


  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Cater Sirih 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
