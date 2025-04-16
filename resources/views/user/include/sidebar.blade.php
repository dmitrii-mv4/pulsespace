<div class="col-xl-3 col-lg-4 col-md-5 xl-25 box-col-40">
    <div class="default-according style-1 job-accordion">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h5 class="p-0">
                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">Меню пользователя</button>
              </h5>
            </div>
            <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
              <div class="card-body post-about">
                <ul>
                  <li class="user-profile-link">
                      <a href="/lk/user/{{ Auth::id() }}/" class="user-profile-link btn btn-square btn-light" type="button" data-bs-original-title="" title="">О пользователе</a>
                  </li>

                  <li class="user-profile-link">
                    <a href="/lk/user/{{ Auth::id() }}/wishlist" class="user-profile-link btn btn-square btn-light" type="button" data-bs-original-title="" title="">Лист желаний</a>
                  </li>

                  <li class="user-profile-link">
                      <a href="/lk/user/{{ Auth::id() }}/lv" class="user-profile-link btn btn-square btn-light" type="button" data-bs-original-title="" title="">Уровень аккаунта</a>
                  </li>
                  <li class="user-profile-link">
                    <a href="" class="user-profile-link btn btn-square btn-light" type="button" data-bs-original-title="" title="">Партнёрская программа</a>
                  </li>

                  @if ($user->id == auth()->id() || $user->role_id != 1)
                    <li class="user-profile-link">
                      <a href="" class="user-profile-link btn btn-square btn-light" type="button" data-bs-original-title="" title="">Настройки</a>
                    </li>
                  @endif

                  @if ($user->id != auth()->id() && $user->role_id != 1)
                    <li class="user-profile-link">
                      <a href="" class="user-profile-link btn btn-square btn-secondary" type="button" data-bs-original-title="" title="">Заблокировать</a>
                    </li>
                  @endif

                </ul>
              </div>
            </div>
          </div>
        </div>

        {{-- <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5 class="p-0">
                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon8" aria-expanded="true" aria-controls="collapseicon8">Followers</button>
              </h5>
            </div>
            <div class="collapse show" id="collapseicon8" aria-labelledby="collapseicon8" data-parent="#accordion">
              <div class="card-body social-list filter-cards-view">
                <div class="d-flex"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="/assets/images/user/2.png">
                  <div class="flex-grow-1"><span class="d-block">Bucky Barnes</span><a href="javascript:void(0)">Add Friend</a></div>
                </div>
                <div class="d-flex"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="/assets/images/user/3.png">
                  <div class="flex-grow-1"><span class="d-block">Sarah Loren</span><a href="javascript:void(0)">Add Friend</a></div>
                </div>
                <div class="d-flex"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="/assets/images/user/3.jpg">
                  <div class="flex-grow-1"><span class="d-block">Jason Borne</span><a href="javascript:void(0)">Add Friend</a></div>
                </div>
                <div class="d-flex"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="/assets/images/user/10.jpg">
                  <div class="flex-grow-1"><span class="d-block">Comeren Diaz</span><a href="javascript:void(0)">Add Friend</a></div>
                </div>
                <div class="d-flex"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="/assets/images/user/11.png">
                  <div class="flex-grow-1"><span class="d-block">Andew Jon</span><a href="javascript:void(0)">Add Friend</a></div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        {{-- <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5 class="p-0">
                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon11" aria-expanded="true" aria-controls="collapseicon11">Followings</button>
              </h5>
            </div>
            <div class="collapse show" id="collapseicon11" aria-labelledby="collapseicon11" data-parent="#accordion">
              <div class="card-body social-list filter-cards-view">
                <div class="d-flex"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="/assets/images/user/3.png">
                  <div class="flex-grow-1"><span class="d-block">Sarah Loren</span><a href="javascript:void(0)">Add Friend</a></div>
                </div>
                <div class="d-flex"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="/assets/images/user/2.png">
                  <div class="flex-grow-1"><span class="d-block">Bucky Barnes</span><a href="javascript:void(0)">Add Friend</a></div>
                </div>
                <div class="d-flex"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="/assets/images/user/10.jpg">
                  <div class="flex-grow-1"><span class="d-block">Comeren Diaz</span><a href="javascript:void(0)">Add Friend</a></div>
                </div>
                <div class="d-flex"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="/assets/images/user/3.jpg">
                  <div class="flex-grow-1"><span class="d-block">Jason Borne</span><a href="javascript:void(0)">Add Friend</a></div>
                </div>
                <div class="d-flex"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="/assets/images/user/11.png">
                  <div class="flex-grow-1"><span class="d-block">Andew Jon</span><a href="javascript:void(0)">Add Friend</a></div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        {{-- <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5 class="p-0">
                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon4" aria-expanded="true" aria-controls="collapseicon4">Latest Photos</button>
              </h5>
            </div>
            <div class="collapse show" id="collapseicon4" data-parent="#accordion" aria-labelledby="collapseicon4">
              <div class="card-body photos filter-cards-view">
                <ul>
                  <li>
                    <div class="latest-post"><img class="img-fluid" alt="" src="/assets/images/social-app/post-1.png"></div>
                  </li>
                  <li>
                    <div class="latest-post"><img class="img-fluid" alt="" src="/assets/images/social-app/post-2.png"></div>
                  </li>
                  <li>
                    <div class="latest-post"><img class="img-fluid" alt="" src="/assets/images/social-app/post-3.png"></div>
                  </li>
                  <li>
                    <div class="latest-post"><img class="img-fluid" alt="" src="/assets/images/social-app/post-4.png"></div>
                  </li>
                  <li>
                    <div class="latest-post"><img class="img-fluid" alt="" src="/assets/images/social-app/post-5.png"></div>
                  </li>
                  <li>
                    <div class="latest-post"><img class="img-fluid" alt="" src="/assets/images/social-app/post-6.png"></div>
                  </li>
                  <li>
                    <div class="latest-post"><img class="img-fluid" alt="" src="/assets/images/social-app/post-7.png"></div>
                  </li>
                  <li>
                    <div class="latest-post"><img class="img-fluid" alt="" src="/assets/images/social-app/post-8.png"></div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div> --}}
        {{-- <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5 class="p-0">
                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon13" aria-expanded="true" aria-controls="collapseicon13">Friends</button>
              </h5>
            </div>
            <div class="collapse show" id="collapseicon13" data-parent="#accordion" aria-labelledby="collapseicon13">
              <div class="card-body avatar-showcase filter-cards-view">
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/3.jpg" alt="#"></div>
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/5.jpg" alt="#"></div>
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/1.jpg" alt="#"></div>
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/2.png" alt="#"></div>
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/3.png" alt="#"></div>
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/6.jpg" alt="#"></div>
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/10.jpg" alt="#"></div>
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/14.png" alt="#"></div>
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/1.jpg" alt="#"></div>
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/4.jpg" alt="#"></div>
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/11.png" alt="#"></div>
                <div class="d-inline-block friend-pic"><img class="img-50 rounded-circle" src="/assets/images/user/8.jpg" alt="#"></div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </div>