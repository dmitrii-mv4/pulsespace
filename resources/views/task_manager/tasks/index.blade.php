@extends('layouts.app')

@section('content')
    <header class="page-header">
        <h2>Мои задачи</h2>

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

                <li><span>Мои задачи</span></li>
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

                            <h3>Управление задачами</h3>
                            <hr/>

                            <div class="taskmanager-form-main">
                                <div class="taskmanager-form-filter">

                                    <div style="margin: 0 30px 0 0"> 
                                        <div>
                                            <h4>Разделы:</h4>
                                        </div>
                                        <div class="col-lg-12">
                                            <span class="multiselect-native-select">
                                                <select class="form-control" multiple="multiple" data-plugin-multiselect="" data-plugin-options="{ &quot;maxHeight&quot;: 200 }" id="ms_example0" tabindex="-1">
                                                    @foreach ($tasks_sections as $sections)
                                                        <option value="{{ $sections->id }}">{{ $sections->title }}</option>
                                                    @endforeach
                                                    {{-- <option value="tomatoes" selected="">Работа</option> --}}
                                                </select>
                                            </span>
                                        </div>
                                    </div>

                                    <div style="margin:0 -50px 0px 0px"> 
                                        <div>
                                            <h4>Дедлайн:</h4>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                                <input type="text" data-plugin-datepicker="" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="button" class="mb-1 mt-1 me-1 btn btn-primary">Применить</button>
                                    </div>

                                </div>

                                <div>
                                    <!-- Modal MD -->
									<a class="mb-1 mt-1 me-1 modal-sizes btn btn-default" href="#add_task">+ Создать задачу</a>

									<div id="add_task" class="modal-block modal-block-md mfp-hide">

                                        <form action="{{ route('taskmanager.tasks.create') }}" method="post">
                                            @csrf
                                            <section class="card">
                                                <header class="card-header">
                                                    <h2 class="card-title">Добавление задачи</h2>
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

                                                        <div class="form-group row pb-3">
                                                            <label class="col-lg-3 control-label text-lg-end pt-2">Дедлайн</label>
                                                            <div class="col-lg-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-calendar-alt"></i>
                                                                    </span>
                                                                    <input type="text" name="deadline" data-plugin-datepicker="" class="form-control">
                                                                </div>
                                                            </div>

                                                            {{-- <div class="col-lg-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">
                                                                        <i class="far fa-clock"></i>
                                                                    </span>
                                                                    <input type="text" name="deadline_time" data-plugin-timepicker="" class="form-control" data-plugin-options="{ &quot;showMeridian&quot;: false }">
                                                                </div>
                                                            </div> --}}
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
                                <h2 class="card-title">Мои задачи</h2>
                            </header>
                            <div class="card-body">
                                <table class="table table-responsive-md table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Название задачи</th>
                                            <th>Дедлайн</th>
                                            <th>Опции</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                            <tr>
                                                <td >
                                                    <div class="checkbox-custom checkbox-default">
                                                        <input type="checkbox" name="completed" value="{{ $task->completed }}" @if ($task->completed == 1) checked="" @endif id="todoListItem{{ $task->id }}" class="todo-check" disabled>
                                                        <label class="todo-label line-through" for="todoListItem{{ $task->id }}" @if ($task->completed == 1) style="text-decoration: line-through;" @endif><span>{{ $task->title }}</span></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- <input type="text" data-plugin-datepicker="" class="form-control"> --}}
                                                    <span class="badge badge-warning">{{ $task->deadline }}</span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('taskmanager.tasks.update_completed', $task->id) }}" method="post">
                                                        @csrf
                                                        @method('patch')

                                                        @if ($task->completed == 1)
                                                            <button type="submit" class="mb-1 mt-1 me-1 btn btn-xs btn-danger">Отменить</button>
                                                        @else
                                                            <button type="submit" class="mb-1 mt-1 me-1 btn btn-xs btn-success">Выполнена</button> 
                                                        @endif
                                                    </form>
                                                </td>
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
