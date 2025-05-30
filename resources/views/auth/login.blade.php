@extends('layouts.guest')

@section('content')
    
<div class="section-authentication-cover">
    <div class="">
      <div class="row g-0">

        <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex border-end bg-transparent">

          <div class="card rounded-0 mb-0 border-0 shadow-none bg-transparent bg-none">
            <div class="card-body">
              <img src="/assets/images/auth/login1.png" class="img-fluid auth-img-cover-login" width="650" alt="">
            </div>
          </div>

        </div>

        <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center border-top border-4 border-primary border-gradient-1">
          <div class="card rounded-0 m-3 mb-0 border-0 shadow-none bg-none">
            <div class="card-body p-sm-5">
              <!-- <img src="/assets/images/logo.png" width="210" alt=""> -->
              <div class="logo-text mb-3" data-splitting>Pulse Space</div>
              <h4 class="fw-bold">Добро пожаловать к нам!</h4>
              <p class="mb-0">Войдите в свой аккаунт</p>

              <div class="separator section-padding">
                <div class="line"></div>
                <p class="mb-0 fw-bold"><i class="lni lni-arrow-down-circle"></i></p>
                <div class="line"></div>
              </div>

              <div class="form-body mt-4">
                <form method="POST" action="{{ route('login') }}" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="inputEmailAddress" class="form-label">{{ __('Email:') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" name="email" value="{{ old('email') }}" required="" autocomplete="email" autofocus placeholder="Test@gmail.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="inputChoosePassword" class="form-label">Password</label>
                        <div class="input-group" id="show_hide_password">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputChoosePassword" name="password" required="" autocomplete="current-password" placeholder="*********"> 
                        <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                  <div class="col-md-6">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                      <label class="form-check-label" for="flexSwitchCheckChecked">Запомнить меня</label>
                    </div>
                  </div>
                  <div class="col-md-6 text-end">	<a href="auth-cover-forgot-password.html">Забыли пароль ?</a>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-grd-primary">Войти</button>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="text-start">
                      <p class="mb-0">Нет аккаунта? <a href="/register/">Зарегистрироваться</a>
                      </p>
                    </div>
                  </div>
                </form>
              </div>

          </div>
          </div>
        </div>

      </div>
      <!--end row-->
    </div>
  </div>

  <script>
    $(document).ready(function () {
      $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bi-eye-slash-fill");
          $('#show_hide_password i').removeClass("bi-eye-fill");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bi-eye-slash-fill");
          $('#show_hide_password i').addClass("bi-eye-fill");
        }
      });
    });
  </script>

@endsection
