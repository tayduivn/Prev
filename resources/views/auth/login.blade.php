@extends('layouts.app')
@section('title', __('Login'))
@section('headJS')
  @if (config('app.captcha_status') && config('app.captcha_type') == 'recaptcha')
  {!! htmlScriptTagJsApi() !!}
  @endif
@stop
@section('content')
<div class="nk-block p-0 p-md-3 mt-8 nk-block-middle nk-auth-body wide-xs mt-5 mb-5">
   <div class="card card-shadow bdrs-20">
      <div class="card-inner card-inner-lg">
         <div class="nk-block-head">
            <div class="nk-block-head-content">
               <h4 class="nk-block-title">{{ __('Login') }}</h4>
               <div class="nk-block-des">
                  <p>{{ __('Use the form below to login to our dashboard') }}</p>
               </div>
            </div>
         </div>
       <form method="POST" action="{{ route('login') }}">
          @csrf
            <div class="form-group">
               <div class="form-label-group"><label class="form-label" for="default-01">{{ __('Email or Username') }}</label></div>
               <input type="text" class="form-control form-control-lg @error('user') is-invalid @enderror" id="default-01" placeholder="{{ __('Enter your email address or username') }}" name="user" value="{{ old('username') }}" autocomplete="user" autofocus>
            </div>
            @error('user')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group">
               <div class="form-label-group">
                <label class="form-label" for="password">{{ __('Password') }}</label>
                <a class="link link-primary link-sm" href="{{ route('resetpassword') }}">{{ __('messages.login.forgot-password') }}</a>
               </div>
               <div class="form-control-wrap">
                <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                  <em class="passcode-icon icon-show icon ni ni-eye"></em>
                  <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
               </a>
                <input type="password" class="form-control form-control-lg pl-4 @error('password') is-invalid @enderror" id="password" placeholder="{{ __('Enter your password') }}" name="password" autocomplete="current-password">
              </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="col-6 p-0 mb-2 mt-3">
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">
                  <span class="text-muted">{{ __('Remember me') }}</span>
                </label>
              </div>
            </div>
            @if (config('app.captcha_status') && config('app.captcha_type') == 'recaptcha')
            {!! htmlFormSnippet() !!}
            @endif
            @if (config('app.captcha_status') && config('app.captcha_type') == 'default')
            <div class="row mt-3 mb-4">
              <div class="col-md-6 mb-4 mb-md-0">
                <div class="bdrs-20 p-2 text-center card-shadow">
                   {!! captcha_img() !!}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                   <input type="text" class="form-control form-control-lg @error('captcha') is-invalid @enderror" placeholder="{{ __('Captcha') }}" name="captcha">
                </div>
              </div>
            </div>
            @endif
            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-primary btn-block">{{ __('Login') }}</button>
            </div>
         </form>
        @if ($website->registration)
         <div class="form-note-s2 text-center pt-4">{{ __('Are you new here?') }} <a href="{{ route('register') }}">{{ __('Create account') }}</a>
        @endif
          @if (config('app.facebook_status') == 1 || config('app.google_status') == 1)
          <div class="text-center pt-4 pb-3">
            <h6 class="overline-title overline-title-sap"><span>{{ __('or') }}</span></h6>
          </div>
          @endif
          <ul class="nav justify-center gx-4">
            @if (config('app.facebook_status') == 1)
            <li class="nav-item"><a class="nav-link" href="{{ route('user-auth-facebook') }}">{{ __('Facebook') }}</a></li>
            @endif
            @if (config('app.google_status') == 1)
            <li class="nav-item"><a class="nav-link" href="{{ route('user-auth-google') }}">{{ __('Google') }}</a></li>
            @endif
          </ul>
         </div>
      </div>
   </div>
</div>
@endsection
