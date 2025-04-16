@extends('layouts.app')

@section('content')
    <header class="page-header">
        <h2>Разделы задач</h2>

        <div class="right-wrapper text-end">
            <ol class="breadcrumbs">
                <li>
                    <a href="/lk/">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>

                <li>
                    <a href="{{ route('taskmanager') }}">
                        Менеджер задач
                    </a>
                </li>

                <li><span>Разделы задач</span></li>
            </ol>

            {{-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> --}}
        </div>

    </header>

    <section class="content-with-menu">
        <div class="content-with-menu-container" data-mailbox="" data-mailbox-view="folder">

            @include('task_manager/include/sidebar')

            <div class="inner-body mailbox-folder">

                <header class="header-main-taskmanger">
                    <section class="card">
                        <div class="card-body">

                            <h3>Управление разделами задач</h3>
                            <hr/>

                            <div class="taskmanager-form-main">
                                <div class="taskmanager-form-filter">

                                    {{-- <div style="margin: 0 30px 0 0"> 
                                        <div>
                                            <h4>С задачами:</h4>
                                        </div>
                                        <div class="col-lg-12">
                                            <span class="multiselect-native-select"><select class="form-control" multiple="multiple" data-plugin-multiselect="" data-plugin-options="{ &quot;maxHeight&quot;: 200 }" id="ms_example0" tabindex="-1">
                                                <option value="cheese">Домашние дела</option>
                                                <option value="tomatoes" selected="">Работа</option>
                                                <option value="mushrooms">Хобби</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="button" class="mb-1 mt-1 me-1 btn btn-primary">Применить</button>
                                    </div> --}}

                                </div>

                                <div>
                                    <!-- Modal MD -->
									<a class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#add_section">+ Добавить раздел</a>

									<div id="add_section" class="modal-block modal-block-md mfp-hide">

                                        <form action="{{ route('taskmanager.tasks.sections.create') }}" method="post">
                                            @csrf
                                            <section class="card">
                                                <header class="card-header">
                                                    <h2 class="card-title">Добавление раздела</h2>
                                                </header>
                                                <div class="card-body">
                                                    <div class="modal-wrapper">
                                                        <div class="modal-text">
                                                            <div class="form-group row pb-4">
                                                                <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Название:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="title" class="form-control" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <footer class="card-footer">
                                                    <div class="row">
                                                        <div class="col-md-12 text-end">
                                                            <button type="submit" class="btn btn-primary">Добавить</button>
                                                            <button class="btn btn-default modal-dismiss">Отменить</button>
                                                        </div>
                                                    </div>
                                                </footer>
                                            </section>
                                        </form>
									</div>

                                    {{-- <button type="button" class="mb-1 mt-1 me-1 btn btn-default">+ Создать новый раздел</button> --}}
                                </div>
                            </div>

                        </div>
                    </section>
                </header>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="card">
                            <header class="card-header">
                                <h2 class="card-title">Разделы задач</h2>
                            </header>
                            <div class="card-body">
                                <table class="table table-responsive-md table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Название раздела</th>
                                            <th>Кол-во задач</th>
                                            <th>Дата создания</th>
                                            <th>Опции</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks_sections as $sections)
                                            <tr>
                                                <td>{{ $sections->id }}</td>
                                                <td>{{ $sections->title }}</td>
                                                <td>0</td>
                                                <td>{{ $sections->created_at }}</td>
                                                <td>@mdo</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
