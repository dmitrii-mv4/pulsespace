<div class="col-xxl-3 col-xl-3 box-col-4 box-col-30">
    <div class="md-sidebar email-sidebar"><a class="btn btn-primary md-sidebar-toggle" href="javascript:void(0)">bookmark filter</a>
      <div class="md-sidebar-aside email-left-aside">
        <div class="card">
          <div class="card-body">
            <div class="email-app-sidebar left-bookmark">

              <ul class="nav main-menu custom-scrollbar" role="tablist">
                <li class="nav-item">
                  <button class="btn-primary badge-light btn-block btn-mail" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle me-2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>Создать задачу</button>
                  <div class="modal fade modal-bookmark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Разделы задач</h5>
                          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">                                                 </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-bookmark needs-validation" id="bookmark-form" novalidate="">
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="task-title">Task Title</label>
                                <input class="form-control" id="task-title" type="text" required="" autocomplete="off">
                              </div>
                              <div class="form-group col-md-12">
                                <label for="sub-task">Sub task</label>
                                <input class="form-control" id="sub-task" type="text" required="" autocomplete="off">
                              </div>
                              <div class="form-group col-md-12">
                                <div class="d-flex date-details">
                                  <div class="d-inline-block">
                                    <label class="d-block mb-0">
                                      <input class="checkbox_animated" type="checkbox">Remind on
                                    </label>
                                  </div>
                                  <div class="d-inline-block">
                                    <input class="datepicker-here form-control digits" type="text" data-language="en" placeholder="Date">
                                  </div>
                                  <div class="d-inline-block">
                                    <select class="form-control">
                                      <option>7:00 am</option>
                                      <option>7:30 am</option>
                                      <option>8:00 am</option>
                                      <option>8:30 am</option>
                                      <option>9:00 am</option>
                                      <option>9:30 am</option>
                                      <option>10:00 am</option>
                                      <option>10:30 am</option>
                                      <option>11:00 am</option>
                                      <option>11:30 am</option>
                                      <option>12:00 pm</option>
                                      <option>12:30 pm</option>
                                      <option>1:00 pm</option>
                                      <option>2:00 pm</option>
                                      <option>3:00 pm</option>
                                      <option>4:00 pm</option>
                                      <option>5:00 pm</option>
                                      <option>6:00 pm</option>
                                    </select>
                                  </div>
                                  <div class="d-inline-block">
                                    <label class="d-block mb-0">
                                      <input class="checkbox_animated" type="checkbox">Notification
                                    </label>
                                  </div>
                                  <div class="d-inline-block">
                                    <label class="d-block mb-0">
                                      <input class="checkbox_animated" type="checkbox">Mail
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col">
                                  <select class="js-example-basic-single select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    <option value="task">My Task</option>
                                  </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-h5t1-container"><span class="select2-selection__rendered" id="select2-h5t1-container" title="My Task">My Task</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                                <div class="form-group col">
                                  <select class="js-example-disabled-results select2-hidden-accessible" id="bm-collection" tabindex="-1" aria-hidden="true">
                                    <option value="general">General</option>
                                  </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-bm-collection-container"><span class="select2-selection__rendered" id="select2-bm-collection-container" title="General">General</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                              </div>
                              <div class="form-group col-md-12 my-0">
                                <textarea class="form-control" required="" autocomplete="off">  </textarea>
                              </div>
                            </div>
                            <input id="index_var" type="hidden" value="6">
                            <button class="btn btn-secondary" id="Bookmark" onclick="submitBookMark()" type="submit">Save</button>
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <li class="nav-item"><span class="main-title"> Задачи</span></li>
                  <li class="nav-item"> <a href="javascript:void(0)" data-bs-original-title="" title=""><span class="iconbg badge-light-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg></span><span class="title ms-2">Все задачи</span></a></li>
                  <li class="nav-item"><a href="javascript:void(0)" data-bs-original-title="" title=""><span class="iconbg badge-light-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></span><span class="title ms-2">Выполненые</span><span class="badge rounded-pill badge-success">3</span></a></li>
                  <li class="nav-item"><a href="javascript:void(0)" data-bs-original-title="" title=""><span class="iconbg badge-light-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cast"><path d="M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"></path><line x1="2" y1="20" x2="2" y2="20"></line></svg></span><span class="title ms-2">Просроченые</span><span class="badge rounded-pill badge-danger">2</span></a></li>
                </li>

                <li><hr></li>
                
                <li><span class="main-title"> Разделы задач <span class="pull-right"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#createtag"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></a></span></span></li>
                @foreach ($tasks_sections as $sections)
                      <li><a class="show" id="pills-todaytask-tab" data-bs-toggle="pill" href="#pills-todaytask" role="tab" aria-controls="pills-todaytask" aria-selected="false"><span class="title"> {{ $sections->title }}</span></a></li>
                @endforeach                    
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>