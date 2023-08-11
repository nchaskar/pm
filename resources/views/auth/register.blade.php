<!doctype html>
<html lang="en">

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8" style="margin-left: -30%;">
                    <div class="card overflow-hidden" style="width: 80%;padding: 10px;background-color: #fff;background: rgba(255,255,255,0.9);">
                        <div class="">
                            <div class="row">
                                
                                <div class="col-7" style="margin-top: 25px;font-weight: 800;">
                                    <div class="" style="margin-left:27px;">
                                        <h5 style="font-size: 25px;font-weight: 800;">Welcome!</h5>
                                        <p> Sign Up</p>
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
                                <form action="{{ url('register') }}" id="SignupForm" name="SignupForm" class="mt-2" method="post">
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
                                                <label for="input" class="control-label">Role</label><i
                                                    class="bar"></i>
                                                <select type="text" class="form-control" name="role" id="role" required="required" />
                                                    <option value="">Select</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="employee">Employee</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input" class="control-label">Email ID</label><i
                                                    class="bar"></i>
                                                
                                                <input type="text" class="form-control" name="email" id="email" required="required" />
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input" class="control-label">Password</label><i
                                                    class="bar"></i>
                                                <input type="password" class="form-control" name="password" id="password" required="required" />
                                                
                                            </div>
                                        </div>
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
                                                        <input type="radio" name="gender" value="F" /><i
                                                            class="helper"></i> Female
                                                    </label>
                                                </div>
                                                <div class="radio form-check-inline">
                                                    <label>
                                                        <input type="radio" name="gender" value="M" /><i
                                                            class="helper"></i> Male
                                                    </label>
                                                </div>
                                                
                                                <label id="gender-error" class="error" for="gender"
                                                        style="display: inline-block;color:#"></label></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        
                                    </div>
                                    <div class="mt-6 d-grid">
                                        <button type="submit" id="signup_btn" name="signup_btn" class="btn btn-primary btn-orange waves-effect waves-light">Register</button>
                                    </div>
                                    

                                    <div class="mt-4 text-left"
                                            style="font-size: 13px;color: #666666;margin: 0;text-align: left;"
                                            class="pt-2">Already have an Account? <a href="{{ url('/login') }}"
                                                style="color: blue;font-size: 13px;font-weight: 400;"
                                                class="SignUp">Sign In</a>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    
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
        $("#SignupForm").validate({
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
