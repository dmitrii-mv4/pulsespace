@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="row-cols-4 row-cols-lg-6 row-cols-xl-1">
            @foreach($posts as $post)
                <div class="col">
                    <div class="card" style="margin: 0px auto 20px auto; width: 60%;">
                        <div class="card-header">
                            <a href="{{route('user.user', $post['user']['id'])}}">
                                <img src="{{$post['user']['avatar']}}" class="img-fluid rounded-circle p-1" width="70" height="70" alt=" {{$post['user']['name'], $post['user']['surname']}}">
                                {{$post['user']['name'], $post['user']['surname']}}
                            </a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title"><a href="{{route('blog.post', $post['id'])}}">{{ $post['title'] }}</a></h5>
                            <p class="card-text">{{ $post['description'] }}</p>
                        </div>

                        {{-- Слайдер изображений --}}
                        <div id="carouselPostIndicators_{{$post['id']}}" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($post['images'] as $index => $image)
                                    <li data-bs-target="#carouselPostIndicators_{{$post['id']}}" 
                                        data-bs-slide-to="{{ $index }}"
                                        class="{{ $loop->first ? 'active' : '' }}">
                                    </li>
                                @endforeach
                            </ol>
                        
                            <div class="carousel-inner">
                                @foreach($post['images'] as $index => $image)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset('storage/images/blog/'.$image['path']) }}" 
                                             class="d-block w-100" 
                                             height="400" 
                                             alt="{{ $post['title'] }}">
                                    </div>
                                @endforeach
                            </div>
                        
                            <button class="carousel-control-prev" 
                                    type="button" 
                                    data-bs-target="#carouselPostIndicators_{{$post['id']}}" 
                                    data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            
                            <button class="carousel-control-next" 
                                    type="button" 
                                    data-bs-target="#carouselPostIndicators_{{$post['id']}}" 
                                    data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                      
                        <div class="blog-post-categories">
                            <span class="category-post badge bg-grd-royal" style="">Маркетинг</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
