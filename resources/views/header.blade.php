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
              
                <li>
                    <a href="{{ url('/login') }}"><div class="btn btn-primary">
                        Login
                    </div></a>
                </li>
                <li>
                    
                    <a href="{{ url('/register') }}"><div class="btn btn-primary">
                        Register
                    </div></a>
                        
                </li>
            </ul>
          </div>
        </nav>
    </header>
