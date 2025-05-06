@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- include user profile header -->
                @include('user/include/header')

                <div class="col-xxl-12 col-xl-12 col-md-12 box-col-8">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body">
                            <div class="ps-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                                        aria-labelledby="pills-created-tab">
                                        <div class="card mb-0">

                                            <div class="card-header d-flex" style="justify-content: space-between;">
                                                <h5 class="mb-0">Блог</h5>
                                                <a href="{{ route('blog.post.create') }}" class="btn btn-outline-success d-flex gap-2" title="Добавить пост">
                                                    <i class="fadeIn animated bx bx-plus"></i>
                                                </a>
                                            </div>

                                            <div class="card-body pb-0">
                                                <div class="details-bookmark text-center">
                                                    <div class="row" id="bookmarkData">
                                                        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">

                                                            @foreach ($posts as $post)
                                                                <div class="col">
                                                                    <div class="card">
                                                                        <img src="{{ asset('storage/images/blog/'.$post['images'][0]['path']) }}" class="card-img-top" height="250" alt="{{ $post['title'] }}">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"><a href="{{ route('blog.post', $post['id']) }}">{{ $post['title'] }}</a></h5>
                                                                            <p class="card-text">{{ $post['description'] }}</p>

                                                                            {{-- Выводим категории --}}
                                                                            <div class="post-categories">
                                                                                @foreach($post['categories'] as $category)
                                                                                    <span class="category-post badge bg-grd-royal" style="">{{ $category['title'] }}</span>
                                                                                @endforeach
                                                                            </div>
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
                </div>

            </div>
        </div>
    </div>
@endsection
