<div class="col-md-6 p-0 d-flex">
        <button class="btn btn-success raised d-flex gap-2" style="margin: 0 0 0 13px;" type="button" data-bs-toggle="modal"
        data-bs-target="#wish_list_create" data-bs-original-title=""
        title="Создать лист желаний">
        <i class="fadeIn animated bx bx-list-plus"></i>
    </button>

    <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
        <li class="nav-item">
            <a href="/user/{{ $user->id }}/wishlist" class="nav-link">
                Все ({{ $wishes->count() }})
            </a>
        </li>

        @foreach ($lists as $list)
            <li class="nav-item">
                <a href="/user/{{ $user->id }}/wishlist/list/{{ $list->url }}" class="nav-link">
                    {{ $list->title }} ({{ $list->wishes_count }})
                </a>
            </li>
        @endforeach
    </ul>
</div>