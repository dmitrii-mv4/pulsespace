<div class="modal fade" id="wish_list_edit" tabindex="-1" aria-labelledby="wishlist_list_create"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <form class="form-w-100" method="POST" action="{{ route('user.wishlist.list.update', [$user->id, $list->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Создать список желаний</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
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
                            <label class="col-sm-3 col-form-label" for="description">Описание: </label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-success">Изменить</button>
                </div>
            </div>
        </form>

    </div>
</div>
