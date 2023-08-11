
<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <title>Generate New Password | Indic Education</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

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
                                        <div class="text-primary text-center p-4">
                                            <h5 class="text-primary">Generate New Password</h5>
                                            <p>{{ $school[0]->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="d-flex justify-content-center">
                                    <div class="avatar-md profile-user-wid mb-1">
                                        <span class="avatar-title bg-white">
                                            <img src="{{ asset('storage/schools/'.$school[0]->id.'/'.$school[0]->picture) }}" alt="" style="width:100%;">
                                        </span>
                                    </div>
                                </div>

                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif

                                @if(session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif

                                <div class="p-2">
                                    <form class="form-horizontal" action="{{ url('teacher-reset-password') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <input type="hidden" name="slug" value="{{ $slug }}"/>

                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email ID</label>
                                            <input type="text" id="email_address" class="form-control" name="email" placeholder="Enter registered email id" required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">New Password</label>
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Enter your new password" required autofocus>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Confirm Password</label>
                                            <input type="password" id="password-confirm" class="form-control" placeholder="Enter your new password once again" name="password_confirmation" required autofocus>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>

                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Generate Password</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>Remember It ? <a href="{{ url('/'.$slug) }}" class="fw-medium text-primary"> Sign In here</a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Indic Education.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
    </body>
</html>
