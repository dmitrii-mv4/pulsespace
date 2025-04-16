<div class="card-body pb-0">
    <div class="details-bookmark text-center">
        <div class="row" id="bookmarkData">

            @foreach($wishes as $wish)

                <!-- список желаний -->
                <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-sm-6 box-col-4">
                    <div class="wish-card card bookmark-card o-hidden">
                        <div class="details-website">
                            <div style="background-image:url('{{ $wish->image }}'); background-repeat: no-repeat; background-size: cover; height: 300px; background-position: 50% 0px; border-radius: 5px 5px 0 0;"></div>

                                @if ($user->id == auth()->id())

                                    {{-- <div class="wishlist-btn-detal-option-icon favourite-icon favourite_0">
                                        <a href="" title="Добавить к себе"><i class="fa fa-heart"></i></a>
                                    </div>

                                    <div id="wishShareUrl" style="display: none">4323432</div>

                                    <button type="button" style="margin: 70px 0 0 0px; border: none;" class="wishlist-btn-detal-option-icon favourite-icon favourite_0" data-clipboard-action="copy" data-clipboard-target="#wishShareUrl" data-bs-original-title>
                                    <div style="margin: 70px 0 0 0px;" class="wishlist-btn-detal-option-icon favourite-icon favourite_0">
                                        <a href="" title="Поделиться ссылкой">
                                            <i class="fa fa-share-alt"></i>
                                        </a>
                                    </div>
                                    </button>  --}}

                                    <div class="wish-option">
                                        <div class="wish-option-item">
                                            <a href="" title="Редактировать" onclick="editwish({{$wish->id}})" data-bs-toggle="modal" data-bs-target="#edit-wish-{{$wish->id}}"><i class="fadeIn animated bx bx-edit"></i></a>
                                        </div>

                                        <div class="wish-option-item">
                                            <form action="{{ route('user.wishlist.destroy', [$user->id, $wish->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="user_id" value="{{ $user->id }}">

                                                <button type="submit" style="border: none; background: none;" class="wishlist-btn-detal-option-icon favourite-icon favourite_0" title="Удалить">
                                                    {{-- <a href="" title="Удалить"><i class="icofont icofont-ui-delete"></i></a> --}}
                                                    <i class="fadeIn animated bx bx-trash" style="color: red;"></i>
                                                </button> 
                                            </form>
                                        </div>
                                    </div>

                                @endif
                                
                            <div class="wish-title">
                                <h6>{{ $wish->title }}</h6>
                            </div>

                            <a href="" class="btn ripple btn-primary px-5 wishlist-btn-detal favourite-icon" onclick="editwish({{$wish->id}})" data-bs-toggle="modal" data-bs-target="#wish-{{$wish->id}}">Посмотреть</a>
                        </div>
                    </div>
                </div>

            @endforeach
       
        </div>
    </div>
</div>