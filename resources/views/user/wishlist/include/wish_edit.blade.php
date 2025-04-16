@foreach ($wishes as $wish)
    <div class="modal fade modal-wish" id="edit-wish-{{ $wish->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                    <h5 class="modal-title">Редактировать желание</h5>
                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                        <i class="material-icons-outlined">close</i>
                    </a>
                </div>
                <div class="modal-body">

                    <form class="form-bookmark needs-validation" method="POST"
                        action="{{ route('user.wishlist.update', [$user->id, $wish->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                  
                        <div class="card rounded-4">
                          <div class="row g-0">
                            <div class="col-md-5 border-end">
                              <div class="p-3 align-self-center">
                                <div class="input-group mb-3">
                                    <img src="{{ $wish->image }}" class="w-100 rounded-start" alt="{{ $wish->title }}">
                                    <input type="hidden" name="old_image" value="{{ $wish->image }}">
                                </div>
                                <div class="input-group mb-3">
                                    <label style="float: left">Загузить новое изображение: </label>
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="file" name="image" data-bs-original-title="" title="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-7">
                              <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label">Название: </label>
                                    <input type="text" class="form-control" name="title" required="" value="{{ $wish->title }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Ссылка: </label>
                                    <input type="url" class="form-control" name="link_buy" value="{{ $wish->link_buy }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Описание: </label>
                                    <textarea class="form-control" name="description">{{ $wish->description }}</textarea>
                                </div>

                                <label class="form-label">Цена: </label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="price" value="{{ $wish->price }}">
                                    <span class="input-group-text"><i class="fadeIn animated bx bx-ruble"></i></span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Список: </label>
                                    <select id="multiple-select-field" class="form-select select2-hidden-accessible"
                                        name="lists[]" multiple="multiple" tabindex="-1" aria-hidden="true">

                                        @foreach ($lists as $list)
                                            <option
                                                @foreach ($wish->lists as $wish_lists)
                                                    {{ $list->id === $wish_lists->id ? 'selected' : '' }} 
                                                @endforeach
                                                value="{{ $list->id }}">{{ $list->title }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                              </div>
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
@endforeach
