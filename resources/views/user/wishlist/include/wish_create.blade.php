<div class="modal fade" id="wish_create" tabindex="-1" aria-labelledby="wish_create" style="display: none; wi"
    aria-hidden="true">
    <div class="modal-wishlist-create modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form class="form-w-100" method="POST" action="{{ route('user.wishlist.create', $user->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="modal-content">
                    <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                        <h5 class="modal-title">Загадать желание</h5>
                        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                            <i class="material-icons-outlined">close</i>
                        </a>
                    </div>
                    <div class="modal-body">

                        <div class="datetime-picker">

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="title">Название: * </label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" id="title"
                                        data-bs-original-title="">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="link_buy">Ссылка: </label>
                                <div class="col-sm-9">
                                    <input type="url" name="link_buy" class="form-control" id="link_buy"
                                        data-bs-original-title="">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="image">Изображение: </label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="image" data-bs-original-title=""
                                        title="">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="description">Описание: </label>
                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="price">Цена: </label>
                                <div class="input-group" style="width: 75%;">
                                    <input class="form-control" name="price" type="number">
                                    <span class="input-group-text"><i class="fadeIn animated bx bx-ruble"></i></span>
                                </div>
                                {{-- <div class="col-sm-8" style="display: flex; align-items: center;">
                                        <input type="number" name="price" class="form-control" id="price" data-bs-original-title=""> <i class="fa fa-rub" style=""></i>
                                    </div> --}}
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="lists">Список: </label>
                                <div class="col-sm-9">
                                    <select id="multiple-select-field" class="form-select select2-hidden-accessible"
                                        name="lists[]" multiple="multiple" tabindex="-1" aria-hidden="true">

                                        @foreach ($lists as $list)
                                            <option value="{{ $list->id }}">{{ $list->title }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                {{-- <span class="select2 select2-container select2-container--default select2-container--above" dir="ltr" style="width: 1509px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-success">Загадать</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
