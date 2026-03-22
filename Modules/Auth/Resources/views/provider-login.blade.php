<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{translate('Provider_login')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="robots" content="nofollow, noindex ">
    @php($favIcon = getBusinessSettingsImageFullPath(key: 'business_favicon', settingType: 'business_information', path: 'business/',  defaultPath : 'assets/admin-module/img/placeholder.png'))
    <link rel="shortcut icon" href="{{ $favIcon }}"/>

    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap"
        rel="stylesheet"/>

    <link href="{{asset('assets/provider-module')}}/css/material-icons.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/provider-module')}}/css/bootstrap.min.css"/>
    <link rel="stylesheet"
          href="{{asset('assets/provider-module')}}/plugins/perfect-scrollbar/perfect-scrollbar.min.css"/>

    <style>
        :root {
            --soft-ui-bg: #f8f9fa;
            --soft-ui-primary: #28880A;
            --soft-ui-primary-gradient: linear-gradient(310deg, #28880A, #58D68D);
            --soft-ui-secondary: #8392ab;
            --soft-ui-border-radius: 1rem;
            --soft-ui-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --soft-ui-shadow-lg: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
            --glass-bg: rgba(255, 255, 255, 0.8);
            --glass-border: rgba(255, 255, 255, 0.4);
        }

        body {
            font-family: 'Public Sans', sans-serif;
            background-color: var(--soft-ui-bg);
            color: #344767;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .login-wrap {
            display: flex;
            min-height: 100vh;
            position: relative;
            background: #fff;
        }

        /* Decorative Background Elements */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 1;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: var(--soft-ui-primary-gradient);
            opacity: 0.1;
            animation: float 15s infinite ease-in-out;
        }

        .circle-1 { width: 400px; height: 400px; top: -100px; left: -100px; animation-delay: 0s; }
        .circle-2 { width: 300px; height: 300px; bottom: -50px; right: -50px; animation-delay: -5s; }
        .circle-3 { width: 150px; height: 150px; top: 20%; right: 10%; animation-delay: -2s; opacity: 0.05; }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(30px, -20px) scale(1.1); }
        }

        /* Slanted Divider */
        .login-left {
            flex: 1.2;
            position: relative;
            background-image: url('{{asset('assets/provider-module')}}/img/media/login-bg.png');
            background-size: cover;
            background-position: center;
            overflow: hidden;
            z-index: 2;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(310deg, rgba(40, 136, 10, 0.7), rgba(88, 214, 141, 0.7));
        }

        .login-left::after {
            content: '';
            position: absolute;
            top: 0;
            right: -100px;
            width: 200px;
            height: 100%;
            background: #fff;
            transform: skewX(-10deg);
            z-index: 3;
        }

        .login-left .tf-box {
            position: relative;
            z-index: 4;
            color: #fff;
            text-align: center;
            max-width: 550px;
            padding: 3rem;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-logo {
            max-width: 200px;
            filter: brightness(0) invert(1);
            margin-bottom: 2.5rem;
        }

        .login-left h2 {
            font-weight: 800;
            font-size: 2.75rem;
            letter-spacing: -0.05rem;
            line-height: 1.2;
            color: #fff !important;
        }

        /* Login Form Section */
        .login-right-wrap {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem;
            position: relative;
            z-index: 5;
            background: transparent;
        }

        .login-card {
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 1.5rem;
            padding: 3.5rem;
            width: 100%;
            max-width: 480px;
            box-shadow: var(--soft-ui-shadow-lg);
            animation: fadeInRight 1s ease-out;
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .login-right h2 {
            font-weight: 800;
            font-size: 2.25rem;
            color: #344767;
            letter-spacing: -0.025rem;
            margin-bottom: 0.25rem;
        }

        .login-right p {
            color: var(--soft-ui-secondary);
            font-size: 1rem;
            margin-bottom: 2.5rem;
        }

        /* Form Elements */
        .form-floating {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 0.75rem;
            border: 1px solid #d2d6da;
            padding: 1rem;
            font-size: 0.875rem;
            height: auto;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            background-color: #fff;
        }

        .form-control:focus {
            border-color: #28880A;
            box-shadow: 0 0 0 2px rgba(40, 136, 10, 0.15);
            outline: none;
            transform: translateY(-1px);
        }

        .form-floating label {
            padding-left: 1.25rem;
            color: #8392ab;
        }

        .material-icons {
            color: #8392ab;
            transition: all 0.2s;
        }

        .form-control:focus ~ .material-icons {
            color: #28880A;
            transform: translateY(-50%) scale(1.1);
        }

        .btn--primary {
            background: var(--soft-ui-primary-gradient);
            border: none;
            border-radius: 0.75rem;
            color: #fff;
            font-weight: 700;
            padding: 1rem;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05rem;
            box-shadow: 0 4px 7px -1px rgba(0, 0, 0, 0.11), 0 2px 4px -1px rgba(0, 0, 0, 0.07);
            transition: all 0.2s;
            margin-top: 1rem;
        }

        .btn--primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
            filter: brightness(1.05);
        }

        .btn--primary:active {
            transform: translateY(0);
        }

        /* Glassmorphism Badge */
        .glass-badge {
            background: rgba(233, 236, 239, 0.6);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: #344767;
            font-weight: 700;
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.75rem;
        }

        /* Demo Box Glassmorphism */
        .login-footer {
            background: rgba(248, 249, 250, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 1rem;
            padding: 1.25rem;
            margin-top: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .login-copy {
            background: #fff;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--soft-ui-shadow);
            cursor: pointer;
            transition: all 0.2s;
        }

        .login-copy:hover {
            transform: scale(1.1);
            color: #28880A;
        }

        @media (max-width: 1199px) {
            .login-left { flex: 1; }
            .login-right-wrap { padding: 2rem; }
        }

        @media (max-width: 991px) {
            body { overflow-y: auto; }
            .login-left { display: none; }
            .login-right-wrap { flex: 1; padding: 1.5rem; height: 100vh; }
            .login-card { padding: 2rem; box-shadow: none; border: none; background: transparent; }
            .login-left::after { display: none; }
        }

        .login-left .c1 { color: #fff !important; background: rgba(255,255,255,0.2); padding: 0 0.5rem; border-radius: 0.5rem; }
        .c1 { color: #28880A !important; }
        .fw-bold { font-weight: 700 !important; }
        .text-secondary { color: #67748e !important; }
    </style>
</head>

<body>
<div class="preloader"></div>
<?php
$logo = getBusinessSettingsImageFullPath(key: 'business_logo', settingType: 'business_information', path: 'business/',  defaultPath : 'assets/admin-module/img/placeholder.png');
?>
<div class="login-wrap">
    <div class="floating-elements">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
        <div class="circle circle-3"></div>
    </div>

    <div class="login-left">
        <div class="d-flex flex-column align-items-center justify-content-center h-100">
            <div class="tf-box">
                <img class="login-logo" src="{{ $logo }}" alt="{{ translate('logo') }}">
                <h2 class="text-center px-xl-5">Your <strong class="c1">Right <br> Choice </strong> for On <br> Demand Business</h2>
            </div>
        </div>
    </div>

    <div class="login-right-wrap">
        <div class="login-card">
            <form action="{{route('provider.auth.login')}}" enctype="multipart/form-data" method="POST" id="login-form">
                @csrf
                <div class="login-right">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h2 class="fw-bold">{{translate('provider_Sign_In')}}</h2>
                            <p>{{translate('sign_in_to_stay_connected')}}</p>
                        </div>
                        <span class="glass-badge">
                            v{{ env('SOFTWARE_VERSION') }}
                        </span>
                    </div>

                    <div class="mb-4">
                        <div class="form-floating form-floating__icon">
                            <input type="email" name="email_or_phone" class="form-control" value="{{ request()->cookie('provider_remember_email') }}"
                                    placeholder="{{translate('email')}}" required="" id="email">
                            <label>{{translate('email')}}</label>
                            <span class="material-icons" style="position: absolute; top: 50%; right: 1.25rem; transform: translateY(-50%);">mail</span>
                        </div>

                        <div class="form-floating form-floating__icon">
                            <input type="password" name="password" class="form-control" value="{{ request()->cookie('provider_remember_password') }}"
                                    placeholder="{{translate('password')}}" required="" id="password">
                            <label>{{translate('password')}}</label>
                            <span class="material-icons togglePassword" style="position: absolute; top: 50%; right: 3.5rem; transform: translateY(-50%); cursor: pointer; pointer-events: auto;">visibility_off</span>
                            <span class="material-icons" style="position: absolute; top: 50%; right: 1.25rem; transform: translateY(-50%);">lock</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember_me" value="1" id="rememberMeCheckbox" {{ request()->cookie('provider_remember_checked') ? 'checked' : '' }}>
                                <label class="form-check-label text-sm text-secondary" for="rememberMeCheckbox">{{translate('Remember me?')}}</label>
                            </div>
                            <a href="{{route('provider.auth.reset-password.index')}}" class="text-sm text-primary fw-bold text-decoration-none">{{translate('Forget Password')}}?</a>
                        </div>
                    </div>

                    <div class="recaptcha d-flex justify-content-center mb-3">
                        @php($recaptcha = business_config('recaptcha', 'third_party'))
                        @if(isset($recaptcha) && $recaptcha->is_active)
                            <div class="recaptcha d-flex justify-content-center mb-4">
                                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                                <div id="recaptcha_element" style="display: inline-block"></div>
                            </div>
                        @endif
                    </div>

                    <div class="d-grid mb-4">
                        <button class="btn btn--primary" type="submit">{{translate('login')}}</button>
                    </div>

                    @if(business_config('provider_self_registration','provider_config')->live_values??0)
                        <div class="text-center text-sm text-secondary pb-4">
                            {{translate('Want to Join as Provider')}} <a
                                href="{{route('provider.auth.sign-up')}}"
                                class="c1 fw-bold text-decoration-none ms-1">{{translate('Register Here')}}</a>
                        </div>
                    @endif
                </div>

                @if(env('APP_ENV')=='demo')
                    <div class="login-footer">
                        <div class="text-sm">
                            <div class="mb-1"><span class="text-secondary fw-bold">{{translate('Email')}}:</span> provider@provider.com</div>
                            <div><span class="text-secondary fw-bold">{{translate('Pass')}}:</span> 12345678</div>
                        </div>
                        <button type="button" class="login-copy">
                            <span class="material-icons" style="font-size: 1.25rem">content_copy</span>
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

<script src="{{asset('assets/provider-module')}}/js/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/provider-module')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/provider-module')}}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{asset('assets/provider-module')}}/js/main.js"></script>


<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script src="{{asset('assets/provider-module')}}/js/sweet_alert.js"></script>
<script src="{{asset('assets/provider-module')}}/js/toastr.js"></script>
{!! Toastr::message() !!}

@php($recaptcha = business_config('recaptcha', 'third_party'))
@if(isset($recaptcha) && $recaptcha->is_active)
    <script src="https://www.google.com/recaptcha/api.js?render={{$recaptcha->live_values['site_key']}}"></script>
    <script>
        "use strict";
        $('#signInBtn').click(function (e) {
            e.preventDefault();

            if (typeof grecaptcha === 'undefined') {
                toastr.error('Invalid recaptcha key provided. Please check the recaptcha configuration.');
                return;
            }

            grecaptcha.ready(function () {
                grecaptcha.execute('{{$recaptcha->live_values['site_key']}}', {action: 'submit'}).then(function (token) {
                    document.getElementById('g-recaptcha-response').value = token;
                    document.querySelector('form').submit();
                });
            });

            window.onerror = function(message) {
                var errorMessage = 'An unexpected error occurred.';
                if (message.includes('Invalid site key')) {
                    errorMessage = 'Invalid site key provided. Please check the site key configuration.';
                } else if (message.includes('not loaded in api.js')) {
                    errorMessage = 'reCAPTCHA API could not be loaded. Please check the API configuration.';
                }
                toastr.error(errorMessage)
                return true;
            };
        });
    </script>
@endif

<script>
    "use strict";

        @if(env('APP_ENV')=='demo')

            $('.login-copy').on('click', function () {
                copy_cred()
            })

            function copy_cred() {
                $('#email').val('provider@provider.com');
                $('#password').val('12345678');
                toastr.success('{{translate('Copied successfully')}}', 'Success', {
                    CloseButton: true,
                    ProgressBar: true
                });
            }
       @endif

        @php($recaptcha = business_config('recaptcha', 'third_party'))
        @if(isset($recaptcha) && $recaptcha->is_active)

            var onloadCallback = function () {
                grecaptcha.render('recaptcha_element', {
                    'sitekey': '{{$recaptcha->live_values['site_key']}}'
                });
            };

            $("#login-form").on('submit', function (e) {
                var response = grecaptcha.getResponse();

                if (response.length === 0) {
                    e.preventDefault();
                    toastr.error("{{translate('please_check_the_recaptcha')}}");
                }
            });
        @endif

        @if ($errors->any())

            @foreach($errors->all() as $error)
            toastr.error('{{$error}}', Error, {
                CloseButton: true,
                ProgressBar: true
            });
            @endforeach
       @endif
</script>
</body>
</html>

