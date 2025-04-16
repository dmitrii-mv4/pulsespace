<div class="modal fade" id="wish_list_create" tabindex="-1" aria-labelledby="wishlist_list_create"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-bottom-0 py-2 bg-grd-info">
          <h5 class="modal-title">Создать список желаний</h5>
          <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
            <i class="material-icons-outlined">close</i>
          </a>
        </div>
        <div class="modal-body">
            <form class="form-w-100" method="POST" action="{{ route('user.wishlist.list.create', $user->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
    
                <div class="modal-content">
                    <div class="modal-body">
    
                        <div class="datetime-picker">

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="title">Название: * </label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" id="title" data-bs-original-title="">
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
                        <button class="btn btn-outline-success">Создать</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
