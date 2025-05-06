<div class="card rounded-4">
    <div class="card-body p-4">
       <div class="position-relative mb-5">
        @if ($user->cover)
            <img src="{{ $user->cover }}" style="height: 350px; width: 100%; object-fit: cover;" class="img-fluid rounded-4 shadow" alt="">
        @else
            <img src="https://placehold.co/1920x500/png" class="img-fluid rounded-4 shadow" alt="">
        @endif
        <div class="profile-avatar position-absolute top-100 translate-middle" style="left: 10%">
            @if ($user->avatar)
              <img src="{{ $user->avatar }}" style="width: 150px; height: 150px; object-fit: cover; color:#fff" class="img-fluid rounded-circle p-1 bg-grd-danger shadow" alt="{{ $user->name }}_{{ $user->surname }}">
            @else
              <img src="https://placehold.co/110x110/png" class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170" alt="{{ $user->name }}_{{ $user->surname }}">
            @endif
        </div>
       </div>
        <div class="profile-info pt-5 d-flex align-items-center justify-content-between">
          <div class="">
            <h3>{{ $user->name }} {{ $user->surname }}</h3>
            {{-- <p class="mb-0">Engineer at BB Agency Industry<br>
             New York, United States</p> --}}
          </div>
          <div class="">
            <!-- -->
          </div>
        </div>
        <hr class="card rounded-4 border-top border-4 border-primary border-gradient-1" />
        <div class="kewords d-flex align-items-center gap-3 mt-4 overflow-x-auto">
           <a href="/lk/user/{{ $user->id }}" class="btn btn-sm btn-light rounded-5 px-4">Профиль</a>
           <a href="/lk/user/{{ $user->id }}/blog" class="btn btn-sm btn-light rounded-5 px-4">Блог</a>
           <a href="/lk/user/{{ $user->id }}/wishlist" class="btn btn-sm btn-light rounded-5 px-4">Желания пользователя</a>
        </div>
    </div>
  </div>
