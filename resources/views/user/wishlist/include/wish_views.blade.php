@foreach ($wishes as $wish)
    <div class="modal fade modal-wish" id="wish-{{ $wish->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                    <h5 class="modal-title">{{ $wish->title }} [id: {{ $wish->id }}]</h5>
                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                        <i class="material-icons-outlined">close</i>
                    </a>
                </div>
                <div class="modal-body">

                    <div class="card rounded-4">
                        <div class="row g-0">
                          <div class="col-md-5 border-end">
                            <div class="p-3 align-self-center">
                              <div class="input-group mb-3">
                                  <img src="{{ $wish->image }}" class="w-100 rounded-start" alt="{{ $wish->title }}">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-7">
                            <div class="card-body">

                                <div class="mb-3">
                                    <h2>{{ $wish->title }}</h2>
                                </div>

                                <div class="mb-3">
                                    <p>{{ $wish->description }}</p>
                                </div>

                                <div class="mt-4 d-flex align-items-center justify-content-between">
                                    @if ($wish->price)
                                        <p>{{ $wish->price }} руб.</p>
                                    @endif

                                    @if ($wish->link_buy)
                                        <div class="d-flex gap-1">
                                            <a href="{{ $wish->link_buy }}" target="_blank" class="btn btn-grd bg-grd-success border-0 d-flex gap-2 px-3" style="padding: 0.4rem 1.4rem;">Подарить</a>
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    Списки:
                                    @foreach ($wish->lists as $lists)
                                        <span class="badge bg-grd-royal">{{ $lists->title }}</span>
                                    @endforeach
                                </div>

                                <div class="mb-3">
                                    @if ($wish->done == 0)
                                        <form class="form-bookmark needs-validation" method="POST"
                                            action="{{ route('user.wishlist.update.done', [$user->id, $wish->id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')

                                            <input type="hidden" name="wish_done" value="1">
                                            <button class="btn btn-square btn-outline-success"
                                                style="padding: 0.4rem 1.4rem; width: 100%;"
                                                title="">Подарили</button>
                                        </form>
                                    @else
                                        <div class="p-4 border border-3 border-success text-center rounded bg-light">Исполнено</div>
                                    @endif
                                </div>

                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
