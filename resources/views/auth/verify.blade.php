<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Zero - Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('dashbord') }}/assets/images/logo/favicon.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{ asset('dashbord') }}/assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('{{ asset('dashbord') }}/assets/images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <h1 class="text-muted"><strong class="text-info">Z</strong>ero</h1>
                                    </div>

                                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                                    <div class="card-body">
                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                {{ __('A fresh verification link has been sent to your email address.') }}
                                            </div>
                                        @endif

                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }},
                                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">?? 2021 Zero</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ url('faq') }}" class="text-dark text-link" href="">FAQ</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ url('terms') }}" class="text-dark text-link">Term & Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="{{ asset('dashbord') }}/assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{ asset('dashbord') }}/assets/js/app.min.js"></script>

</body>

</html>
