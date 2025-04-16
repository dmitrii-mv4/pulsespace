@extends('layouts.app')

@section('content')

    <!-- popup wishlist list create -->
    @include('user/wishlist/include/list_create')

    <!-- popup wish create -->
    @include('user/wishlist/include/wish_create')

    <!-- просмотр желания -->
    @include('user/wishlist/include/wish_views')
    
    <!-- редактирование желания -->
    @include('user/wishlist/include/wish_edit')

    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- include user profile header -->
                @include('user/include/header')

                <!-- Lists -->
                <div class="col-md-12 project-list">
                    <div class="card">
                        <div class="row">

                            @include('user/wishlist/include/lists')
                            
                            <div class="col-md-6 p-0"> <!-- right --> </div>
                        </div>
                    </div>
                </div>

                <!-- include user profile sidebar -->
                {{-- @include('user/include/sidebar') --}}

                <div class="col-xxl-12 col-xl-12 col-md-12 box-col-8">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body">
                            <div class="ps-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="pills-created" role="tabpanel" aria-labelledby="pills-created-tab">
                                        <div class="card mb-0">

                                            <div class="card-header d-flex" style="justify-content: space-between;">
                                                <h5 class="mb-0">{{ $list->title }}</h5>
                                                <button class="btn btn-outline-success d-flex gap-2" type="button" data-bs-toggle="modal" data-bs-target="#wish_create" data-bs-original-title="" title="Загадать желание">
                                                    <i class="fadeIn animated bx bx-plus"></i>
                                                </button>
                                            </div>
                                            
                                            @include('user/wishlist/include/wish_cards')

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
