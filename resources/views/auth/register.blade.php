@extends('layouts.guest')

@section('content')
<div class="section-authentication-cover">
    <div class="">
      <div class="row g-0">

        <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex border-end bg-transparent">

          <div class="card rounded-0 mb-0 border-0 shadow-none bg-transparent bg-none">
            <div class="card-body">
              <img src="assets/images/auth/register1.png" class="img-fluid auth-img-cover-login" width="500"
                alt="">
            </div>
          </div>

        </div>

        <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center border-top border-4 border-primary border-gradient-1">
            <div class="card rounded-0 m-3 mb-0 border-0 shadow-none bg-none">
              <div class="card-body p-sm-5">
                <div class="logo-text mb-3" data-splitting>Pulse Space</div>
                <!-- <img src="/assets/images/logo.png" width="210" alt=""> -->
                <h4 class="fw-bold">Начни сейчас!</h4>
                <p class="mb-0">Зарегистрируйте свой аккаунт</p>
  
                <div class="separator section-padding">
                  <div class="line"></div>
                  <p class="mb-0 fw-bold"><i class="lni lni-arrow-down-circle"></i></p>
                  <div class="line"></div>
                </div>
  
                <div class="form-body mt-4">
                  <form method="POST" action="{{ route('register') }}" class="row g-3">
                      @csrf

                      <div class="col-12">
                        <label for="name" class="form-label">Имя:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="col-12">
                          <label for="inputEmailAddress" class="form-label">{{ __('Email:') }}</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required="" autocomplete="email" autofocus placeholder="Test@gmail.com">
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
  
                      <div class="col-12">
                          <label for="inputChoosePassword" class="form-label">{{ __('Пароль:') }}</label>
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

                      <div class="col-12">
                        <label for="inputChoosePassword" class="form-label">{{ __('Подтвердите пароль:') }}</label>
                        <div class="input-group" id="show_hide_password">
                        <input type="password" class="password-confirm form-control @error('password') is-invalid @enderror" id="inputChoosePassword" name="password_confirmation" required="" autocomplete="current-password" placeholder="*********"> 
                        <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                      <label for="referal_code" class="form-label">Код партнёра:</label>
                      <input type="text" name="referral_code" class="form-control" id="referal_code" value="{{ old('referral', request()->get('referral', '')) }}" autocomplete="referral_code" autofocus>
                    </div>

                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-grd-primary">Зарегистрироваться</button>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="text-start">
                        <p class="mb-0">Есть аккаунт? <a href="/login/">Войти</a>
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
@endsection
