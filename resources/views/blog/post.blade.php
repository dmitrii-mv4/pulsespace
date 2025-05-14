@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <div class="header-post">
                        <h1>{{ $post->title }}</h1>

                        @if (Auth::user()->id == $post->author_user_id)
                            <div class="btn-group position-static">
                                <button type="button" style="border: none !important;" class="btn border btn-filter px-4 show" data-bs-toggle="dropdown" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal text-primary"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </button>
                                <ul class="dropdown-menu" data-popper-escaped="" data-popper-placement="top-start" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(588px, -612.8px, 0px);">
                                    <li><a class="dropdown-item" href="{{ route('blog.post.edit', $post->id) }}">Редактировать</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('blog.post.delete', $post->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger bg-transparent border-0" onclick="return confirm('Вы уверены что хотите удалить пост?')">
                                                <i class="fas fa-trash me-2"></i>Удалить
                                            </button>
                                        </form>
                                    </li>
                                    {{-- <li><a class="dropdown-item" href="{{ route('blog.post.delete', $post->id) }}" style="color: red">Удалить</a></li> --}}
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div style="margin: 15px 0px 15px 0px;">
                        {{ $post->created_at }} &bull;

                        Просмотров: {{$postViews}}
                    </div>

                    {{-- Слайдер изображений --}}
                    <div id="carouselPostIndicators" class="carousel slide" data-bs-ride="carousel">
                        <!-- Индикаторы -->
                        <ol class="carousel-indicators">
                            @foreach($post->images as $index => $image)
                                <li data-bs-target="#carouselPostIndicators" 
                                    data-bs-slide-to="{{ $index }}"
                                    class="{{ $loop->first ? 'active' : '' }}">
                                </li>
                            @endforeach
                        </ol>
                    
                        <!-- Содержимое слайдов -->
                        <div class="carousel-inner">
                            @foreach($images as $index => $item)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ asset('storage/images/blog/'.$item['path']) }}" class="d-block w-100" height="400" alt="Image {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>
                    
                        <!-- Кнопки управления -->
                        <a class="carousel-control-prev" href="#carouselPostIndicators" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselPostIndicators" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>

                    <p class="card-text" style="margin: 20px 0px 15px 0px;">{{ $post->description }}</p>
                    <span class="category-post badge bg-grd-royal">{{ $post->title }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection