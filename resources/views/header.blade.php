<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    
    <header id="header" class="fixed-top">
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Page 1</a></li>
              <li><a href="#">Page 2</a></li>
                <li>
                    <a href="#">
                        <div class="dropdown login">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Login
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item schoolSignIn" href="#">School Login</a>
                                <a class="dropdown-item teacherSignIn" href="#">Teacher Login</a>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
          </div>
        </nav>
    </header>
