<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> {{ $general->siteName(__('404')) }}</title>

        <link href="{{ asset('assets/common/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/main.css')}}">

        <style>
            .erro-body{
                height: 100vh;
            }
        </style>
    </head>

    <body>
        <section class="account">
            <div class="account-inner">
                <div class="container">
                    <div class="row gy-4 justify-content-center align-items-center erro-body">
                        <div class="col-lg-6">
                            <div class="error-wrap text-center">
                                <div class="error__text">
                                    <span>@lang('4')</span>
                                    <span>@lang('1')</span>
                                    <span>@lang('9')</span>
                                </div>
                                <h2 class="error-wrap__title">@lang('Session Expired')</h2>
                                <a href="{{route('home')}}" class="btn btn--base">
                                    <i class="la la-undo"></i> @lang('Go Home')
                                    <span style="top: 212.016px; left: 168px;"></span>
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

<script src="{{asset('assets/common/js/jquery-3.6.4.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>
</html>
