@extends('layouts.home')

@section('title')
Login
@endsection

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<!-- <section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Login</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Login</li>
            </ol>
        </div>

    </div>
</section> -->
<!-- End Breadcrumbs Section -->
<!-- <section class="inner-page" style="padding-top: 200px">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="authincation-content">
          <div class="row no-gutters">
            <div class="col-xl-12">
              <div class="auth-form">
                <div class="text-center mb-3">
                  <a href="{!! url('/index'); !!}">
                    <img src="{{ asset('images/logo-full.png') }}" alt="">
                  </a>
                </div>
                <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                <form method="POST" action="{{ route('login') }}"> @csrf <div class="form-group">
                    <label for="email" class="mb-1 text-white">
                      <strong>{{ __('Email Address')}}</strong>
                    </label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required="required" autocomplete="email" autofocus="autofocus"> @error('email') <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span> @enderror
                  </div>
                  <div for="password" class="form-group">
                    <label class="mb-1 text-white">
                      <strong>{{ __('Password')}}</strong>
                    </label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required="required" autocomplete="current-password"> @error('password') <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span> @enderror
                  </div>
                  <div class="form-row d-flex justify-content-between mt-4 mb-2">
                    <div class="form-group">
                      <div class="custom-control custom-checkbox ml-1 text-white">
                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{
                                                    old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember" name="remember" id="remember">
                          {{ __('Remember Me') }}</label>
                      </div>
                    </div>
                    <div class="form-group"> @if (Route::has('password.request')) <a class="text-white" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                      </a> @endif </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-white text-primary btn-block">{{ __('Login') }}</button>
                  </div>
                </form>
                <div class="new-account mt-3">
                  <p class="text-white">Don't have an account? <a class="text-white" href="{{ route('register') }}">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section> -->
<section class="inner-page" style="padding-top: 200px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <div style="align-items: center; display: flex; justify-content: center; margin-top: 50px; ">
                          <p class="text-black">Don't have an account? <a class="text-blue" href="{{ route('register') }}">Sign up</a>
                          </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


</main>
@endsection