@extends('layouts.app')

@section('content')
    
<div class="row">

    <!-- Цитата дня -->
    <div class="col-xl-4 box-col-4">
        <div class="widget-joins card">
        <div class="card-header pb-0">
            <h5>Цитата дня</h5>
        </div>
        <div class="card-body">
            <div class="row gy-4">
            <div class="col-sm-12">
                <div class="widget-card" style="border: none; padding: 0;">
                <div class="">

                    <p>{{ $citation->text }}</p>
                    <span style="float: right">{{ $citation->author }}</span>

                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Аккаунт -->
    <div class="col-xl-4 box-col-4">
        <div class="widget-joins card">
        <div class="card-header pb-0">
            <h5>Аккаунт</h5>
        </div>
        <div class="card-body">
            <div class="row gy-4">
            <div class="col-sm-12">
                <div class="widget-card" style="border: none; padding: 0;">
                <div class="d-flex align-self-center">

                    <div class="widget-info-user-main">
                        <div class="widget-info-user">  
                            <div>Тариф: </div>
                            <div>Базовый</div>
                        </div>

                        <div class="widget-info-user">
                            <div>Стоимость: </div>
                            <div>бессплатно</div>
                        </div>

                        <div class="widget-info-user">
                            <div>До блокировки: </div>
                            <div>0 дней.</div>
                        </div>

                        <div class="btn-center">
                            <a href="/lk/" class="btn btn-outline-success px-5" data-bs-original-title="" title="">Перейти на тариф PRO</a>
                        </div>
                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Реферальная программа -->
    <div class="col-xl-4 box-col-4">
        <div class="widget-joins card">
        <div class="card-header pb-0">
            <h5>Реферальная програма</h5>
        </div>
        <div class="card-body">
            <div class="row gy-4">
            <div class="col-sm-12">
                <div class="widget-card" style="border: none; padding: 0;">
                    <div class="d-flex align-self-center">

                        <div class="widget-info-user-main">
                            <div class="widget-info-user">  
                                <div><b>Реферальная ссылка:</b> {{ $userReferralLink }}</div>
                            </div>

                            <div class="widget-info-user">
                                <div>Вознаграждение с рефералов: </div>
                                <div>10%</div>
                            </div>

                            <div class="widget-info-user">
                                <div>Зарегистрировано рефералов: </div>
                                <div>0</div>
                            </div>

                            <div class="btn-center">
                                <a href="/lk/refferal/" class="btn btn-outline-primary px-5" data-bs-original-title="" title="">Подробнее</a>
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
