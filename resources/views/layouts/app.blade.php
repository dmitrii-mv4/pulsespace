<!DOCTYPE html>
<html lang="en" data-bs-theme="{{ Auth::check() ? auth()->user()->service_theme : 'light' }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Pulse Space') }}</title>
    <!--favicon-->
    <link rel="icon" href="/assets/images/favicon.ico" type="image/png">

    <link rel="stylesheet" href="/assets/css/custom.css">

    <!-- loader-->
    <link href="/assets/css/pace.min.css" rel="stylesheet">
    <script src="/assets/js/pace.min.js"></script>

    <!--plugins-->
    <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/plugins/metismenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/plugins/metismenu/mm-vertical.css">
    <link rel="stylesheet" type="text/css" href="/assets/plugins/simplebar/css/simplebar.css">
    <link rel="stylesheet" type="text/css" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
    <!--bootstrap css-->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="/assets/sass/main.css" rel="stylesheet">
    <link href="/assets/sass/dark-theme.css" rel="stylesheet">
    <link href="/assets/sass/blue-theme.css" rel="stylesheet">
    <link href="/assets/sass/semi-dark.css" rel="stylesheet">
    <link href="/assets/sass/bordered-theme.css" rel="stylesheet">
    <link href="/assets/sass/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/extra-icons.css">
    <link href="/assets/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet">

</head>

<body>
    {{-- Уведомления --}}
    @if (session('success'))
        <div class="notification-toast" id="notification-toast">
            <div class="notification-icon bg-success">
                <a href="javascript:;"
                    class="mb-3 text-white rounded-circle d-flex align-items-center justify-content-center">
                    <i class="material-icons-outlined fs-2">check_circle</i>
                </a>
            </div>
            <div class="notification-content">
                {{-- <h5 class="notification-title">Успешно!</h5> --}}
                <p class="notification-text">{{ session('success') }}</p>
            </div>
            <button type="button" class="btn-close" onclick="hideNotification()"></button>
        </div>
    @endif

    <!--start header-->
    <header class="top-header">

        <nav class="navbar navbar-expand align-items-center gap-4">

            <div>
                <h1><a href="/">Pulse Space</a></h1>
            </div>
            {{-- <div class="btn-toggle">
          <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
        </div> --}}
            <div class="search-bar flex-grow-1">
                {{-- <div class="position-relative">
            <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text" placeholder="Search">
            <span class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
            <span class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close">close</span>
            <div class="search-popup p-3">
              <div class="card rounded-4 overflow-hidden">
                <div class="card-header d-lg-none">
                  <div class="position-relative">
                    <input class="form-control rounded-5 px-5 mobile-search-control" type="text" placeholder="Search">
                    <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                    <span class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
                   </div>
                </div>
                <div class="card-body search-content">
                  <p class="search-title">Recent Searches</p>
                  <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                    <a href="javascript:;" class="kewords"><span>Angular Template</span><i
                        class="material-icons-outlined fs-6">search</i></a>
                    <a href="javascript:;" class="kewords"><span>Dashboard</span><i
                        class="material-icons-outlined fs-6">search</i></a>
                    <a href="javascript:;" class="kewords"><span>Admin Template</span><i
                        class="material-icons-outlined fs-6">search</i></a>
                    <a href="javascript:;" class="kewords"><span>Bootstrap 5 Admin</span><i
                        class="material-icons-outlined fs-6">search</i></a>
                    <a href="javascript:;" class="kewords"><span>Html eCommerce</span><i
                        class="material-icons-outlined fs-6">search</i></a>
                    <a href="javascript:;" class="kewords"><span>Sass</span><i
                        class="material-icons-outlined fs-6">search</i></a>
                    <a href="javascript:;" class="kewords"><span>laravel 9</span><i
                        class="material-icons-outlined fs-6">search</i></a>
                  </div>
                  <hr>
                  <p class="search-title">Tutorials</p>
                  <div class="search-list d-flex flex-column gap-2">
                    <div class="search-list-item d-flex align-items-center gap-3">
                      <div class="list-icon">
                        <i class="material-icons-outlined fs-5">play_circle</i>
                      </div>
                      <div class="">
                        <h5 class="mb-0 search-list-title ">Wordpress Tutorials</h5>
                      </div>
                    </div>
                    <div class="search-list-item d-flex align-items-center gap-3">
                      <div class="list-icon">
                        <i class="material-icons-outlined fs-5">shopping_basket</i>
                      </div>
                      <div class="">
                        <h5 class="mb-0 search-list-title">eCommerce Website Tutorials</h5>
                      </div>
                    </div>
    
                    <div class="search-list-item d-flex align-items-center gap-3">
                      <div class="list-icon">
                        <i class="material-icons-outlined fs-5">laptop</i>
                      </div>
                      <div class="">
                        <h5 class="mb-0 search-list-title">Responsive Design</h5>
                      </div>
                    </div>
                  </div>
    
                  <hr>
                  <p class="search-title">Members</p>
    
                  <div class="search-list d-flex flex-column gap-2">
                    <div class="search-list-item d-flex align-items-center gap-3">
                      <div class="memmber-img">
                        <img src="https://placehold.co/110x110/png" width="32" height="32" class="rounded-circle" alt="">
                      </div>
                      <div class="">
                        <h5 class="mb-0 search-list-title ">Andrew Stark</h5>
                      </div>
                    </div>
    
                    <div class="search-list-item d-flex align-items-center gap-3">
                      <div class="memmber-img">
                        <img src="https://placehold.co/110x110/png" width="32" height="32" class="rounded-circle" alt="">
                      </div>
                      <div class="">
                        <h5 class="mb-0 search-list-title ">Snetro Jhonia</h5>
                      </div>
                    </div>
    
                    <div class="search-list-item d-flex align-items-center gap-3">
                      <div class="memmber-img">
                        <img src="https://placehold.co/110x110/png" width="32" height="32" class="rounded-circle" alt="">
                      </div>
                      <div class="">
                        <h5 class="mb-0 search-list-title">Michle Clark</h5>
                      </div>
                    </div>
    
                  </div>
                </div>
                <div class="card-footer text-center bg-transparent">
                  <a href="javascript:;" class="btn w-100">See All Search Results</a>
                </div>
              </div>
            </div>
          </div> --}}
            </div>
            <ul class="navbar-nav gap-1 nav-right-links align-items-center">
                <li class="nav-item d-lg-none mobile-search-btn">
                    <a class="nav-link" href="javascript:;"><i class="material-icons-outlined">search</i></a>
                </li>
                {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;" data-bs-toggle="dropdown"><img src="assets/images/county/09.jpg" width="22" alt="" style="border-radius: 10px;">
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/01.png" width="20" alt=""><span class="ms-2">English</span></a>
              </li>
              <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/02.png" width="20" alt=""><span class="ms-2">Catalan</span></a>
              </li>
              <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/03.png" width="20" alt=""><span class="ms-2">French</span></a>
              </li>
              <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/04.png" width="20" alt=""><span class="ms-2">Belize</span></a>
              </li>
              <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/05.png" width="20" alt=""><span class="ms-2">Colombia</span></a>
              </li>
              <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/06.png" width="20" alt=""><span class="ms-2">Spanish</span></a>
              </li>
              <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/07.png" width="20" alt=""><span class="ms-2">Georgian</span></a>
              </li>
              <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/08.png" width="20" alt=""><span class="ms-2">Hindi</span></a>
              </li>
              <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/09.jpg" width="20" alt="" style="border-radius: 10px;"><span class="ms-2">Русский</span></a>
              </li>
            </ul>
          </li> --}}

                {{-- <li class="nav-item dropdown position-static d-md-flex d-none">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
            data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">done_all</i></a>
            <div class="dropdown-menu dropdown-menu-end mega-menu shadow-lg p-4 p-lg-5">
              <div class="mega-menu-widgets">
               <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4 g-lg-5">
                  <div class="col">
                    <div class="card rounded-4 shadow-none border mb-0">
                      <div class="card-body">
                        <div class="d-flex align-items-start gap-3">
                          <div class="mega-menu-icon flex-shrink-0 bg-danger">
                            <i class="material-icons-outlined">question_answer</i>
                          </div>
                          <div class="mega-menu-content">
                             <h5>Marketing</h5>
                             <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                               the visual form of a document.</p>
                          </div>
                       </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card rounded-4 shadow-none border mb-0">
                      <div class="card-body">
                        <div class="d-flex align-items-start gap-3">
                          <img src="assets/images/megaIcons/02.png" width="40" alt="">
                          <div class="mega-menu-content">
                             <h5>Website</h5>
                             <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                               the visual form of a document.</p>
                          </div>
                       </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card rounded-4 shadow-none border mb-0">
                      <div class="card-body">
                        <div class="d-flex align-items-start gap-3">
                          <img src="assets/images/megaIcons/03.png" width="40" alt="">
                          <div class="mega-menu-content">
                              <h5>Subscribers</h5>
                             <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                               the visual form of a document.</p>
                          </div>
                       </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card rounded-4 shadow-none border mb-0">
                      <div class="card-body">
                        <div class="d-flex align-items-start gap-3">
                          <img src="assets/images/megaIcons/01.png" width="40" alt="">
                          <div class="mega-menu-content">
                             <h5>Hubspot</h5>
                             <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                               the visual form of a document.</p>
                          </div>
                       </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card rounded-4 shadow-none border mb-0">
                      <div class="card-body">
                        <div class="d-flex align-items-start gap-3">
                          <img src="assets/images/megaIcons/11.png" width="40" alt="">
                          <div class="mega-menu-content">
                             <h5>Templates</h5>
                             <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                               the visual form of a document.</p>
                          </div>
                       </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card rounded-4 shadow-none border mb-0">
                      <div class="card-body">
                        <div class="d-flex align-items-start gap-3">
                          <img src="assets/images/megaIcons/13.png" width="40" alt="">
                          <div class="mega-menu-content">
                             <h5>Ebooks</h5>
                             <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                               the visual form of a document.</p>
                          </div>
                       </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card rounded-4 shadow-none border mb-0">
                      <div class="card-body">
                        <div class="d-flex align-items-start gap-3">
                          <img src="assets/images/megaIcons/12.png" width="40" alt="">
                          <div class="mega-menu-content">
                             <h5>Sales</h5>
                             <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                               the visual form of a document.</p>
                          </div>
                       </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card rounded-4 shadow-none border mb-0">
                      <div class="card-body">
                        <div class="d-flex align-items-start gap-3">
                          <img src="assets/images/megaIcons/08.png" width="40" alt="">
                          <div class="mega-menu-content">
                             <h5>Tools</h5>
                             <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                               the visual form of a document.</p>
                          </div>
                       </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card rounded-4 shadow-none border mb-0">
                      <div class="card-body">
                        <div class="d-flex align-items-start gap-3">
                          <img src="assets/images/megaIcons/09.png" width="40" alt="">
                          <div class="mega-menu-content">
                             <h5>Academy</h5>
                             <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                               the visual form of a document.</p>
                          </div>
                       </div>
                      </div>
                    </div>
                  </div>
               </div><!--end row-->
              </div>
            </div>
          </li> --}}
                {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
              data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">apps</i></a>
            <div class="dropdown-menu dropdown-menu-end dropdown-apps shadow-lg p-3">
              <div class="border rounded-4 overflow-hidden">
                <div class="row row-cols-3 g-0 border-bottom">
                  <div class="col border-end">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/01.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">Gmail</p>
                      </div>
                    </div>
                  </div>
                  <div class="col border-end">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/02.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">Skype</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/03.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">Slack</p>
                      </div>
                    </div>
                  </div>
                </div><!--end row-->
  
                <div class="row row-cols-3 g-0 border-bottom">
                  <div class="col border-end">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/04.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">YouTube</p>
                      </div>
                    </div>
                  </div>
                  <div class="col border-end">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/05.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">Google</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/06.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">Instagram</p>
                      </div>
                    </div>
                  </div>
                </div><!--end row-->
  
                <div class="row row-cols-3 g-0 border-bottom">
                  <div class="col border-end">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/07.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">Spotify</p>
                      </div>
                    </div>
                  </div>
                  <div class="col border-end">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/08.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">Yahoo</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/09.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">Facebook</p>
                      </div>
                    </div>
                  </div>
                </div><!--end row-->
  
                <div class="row row-cols-3 g-0">
                  <div class="col border-end">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/10.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">Figma</p>
                      </div>
                    </div>
                  </div>
                  <div class="col border-end">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/11.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">Paypal</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                      <div class="app-icon">
                        <img src="assets/images/apps/12.png" width="36" alt="">
                      </div>
                      <div class="app-name">
                        <p class="mb-0">Photo</p>
                      </div>
                    </div>
                  </div>
                </div><!--end row-->
              </div>
            </div>
          </li> --}}
                {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-bs-auto-close="outside"
              data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">notifications</i>
              <span class="badge-notify">5</span>
            </a>
            <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
              <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
                <h5 class="notiy-title mb-0">Notifications</h5>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret option" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="material-icons-outlined">
                      more_vert
                    </span>
                  </button>
                  <div class="dropdown-menu dropdown-option dropdown-menu-end shadow">
                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                          class="material-icons-outlined fs-6">inventory_2</i>Archive All</a></div>
                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                          class="material-icons-outlined fs-6">done_all</i>Mark all as read</a></div>
                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                          class="material-icons-outlined fs-6">mic_off</i>Disable Notifications</a></div>
                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                          class="material-icons-outlined fs-6">grade</i>What's new ?</a></div>
                    <div>
                      <hr class="dropdown-divider">
                    </div>
                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                          class="material-icons-outlined fs-6">leaderboard</i>Reports</a></div>
                  </div>
                </div>
              </div>
              <div class="notify-list">
                <div>
                  <a class="dropdown-item border-bottom py-2" href="javascript:;">
                    <div class="d-flex align-items-center gap-3">
                      <div class="">
                        <img src="https://placehold.co/110x110/png" class="rounded-circle" width="45" height="45" alt="">
                      </div>
                      <div class="">
                        <h5 class="notify-title">Congratulations Jhon</h5>
                        <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                        <p class="mb-0 notify-time">Today</p>
                      </div>
                      <div class="notify-close position-absolute end-0 me-3">
                        <i class="material-icons-outlined fs-6">close</i>
                      </div>
                    </div>
                  </a>
                </div>
                <div>
                  <a class="dropdown-item border-bottom py-2" href="javascript:;">
                    <div class="d-flex align-items-center gap-3">
                      <div class="user-wrapper bg-primary text-primary bg-opacity-10">
                        <span>RS</span>
                      </div>
                      <div class="">
                        <h5 class="notify-title">New Account Created</h5>
                        <p class="mb-0 notify-desc">From USA an user has registered.</p>
                        <p class="mb-0 notify-time">Yesterday</p>
                      </div>
                      <div class="notify-close position-absolute end-0 me-3">
                        <i class="material-icons-outlined fs-6">close</i>
                      </div>
                    </div>
                  </a>
                </div>
                <div>
                  <a class="dropdown-item border-bottom py-2" href="javascript:;">
                    <div class="d-flex align-items-center gap-3">
                      <div class="">
                        <img src="assets/images/apps/13.png" class="rounded-circle" width="45" height="45" alt="">
                      </div>
                      <div class="">
                        <h5 class="notify-title">Payment Recived</h5>
                        <p class="mb-0 notify-desc">New payment recived successfully</p>
                        <p class="mb-0 notify-time">1d ago</p>
                      </div>
                      <div class="notify-close position-absolute end-0 me-3">
                        <i class="material-icons-outlined fs-6">close</i>
                      </div>
                    </div>
                  </a>
                </div>
                <div>
                  <a class="dropdown-item border-bottom py-2" href="javascript:;">
                    <div class="d-flex align-items-center gap-3">
                      <div class="">
                        <img src="assets/images/apps/14.png" class="rounded-circle" width="45" height="45" alt="">
                      </div>
                      <div class="">
                        <h5 class="notify-title">New Order Recived</h5>
                        <p class="mb-0 notify-desc">Recived new order from michle</p>
                        <p class="mb-0 notify-time">2:15 AM</p>
                      </div>
                      <div class="notify-close position-absolute end-0 me-3">
                        <i class="material-icons-outlined fs-6">close</i>
                      </div>
                    </div>
                  </a>
                </div>
                <div>
                  <a class="dropdown-item border-bottom py-2" href="javascript:;">
                    <div class="d-flex align-items-center gap-3">
                      <div class="">
                        <img src="https://placehold.co/110x110/png" class="rounded-circle" width="45" height="45" alt="">
                      </div>
                      <div class="">
                        <h5 class="notify-title">Congratulations Jhon</h5>
                        <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                        <p class="mb-0 notify-time">Today</p>
                      </div>
                      <div class="notify-close position-absolute end-0 me-3">
                        <i class="material-icons-outlined fs-6">close</i>
                      </div>
                    </div>
                  </a>
                </div>
                <div>
                  <a class="dropdown-item py-2" href="javascript:;">
                    <div class="d-flex align-items-center gap-3">
                      <div class="user-wrapper bg-danger text-danger bg-opacity-10">
                        <span>PK</span>
                      </div>
                      <div class="">
                        <h5 class="notify-title">New Account Created</h5>
                        <p class="mb-0 notify-desc">From USA an user has registered.</p>
                        <p class="mb-0 notify-time">Yesterday</p>
                      </div>
                      <div class="notify-close position-absolute end-0 me-3">
                        <i class="material-icons-outlined fs-6">close</i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </li> --}}
                {{-- <li class="nav-item d-md-flex d-none">
            <a class="nav-link position-relative" data-bs-toggle="offcanvas" href="#offcanvasCart"><i
                class="material-icons-outlined">shopping_cart</i>
              <span class="badge-notify">8</span>
            </a>
          </li> --}}

                @if (Auth::check() == true)
                    <li class="nav-item dropdown">
                        <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                            @if (!empty(Auth::user()->avatar))
                                <img src="{{ Auth::user()->avatar }}" class="rounded-circle p-1 border" width="45"
                                    height="45" alt="">
                            @else
                                <img src="/assets/images/no_avatar.png" class="rounded-circle p-1 border" width="45"
                                    height="45" alt="">
                            @endif
                        </a>


                        <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                            <div class="text-center">
                                @if (!empty(Auth::user()->avatar))
                                    <img src="{{ Auth::user()->avatar }}" class="rounded-circle p-1 shadow mb-3"
                                        width="90" height="90" alt="">
                                @else
                                    <img src="/assets/images/no_avatar.png" class="rounded-circle p-1 border"
                                        width="45" height="45" alt="">
                                @endif
                                <h5 class="user-name mb-0 fw-bold">{{ Auth::user()->name }}</h5>
                            </div>
                            <hr class="dropdown-divider">
                            <a href="/user/{{ Auth::id() }}/"
                                class="dropdown-item d-flex align-items-center gap-2 py-2">
                                <i class="material-icons-outlined">person_outline</i>Профиль
                            </a>
                            <a href="/refferal/"
                                class="dropdown-item d-flex align-items-center gap-2 py-2">
                                <i class="lni lni-invest-monitor"></i>Рефералка
                            </a>
                            <a href="/user/{{ Auth::id() }}/edit"
                                class="dropdown-item d-flex align-items-center gap-2 py-2">
                                <i class="lni lni-cog"></i>Настройки
                            </a>
                            <hr class="dropdown-divider">
                            <a href="{{ route('auth.logout') }}"
                                class="dropdown-item d-flex align-items-center gap-2 py-2">
                                <i class="material-icons-outlined">power_settings_new</i>Выйти
                            </a>
                        </div>
                    </li>
                @else
                    <a href="/login" title="Войти">Войти</a> / <a href="/register"
                        title="Зарегистрироваться">Зарегистрироваться</a>
                @endif
            </ul>

        </nav>
    </header>
    <!--end top header-->

    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">

            @yield('content')

        </div>
    </main>
    <!--end main wrapper-->

    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->

    <!--start footer-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2025 {{ config('app.name') }}. All rights reserved.</p>
    </footer>
    <!--end footer-->

    <!--start cart-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart">
        <div class="offcanvas-header border-bottom h-70">
            <h5 class="mb-0" id="offcanvasRightLabel">8 New Orders</h5>
            <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                <i class="material-icons-outlined">close</i>
            </a>
        </div>
        <div class="offcanvas-body p-0">
            <div class="order-list">
                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="https://placehold.co/200x150/png" class="img-fluid rounded-3" width="75"
                            alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">White Men Shoes</h5>
                        <p class="mb-0 order-price">$289</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="https://placehold.co/200x150/png" class="img-fluid rounded-3" width="75"
                            alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Red Airpods</h5>
                        <p class="mb-0 order-price">$149</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="https://placehold.co/200x150/png" class="img-fluid rounded-3" width="75"
                            alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Men Polo Tshirt</h5>
                        <p class="mb-0 order-price">$139</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="https://placehold.co/200x150/png" class="img-fluid rounded-3" width="75"
                            alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Blue Jeans Casual</h5>
                        <p class="mb-0 order-price">$485</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="https://placehold.co/200x150/png" class="img-fluid rounded-3" width="75"
                            alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Fancy Shirts</h5>
                        <p class="mb-0 order-price">$758</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="https://placehold.co/200x150/png" class="img-fluid rounded-3" width="75"
                            alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Home Sofa Set </h5>
                        <p class="mb-0 order-price">$546</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="https://placehold.co/200x150/png" class="img-fluid rounded-3" width="75"
                            alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Black iPhone</h5>
                        <p class="mb-0 order-price">$1049</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>

                <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="order-img">
                        <img src="https://placehold.co/200x150/png" class="img-fluid rounded-3" width="75"
                            alt="">
                    </div>
                    <div class="order-info flex-grow-1">
                        <h5 class="mb-1 order-title">Goldan Watch</h5>
                        <p class="mb-0 order-price">$689</p>
                    </div>
                    <div class="d-flex">
                        <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
                        <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer h-70 p-3 border-top">
            <div class="d-grid">
                <button type="button" class="btn btn-grd btn-grd-primary" data-bs-dismiss="offcanvas">View
                    Products</button>
            </div>
        </div>
    </div>
    <!--end cart-->

    <!--start switcher-->
    {{-- <button class="btn btn-grd btn-grd-primary position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
      <i class="material-icons-outlined">tune</i>Customize
    </button> --}}

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
        <div class="offcanvas-header border-bottom h-70">
            <div class="">
                <h5 class="mb-0">Уникальная тема</h5>
                <p class="mb-0">Ваша собственная кастомизация темы</p>
            </div>
            <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                <i class="material-icons-outlined">close</i>
            </a>
        </div>
        <div class="offcanvas-body">
            <div>
                <p>Выберите тему</p>

                <div class="row g-3">
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="BlueTheme" checked>
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="BlueTheme">
                            <span class="material-icons-outlined">contactless</span>
                            <span>Blue</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="LightTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="LightTheme">
                            <span class="material-icons-outlined">light_mode</span>
                            <span>Light</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="DarkTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="DarkTheme">
                            <span class="material-icons-outlined">dark_mode</span>
                            <span>Dark</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="SemiDarkTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="SemiDarkTheme">
                            <span class="material-icons-outlined">contrast</span>
                            <span>Semi Dark</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="BoderedTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="BoderedTheme">
                            <span class="material-icons-outlined">border_style</span>
                            <span>Bordered</span>
                        </label>
                    </div>
                </div><!--end row-->

            </div>
        </div>
    </div>
    <!--start switcher-->

    <script src="/assets/js/notification.js"></script>

    <!--bootstrap js-->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <!--plugins-->
    <script src="/assets/js/jquery.min.js"></script>
    <!--plugins-->
    <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="/assets/plugins/metismenu/metisMenu.min.js"></script>
    <script src="/assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="/assets/plugins/peity/jquery.peity.min.js"></script>
    <script src="/assets/plugins/select2/js/select2-custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".data-attributes span").peity("donut")
    </script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/dashboard1.js"></script>
    <script>
        new PerfectScrollbar(".user-list")
    </script>

    <script src="/assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
    <script src="/assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
    <script src="/assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
    <script src="/assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>

    {{-- для загрузки множества изображений для постов --}}
    <script>
        $('#fancy-file-upload').FancyFileUpload({
            params: {
                action: 'fileuploader'
            },
            maxfilesize: 1000000
        });
    </script>

</body>

</html>
