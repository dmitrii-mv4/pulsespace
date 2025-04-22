@extends('layouts.app')

@section('content')

  <div class="container-fluid">
    <div class="user-profile">
      <div class="row">
        <!-- include user profile header -->
        @include('user/include/header')

        <!-- include user profile sidebar -->
        {{-- @include('user/include/sidebar') --}}

        <div class="col-xl-12 col-lg-8 col-md-7 xl-80 box-col-60">
          <div class="row">
            <!-- profile post start-->
            <div class="col-sm-12">
              <div class="card">

                <div class="card-body">

                    <div class="datetime-picker">
                        <h5>Персональная информация</h5>

                        @if (!empty($user->name))
                            <div class="row">
                                <p class="col-sm-3 col-form-label">Имя:</p>
                                <p class="col-sm-9">{{ $user->name }}</p>
                            </div>
                        @endif

                        @if (!empty($user->surname))
                            <div class="row">
                                <p class="col-sm-3 col-form-label">Фамилия:</p>
                                <p class="col-sm-9">{{ $user->surname }}</p>
                            </div>
                        @endif

                        @if (!empty($user->gender))
                            <div class="row">
                                <p class="col-sm-3 col-form-label">Пол:</p>
                                <p class="col-sm-9">{{ $user->gender }}</p>
                            </div>
                        @endif

                        @if (!empty($city))
                            <div class="row">
                                <p class="col-sm-3 col-form-label">Город:</p>
                                <p class="col-sm-9">{{ $city['city'] }}</p>
                            </div>
                        @endif

                        @if (!empty($user->date_of_birth))
                            <div class="row">
                                <p class="col-sm-3 col-form-label">Дата рождения:</p>
                                <p class="col-sm-9">{{ $user->date_of_birth }}</p>
                            </div>
                        @endif

                    </div>

                    <hr/>

                    <div class="datetime-picker">
                        <h5>Контактная информация</h5>

                        @if (!empty($user->email))
                            <div class="row">
                                <p class="col-sm-3 col-form-label">Почта:</p>
                                <p class="col-sm-9">{{ $user->email }} 
                                    @if($user->email_verified_at == null) 

                                        @if (auth()->user() && !auth()->user()->hasVerifiedEmail())
                                            <div class="alert alert-warning">
                                                Ваш email не подтверждён.
                                                <form method="POST" action="{{ route('verification.send') }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-link p-0">
                                                        Отправить ссылку подтверждения
                                                    </button>
                                                </form>
                                            </div>
                                        @endif

                                    @endif
                                </p>
                            </div>
                        @endif

                        @if (!empty($user->phone))
                            <div class="row">
                                <p class="col-sm-3 col-form-label">Телефон:</p>
                                <p class="col-sm-9">{{ $user->phone }}</p>
                            </div>
                        @endif

                    </div>

                    <hr/>

                    <div class="datetime-picker">
                      <h5>Системная информация</h5>

                      <div class="row">
                          <p class="col-sm-3 col-form-label">Роль:</p>
                          <p class="col-sm-9">{{ $role['title'] }}</p>
                      </div>

                      <div class="row">
                          <p class="col-sm-3 col-form-label">Тариф аккаунта:</p>
                          <p class="col-sm-9">Класический</p>
                      </div>

                      <div class="row">
                          <p class="col-sm-3 col-form-label">Уровень аккаунта:</p>
                          <p class="col-sm-9">{{ $level['title'] }}</p>
                      </div>

                      <div class="row">
                        <p class="col-sm-3 col-form-label">Реферальная ссылка:</p>
                        <p class="col-sm-9">{{ $userReferralLink }}</p>
                    </div>

                      @if (!empty($user->created_at))
                          <div class="row">
                              <p class="col-sm-3 col-form-label">Зарегистрирован:</p>
                              <p class="col-sm-9">{{ $user->created_at }}</p>
                          </div>
                      @endif

                      @if (!empty($user->updated_at))
                          <div class="row">
                              <p class="col-sm-3 col-form-label">Последнее обновление:</p>
                              <p class="col-sm-9">{{ $user->updated_at }}</p>
                          </div>
                      @endif
                  </div>
                  
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
