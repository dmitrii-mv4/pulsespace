@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <h2>Реферальная программа</h2>
                    {{-- <div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div> --}}
                </div>

                <div class="col-xl-12 col-lg-8 col-md-7 xl-80 box-col-60">
                    <div class="row">
                        <!-- profile post start-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">

                                    <div><b>Статистика</b></div>
                                    <div class="card-header p-3">
                                        <div><b>Реферальная ссылка:</b> {{ $userReferralLink }}</div><br/>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="d-flex flex-row gap-3 align-items-center justify-content-center border p-3 rounded-3 flex-fill">
                                                <div class="">
                                                    <p class="mb-0">Переходов по ссылке:</p>
                                                    <h5 class="mb-0" style="text-align: center">{{ $referralsCount }}</h5>
                                                </div>
                                                <div class="vr"></div>

                                                <div class="">
                                                    <p class="mb-0">Пользователей зарегистрировано:</p>
                                                    <h5 class="mb-0" style="text-align: center">{{ count($referrals) }}</h5>
                                                </div>
                                                <div class="vr"></div>

                                                <div class="">
                                                    <p class="mb-0">Прибыль за всё время:</p>
                                                    <h5 class="mb-0" style="text-align: center">0 ₽</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                              <div class="card-body">

                                  <div><b>Условие</b></div>
                                  <hr/>

                                  <div style="display: flex; justify-content: space-between;">
                                    <div style="width: 45%;">
                                      <p>1. Возвращаем 10% за покупку и продление VIP аккаунта реферала</p>
                                      <p>2. Возвращаем 5% за приобретённую услугу на нашем сервисе с реферала</p>
                                    </div>

                                    <div style="width: 45%;">
                                      Выплаты проводятся по запросу до 30 дней.
                                    </div>
                                  </div>
                              </div>
                            </div>

                            <div class="card">
                              <div class="card-body">

                                  <div><b>Мои рефералы</b></div>
                                  <hr/>

                                  <table class="table table-sm mb-0">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Имя</th>
                                        <th scope="col">Доход</th>
                                        <th scope="col">Регистрации</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                      @forelse ($referrals as $referral)
                                        <tr>
                                          <th scope="row">{{ $loop->iteration }}</th>
                                          <td>{{ $referral->name }}</td>
                                          <td>0 ₽</td>
                                          <td>{{ $referral->created_at }}</td>
                                        </tr>
                                      @empty
                                        <tr>
                                          <td colspan="4">Нет рефералов</td>
                                        </tr>
                                      @endforelse

                                    </tbody>
                                  </table>
                              </div>
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
