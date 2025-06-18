@extends('layouts.app')

@section('content')
    <!-- popup wishlist list create -->
    @include('wishlist/include/list_create')

    <!-- popup wish create -->
    @include('wishlist/include/wish_create')

    <!-- просмотр желания -->
    @include('wishlist/include/wish_views')

    <!-- редактирование желания -->
    @include('wishlist/include/wish_edit')

    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- include user profile header -->
                @include('user/include/header')

                <!-- Lists -->
                <div class="col-md-12 project-list">
                    <div class="card">
                        <div class="row">

                            @include('wishlist/include/lists')

                            <div class="col-md-6 p-0"> <!-- right --> </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade modal-list" id="edit-list-{{ $list->id }}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                                <h5 class="modal-title">Редактировать список</h5>
                                <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                    <i class="material-icons-outlined">close</i>
                                </a>
                            </div>
                            <div class="modal-body">

                                <form class="form-w-100" method="POST"
                                    action="{{ route('wishlist.list.update', [$user->id, $list->id]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')

                                        <div class="datetime-picker">

                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Название: </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="title" required="" value="{{ $list->title }}">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Описание: </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="description">{{ $list->description }}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-outline-success">Обновить</button>
                                    </div>

                                </form>
                            </div>
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
                                    <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                                        aria-labelledby="pills-created-tab">
                                        <div class="card mb-0">

                                            <div class="card-header d-flex" style="justify-content: space-between;">

                                                <h5 class="mb-0">
                                                    {{ $list->title }}

                                                    <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-settings text-primary">
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                            <path
                                                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                                            </path>
                                                        </svg>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                                                        <a href=""
                                                            class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                            title="Редактировать список"
                                                            onclick="editlist({{ $list->id }})" data-bs-toggle="modal"
                                                            data-bs-target="#edit-list-{{ $list->id }}">
                                                            <i class="fadeIn animated bx bx-edit"></i> Редактировать
                                                        </a>

                                                        <form
                                                            action="{{ route('wishlist.list.destroy', [$user->id, $list->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <input type="hidden" name="user_id"
                                                                value="{{ $user->id }}">

                                                            <button type="submit" style="border: none; background: none;"
                                                                class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                                title="Удалить">
                                                                <i class="fadeIn animated bx bx-trash"
                                                                    style="color: red;"></i> Удалить
                                                            </button>
                                                        </form>
                                                    </div>
                                                </h5>
                                                
                                                <button class="btn btn-outline-success d-flex gap-2" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#wish_create"
                                                    data-bs-original-title="" title="Загадать желание">
                                                    <i class="fadeIn animated bx bx-plus"></i>
                                                </button>
                                            </div>

                                            @include('wishlist/include/wish_cards')

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
