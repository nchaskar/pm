<!doctype html>
<html lang="en">

<head>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->

</head>

<?php
// if($url == 'manager')
// {
//     $title1 = "Manager";
// }
// else
// {
//     $title1 = "Teacher";
// }
?>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5" style="margin-left: -55%;">
                    <div class="card overflow-hidden" style="width: 80%;padding: 10px;background-color: #fff;background: rgba(255,255,255,0.9);">
                        <div class="">
                            <div class="row">
                                
                                <div class="col-7" style="margin-top: 25px;font-weight: 800;">
                                    <div class="" style="margin-left:27px;">
                                        <h5 style="font-size: 25px;font-weight: 800;">Welcome!</h5>
                                        <p>Sign In</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                

                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif

                            </div>
                            <div class="p-2">
                                    <form method="POST" action='{{ route('login.post') }}' class="form-horizontal"
                                        aria-label="{{ __('Login') }}">
                                        
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email ID</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter email id" value="{{ old('email') }}" required
                                                autofocus />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Enter password"
                                                    name="password" required autocomplete="current-password">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                            </div>

                                        </div>
                                        <div class="mt-3 d-grid">
                                            <button type="submit" name="loginbtn" id="loginbtn"
                                                class="btn btn-primary btn-orange waves-effect waves-light" type="submit">Sign In</button>
                                        </div>
                                        <div class="mt-4 text-left"
                                            style="font-size: 13px;color: #666666;margin: 0;text-align: left;"
                                            class="pt-2">Don't have an Account? <a href="{{ url('/register') }}"
                                                style="color: blue;font-size: 13px;font-weight: 400;"
                                                class="SignUp">Sign Up</a>
                                        </div>
                                        
                                    </form>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <style type="text/css">
        .card{
            border-radius: 1.5rem;
        }
        .btn.btn-orange {
            background-color: #F1A501;
            border: none;
            font-size: 16px;
            width: 110px;
        }
    </style>
</body>

</html>
