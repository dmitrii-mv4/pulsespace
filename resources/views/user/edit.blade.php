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

                    <form class="form-horizontal form-bordered" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                            <div class="datetime-picker">
                                <h5>Персональная информация</h5><br/>

                                <input type="hidden" name="id" value="{{ $user->id }}">

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="inputEmail3">Имя: *</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="name" class="form-control" id="inputEmail3"  placeholder="{{ $user->name }}" data-bs-original-title="" title="{{ $user->name }}" value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="inputEmail3">Фамилия</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="surname" class="form-control" id="inputEmail3"  placeholder="{{ $user->surname }}" data-bs-original-title="" title="{{ $user->surname }}" value="{{ $user->surname }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="inputEmail3">Пол:</label>
                                    <div class="col-lg-6">
                                        <select id="gender" class="form-select input-air-primary digits" title="Пол" name="gender">

                                          @if ($user->gender == 'Не определился')
                                            <option value="{{ $user->gender }}" selected>{{ $user->gender }}</option>
                                            <option value="Мужской">Мужской</option>
                                            <option value="Женский">Женский</option>
                                          @else 
                                            <option value="Мужской">Мужской</option>
                                            <option value="Женский">Женский</option>
                                          @endif

                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="inputEmail3">Город:</label>
                                    <div class="col-sm-9">

                                      <select id="city" class="js-example-disabled-results form-select input-air-primary digits" tabindex="-1" aria-hidden="true" title="Город" name="city_id">
                                        
                                        @if ($user->city != NULL)
                                          <option value="">Выберите город</option>
                                        @endif
                                        
                                        @foreach ($citys as $city)
                                          <option {{ $city->id === $user->city_id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->city }}</option>
                                        @endforeach
                                      </select>

                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="date_of_birth">Дата рождения</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="date_of_birth" data-plugin-masked-input="" class="form-control" data-input-mask="99/99/9999" placeholder="__/__/____" value="{{ $user->date_of_birth }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                  <label class="col-sm-3 col-form-label" for="avatar">Фото профиля:
                                    <br/>
                                    <span class="user-edit-subtitle">Оставьте поле пустым, чтобы сохранить текущий аватар или загрузите новую.</span>
                                    <br/>
                                    <img alt="Аватар пользователя" src="{{ $user->avatar }}" class="user-edit-avatar">
                                  </label>

                                  <div class="col-sm-9">
                                    <input type="hidden" name="old_avatar" value="{{ $user->avatar }}">
                                    <input class="form-control" type="file" name="avatar" id="avatar" data-bs-original-title="">
                                  </div>
                                </div>

                                <div class="mb-3 row">
                                  <label class="col-sm-3 col-form-label" for="cover">Обложка профиля:
                                    <br/>
                                    <span class="user-edit-subtitle">Оставьте поле пустым, чтобы сохранить текущую обложку или загрузите новую.</span>
                                    <br/>
                                    <img alt="Обложка профиля" src="{{ $user->cover }}" class="user-edit-avatar">
                                  </label>

                                  <div class="col-sm-9">
                                    <input type="hidden" name="old_cover" value="{{ $user->cover }}">
                                    <input class="form-control" type="file" name="cover" id="cover" data-bs-original-title="">
                                  </div>
                                </div>

                            </div>

                            <hr/>

                            <div class="datetime-picker">
                                <h5>Контактная информация</h5><br/>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="inputEmail3">Почта: *</label>
                                    <div class="col-sm-9">{{ $user->email }}</div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="inputEmail3">Телефон:</label>
                                    <div class="col-sm-9">
                                      <input type="number" name="phone" class="form-control" id="phone"  placeholder="{{ $user->phone }}" data-bs-original-title="" value="{{ $user->phone }}">
                                    </div>
                                </div>
                            </div>

                            <hr/>

                            <div class="datetime-picker">
                                <h5>Системные настройки</h5><br/>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="service_theme">Тема сервиса:</label>
                                    <div class="col-sm-9">

                                        <select id="service_theme" class="js-example-disabled-results form-select input-air-primary digits" tabindex="-1" aria-hidden="true" title="Тема сервиса" name="service_theme">
                                          <option value="blue-theme" @if ($user->service_theme == 'blue-theme') selected @endif>Синяя</option>
                                          <option value="light" @if ($user->service_theme == 'light') selected @endif>Светная</option>
                                          <option value="dark" @if ($user->service_theme == 'dark') selected @endif>Тёмная</option>
                                        </select>
  
                                    </div>
                                </div>
                            </div>

                            <footer class="text-end">
                                <button class="btn btn-primary">Сохранить </button>
                            </footer>
                    </form>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
