@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="container-fluid">

        <form class="row g-3 needs-validation" method="POST" action="{{ route('blog.post.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- вывод ошибок для пользователя --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    Иправьте следующие ошибки для публикации поста:
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
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="bsValidation1" placeholder="Заголовок" required="">
                        </div>
                        <div class="card-body p-4">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="bsValidation13" style="height: 250px;" placeholder="Чем хотели бы поделиться?" rows="3" required="">{{ old('description') }}</textarea>
                        </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card" data-select2-id="select2-data-129-o158">
                        <div class="card-body">
                            <h5 class="mb-3">Выберите тематику</h5>
                            <div class="input-group mb-0">
                                <select class="form-select select2-hidden-accessible @error('categories') is-invalid @enderror" name="categories[]" data-placeholder="Выберите тематику" id="prepend-append-button-multiple-field" multiple="multiple" data-select2-id="select2-data-prepend-append-button-multiple-field" tabindex="-1" aria-hidden="true">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" data-select2-id="select{{ $category->id }}-data-375-gc3d">
                                            {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }} 
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('categories')
                                    <div class="invalid-feedback">обязательно выберите категорию</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card" data-select2-id="select2-data-129-o158">
                        <div class="card-body">
                            <div class="input-group mb-0">
                                <div class="mb-4">
                                    <h5 class="mb-3">Загрузите изображения</h5>
                                    <small class="form-text text-muted">
                                        Первое изображение будет использовано как превью. Макс. размер: 2MB
                                    </small><br/><br/>
                                    <input type="file" 
                                           name="images[]" 
                                           multiple 
                                           class="form-control @error('images') is-invalid @enderror"
                                           accept="image/*">
                                    @error('images')
                                        <div class="invalid-feedback">Загрузите хотя бы 1 изображение</div>
                                    @enderror
                                </div>                   
                            </div>
                        </div>
                    </div>

                    <div class="card" data-select2-id="select2-data-129-o158">
                        <div class="card-body">
                            <button class="btn btn-primary" style="width: 100%">Опубликовать</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
