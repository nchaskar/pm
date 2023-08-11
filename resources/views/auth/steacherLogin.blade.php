<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Teaching Value Index | Indic Education</title>
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

    <style>
        .error-feedback {
            width: 100%;
            margin-top: 0.25rem;
            font-size: 90%;
            color: #f46a6a;
        }

        .error-input {
            border-color: #f46a6a;
            padding-right: calc(1.5em + .94rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23f46a6a'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23f46a6a' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(.375em + .235rem) center;
            background-size: calc(.75em + .47rem) calc(.75em + .47rem)
        }

    </style>
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">

                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-primary text-center p-4 mb-1">
                                        <h5 class="text-primary">{{ $school[0]->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">

                                <div class="d-flex justify-content-center">
                                    <div class="avatar-md profile-user-wid mb-3">
                                        <span class="avatar-title bg-white">
                                            <img src="{{ $logo }}" alt="" style="width:100%;">
                                        </span>
                                    </div>
                                </div>

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
                            <div class="p-1">
                                @isset($url)
                                    <form method="POST" action='{{ url('school-teacher-login') }}' class="form-horizontal"
                                        aria-label="{{ __('Login') }}">
                                        <input type="hidden" name="school_slug" value="{{ $slug }}" />
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

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button type="submit" name="loginbtn" id="loginbtn"
                                                class="btn btn-primary waves-effect waves-light" type="submit">Log
                                                In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a class="text-muted" data-bs-toggle="modal" data-bs-target="#myModal"
                                                href="#"><i class="mdi mdi-lock me-1"></i>
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        </div>
                                    </form>
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
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



    <!-- forgot password modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ url('forgot-teacher-password') }}" id="forgotPasswordForm" method="post">
                    <input type="hidden" name="school_slug" value="{{ $slug }}" />
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Recover Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div id="msg"></div>
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">Email ID</label>
                                    <input class="form-control" type="text" id="temail_id" name="email"
                                        placeholder="Enter Email ID" />
                                    <div class="error-feedback"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="sbtrecpw" name="sbtrecpw"
                            class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script>

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

    <script>
        $("#myModal").on('show.bs.modal', function() {
            $("#msg").html();
            $("#temail_id").val('');
            $("#temail_id").removeClass('error-input');
            $(".error-feedback").html('');
        });

        $(document).ready(function() {

            var options = {
                beforeSubmit: showRequest,
                success: showResponse
            };

            $('#forgotPasswordForm').ajaxForm(options);
        });

        // pre-submit callback
        function showRequest(formData, jqForm, options) {
            var form = jqForm[0];
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!form.email.value) {
                $("#temail_id").addClass('error-input');
                $(".error-feedback").html('Please enter email id');
                return false;
            } else {
                $(".error-feedback").html('');
                $("#temail_id").removeClass('error-input');
            }

            if (!regex.test(form.email.value)) {
                $("#temail_id").addClass('error-input');
                $(".error-feedback").html('Please enter valid email id');
                return false;
            } else {
                $(".error-feedback").html('');
                $("#temail_id").removeClass('error-input');
            }

            $("#sbtrecpw").html('Submitting...');
            $("#sbtrecpw").prop('disabled', true);
        }

        // post-submit callback
        function showResponse(responseText, statusText, xhr, $form) {

            $("#sbtrecpw").html('Submit');
            $("#sbtrecpw").prop('disabled', false);

            if (responseText['type'] == 'success') {
                var msg = `<div class="alert alert-success" role="alert">
                                ${responseText['message']}
                            </div>`;

                $("#msg").html(msg);
                $("#temail_id").val('');
            } else
            if (responseText['type'] == 'fail') {
                $("#temail_id").addClass('error-input');
                $(".error-feedback").html(responseText['message']['email']);

                return false;
            }
        }
    </script>

</body>

</html>
