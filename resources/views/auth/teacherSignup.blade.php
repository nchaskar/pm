<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{ ucfirst($url) }} Signup | Indic Education</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Indic" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body style="background-image: url({{ asset('assets/images/teacher-login-back.png') }});background-size: cover;">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8" style="margin-left: -30%;">
                    <div class="card overflow-hidden" style="width: 80%;padding: 10px;background-color: #fff;background: rgba(255,255,255,0.9);">
                        <div class="">
                            <div class="row">
                                <a href="{{ url('/') }}" class="auth-logo-dark">
                                    <div class="" style="margin-left: 25px;margin-top: 25px;">
                                        
                                        <img src="{{ asset('assets/images/mlogo-light.webp') }}" alt=""
                                                class="" height="50">
                                    </div>
                                </a>
                                <div class="col-7" style="margin-top: 25px;font-weight: 800;">
                                    <div class="" style="margin-left:27px;">
                                        <h5 style="font-size: 25px;font-weight: 800;">Welcome!</h5>
                                        <p>Teacher Sign Up</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <!--
                                <a href="{{ url('/') }}" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/mlogo-light.webp') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="{{ url('/') }}" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/mlogo-light.webp') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>-->

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
                                <form action="{{ url('teacher-reg') }}" id="teacherSignupForm" name="teacherSignupForm" class="mt-2" method="post">
                                    @csrf
                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input" class="control-label">First Name</label><i
                                                    class="bar"></i>
                                                <input type="text" class="form-control" name="first_name" id="first_name" required="required" />
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input" class="control-label">Last Name</label><i
                                                    class="bar"></i>
                                                <input type="text" class="form-control" name="last_name" id="last_name" required="required" />
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input" class="control-label">Email ID</label><i
                                                    class="bar"></i>
                                                <input type="text" class="form-control" name="email_id" id="email_id" required="required" />
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input" class="control-label">Password</label><i
                                                    class="bar"></i>
                                                <input type="password" class="form-control" name="password" id="password" required="required" />
                                                
                                            </div>
                                        </div>
                                        <!--<div class="col-md-6">
                                            <div class="form-group">
                                                <select name="location" class="form-control" style="margin-top: 22px;" id="location" class="form-select" required="required">
                                                    <option value="">Select Location</option>
                                                    <@foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="select" class="control-label">Location</label><i
                                                    class="bar"></i>
                                            </div>
                                        </div>-->
                                    </div>

                                    <div class="row" style="margin-bottom:20px;">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input" class="control-label">Confirm Password</label><i
                                                    class="bar"></i>
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                                                    required="required" />
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="col-md-12">
                                            <div class="form-radio" style="margin-bottom:0px;">
                                                <div><label for="input" class="control-label">Gender</label><i
                                                    class="bar"></i><br>
                                                <div class="radio form-check-inline">
                                                    <label>
                                                        <input type="radio" name="gender" value="2" /><i
                                                            class="helper"></i> Female
                                                    </label>
                                                </div>
                                                <div class="radio form-check-inline">
                                                    <label>
                                                        <input type="radio" name="gender" value="1" /><i
                                                            class="helper"></i> Male
                                                    </label>
                                                </div>
                                                <div class="radio form-check-inline">
                                                    <label>
                                                        <input type="radio" name="gender" value="3" /><i
                                                            class="helper"></i> Non-binary
                                                    </label>
                                                </div>
                                                <label id="gender-error" class="error" for="gender"
                                                        style="display: inline-block;color:#"></label></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="col-md-12">
                                            <p style="font-size:0.80rem;">By Signing Up, you agree to our
                                                <a href="{{ url('terms') }}" target="_blank"><u>Terms & Conditions</u></a> &
                                                <a href="{{ url('privacy-policy') }}" target="_blank"><u>Privacy
                                                        Policy</u></a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-6 d-grid">
                                        <button type="submit" id="signup_btn" name="signup_btn" class="btn btn-primary btn-orange waves-effect waves-light">Register</button>
                                    </div>
                                    

                                    <div class="mt-4 text-left"
                                            style="font-size: 13px;color: #666666;margin: 0;text-align: left;"
                                            class="pt-2">Don't have an Account? <a href="{{ url('/login/teacher') }}"
                                                style="color: blue;font-size: 13px;font-weight: 400;"
                                                class="teacherSignUp">Sign In</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center" style="position: absolute;float: right !important;right: -52%;color: #000;font-weight: 600;">
                        <div>
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Indic Eductaion.
                            </p>
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
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) {
            window.location = 'microsoft-edge:' + window.location;
            setTimeout(function() {
                window.open('', '_self', '').close();
                window.location =
                    'https://support.microsoft.com/en-us/topic/we-recommend-viewing-this-website-in-microsoft-edge-160fa918-d581-4932-9e4e-1075c4713595?ui=en-us&rs=en-us&ad=us';
            }, 0);
        }
    </script>
    <style type="text/css">
        .card{
            border-radius: 1.5rem;
        }
        .btn.btn-orange {
            background-color: #F1A501;
            border: none;
            font-size: 16px;
            width: 150px;
        }
    </style>
    <script type="text/javascript">
        $("#teacherSignupForm").validate({
        rules: {
            first_name: {
                required: true,
                maxlength: 50
            },
            last_name: {
                required: true,
                maxlength: 50
            },
            gender: {
                required: true,
                range: [1, 3]
            },
            email_id: {
                required: true,
                email: true,
                remote: {
                    url: "{{ url('chkemailexists') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post"
                }
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password"
            },
            email_id: {
                required: "Please enter your email address",
                email: "Please enter valid email address",
                remote: "Email already exists, you can try logging in with this email."
            },
            gender: {
                required: "(Please select your gender)"
            }
        },
        submitHandler: function(form) {
            $("#signup_btn").prop('disabled', true);
            $("#signup_btn").html("<span>SUBMITTING...</span>");
            form.submit();
        }
    });
    </script>
</body>

</html>
