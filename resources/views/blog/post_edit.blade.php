@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="container-fluid">
        <form class="row g-3 needs-validation" method="POST" 
              action="{{ route('blog.post.update', $post->id) }}" 
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if($errors->any())
                <div class="alert alert-danger">
                    Исправьте следующие ошибки:
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="card col-xl-8 mx-auto">
                    <div class="card-header px-4 py-3">
                        <input type="text" 
                               name="title" 
                               class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title', $post->title) }}" 
                               placeholder="Заголовок" 
                               required>
                    </div>
                    <div class="card-body p-4">
                        <textarea name="description" 
                                  class="form-control @error('description') is-invalid @enderror" 
                                  style="height: 250px;" 
                                  placeholder="Содержание поста"
                                  required>{{ old('description', $post->description) }}</textarea>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <!-- Блок категорий -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="mb-3">Выберите тематику</h5>
                            <select class="form-select select2-hidden-accessible @error('categories') is-invalid @enderror" 
                                    name="categories[]" 
                                    multiple
                                    data-placeholder="Выберите тематику"
                                    id="prepend-append-button-multiple-field"
                                    data-select2-id="select2-data-prepend-append-button-multiple-field"
                                    tabindex="-1" 
                                    aria-hidden="true"
                                    >
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ in_array($category->id, old('categories', $selectedCategories)) ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <!-- Основное изображение -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="mb-3">Основное изображение</h5>
                            <input type="file" 
                                   name="main_image" 
                                   class="form-control">
                            @if($post->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/images/blog/'.$post->image) }}" 
                                         alt="Текущее изображение" 
                                         class="img-thumbnail" 
                                         style="max-width: 200px;">
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Дополнительные изображения -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="mb-3">Дополнительные изображения</h5>
                            <input type="file" 
                                   name="images[]" 
                                   multiple 
                                   class="form-control">
                            <div class="mt-3">
                                @foreach($post->images as $image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/images/blog/'.$image->path) }}" 
                                            class="img-thumbnail" 
                                            style="max-width: 100px;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary w-100">
                                Обновить пост
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection