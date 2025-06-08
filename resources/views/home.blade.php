@extends('layouts.app')

@section('content')

<!-- просмотр желания -->
    @include('wishlist/include/wish_views')

    <div class="col-xxl-12 col-xl-12 col-md-12 box-col-8">
        <div class="email-right-aside bookmark-tabcontent">
            <div class="card email-body">
                <div class="ps-0">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                            aria-labelledby="pills-created-tab">
                            <div class="card mb-0">

                                <div class="card-header d-flex" style="justify-content: space-between;">
                                    <h5 class="mb-0">Категории</h5>
                                </div>

                                <div class="card-body pb-0">
                                    <div class="details-bookmark text-center">
                                        <div class="row" id="bookmarkData">

                                           список


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

    <div class="col-xxl-12 col-xl-12 col-md-12 box-col-8">
        <div class="email-right-aside bookmark-tabcontent">
            <div class="card email-body">
                <div class="ps-0">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                            aria-labelledby="pills-created-tab">
                            <div class="card mb-0">

                                <div class="card-header d-flex" style="justify-content: space-between;">
                                    <h5 class="mb-0">Желания подписчиков</h5>
                                </div>

                                <div class="card-body pb-0">
                                    <div class="details-bookmark text-center">
                                        <div class="row" id="bookmarkData">

                                            <!-- список желаний -->
                                            <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-sm-6 box-col-4">
                                                <div class="wish-card card bookmark-card o-hidden">
                                                    <div class="details-website">
                                                        <div style="background-image:url('/storage/images/wishlists/2025-06-06_192729.png'); background-repeat: no-repeat; background-size: cover; height: 300px; background-position: 50% 0px; border-radius: 5px 5px 0 0;"></div>

                                                        <div class="wish-title">
                                                            <h6>erewdw</h6>
                                                        </div>

                                                        <a href=""
                                                            class="btn ripple btn-primary px-5 wishlist-btn-detal favourite-icon"
                                                            onclick="editwish(1)" data-bs-toggle="modal"
                                                            data-bs-target="#wish-1">Посмотреть</a>
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
            </div>
        </div>
    </div>

    <div class="col-xxl-12 col-xl-12 col-md-12 box-col-8">
        <div class="email-right-aside bookmark-tabcontent">
            <div class="card email-body">
                <div class="ps-0">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                            aria-labelledby="pills-created-tab">
                            <div class="card mb-0">

                                <div class="card-header d-flex" style="justify-content: space-between;">
                                    <h5 class="mb-0">Идеи для подарков</h5>
                                </div>

                                <div class="card-body pb-0">
                                    <div class="details-bookmark text-center">
                                        <div class="row" id="bookmarkData">

                                            <!-- список желаний -->
                                            @foreach($wishes as $wish)
                                                <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-sm-6 box-col-4">
                                                    <div class="wish-card card bookmark-card o-hidden">
                                                        <div class="details-website">
                                                            <div style="background-image:url('{{ $wish->image }}'); background-repeat: no-repeat; background-size: cover; height: 300px; background-position: 50% 0px; border-radius: 5px 5px 0 0;"></div>

                                                            <div class="wish-title">
                                                                <h6>{{ $wish->title }}</h6>
                                                            </div>

                                                            <a href=""
                                                                class="btn ripple btn-primary px-5 wishlist-btn-detal favourite-icon"
                                                                onclick="editwish({{$wish->id}})" data-bs-toggle="modal"
                                                                data-bs-target="#wish-{{$wish->id}}">Посмотреть</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            
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
