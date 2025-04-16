@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- include user profile header -->
                @include('user/include/header')

                <!-- include user profile sidebar -->
                {{-- @include('user/include/sidebar') --}}

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>Текущий уровень: {{ $level->title }}</h5>
                        </div>
                        <div class="card-body">
                            <h6>Доступные возможности:</h6>
                            <p>{!! $level->accessibly !!}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>До следующего уровня</h5>
                        </div>
                        <div class="card-body">

                            <div style="font-size: 12px; color: #b4b4b4;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-primary"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> 
                                Рекомендуется обновить страницу в браузере, чтобы произошёл пересчёт выполненных заданий.
                            </div>

                            @foreach ($user_level_bind_tasks as $tasks)

                                <div class="project-status mt-4">
                                    <div class="d-flex mb-0">
                                        <p>{{ $tasks->title }}</p>
                                        <div class="flex-grow-1 text-end">

                                            @if ($tasks->done < $tasks->completion)
                                                <div>
                                                    {{ $tasks->done }} / {{ $tasks->completion }}
                                                </div>
                                            @else
                                                <i class="lni lni-checkmark user-profile-next-level-ready"></i>
                                            @endif

                                        </div>
                                    </div>

                                    @if ($tasks->done < $tasks->completion)
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: {{ ($tasks->done / $tasks->completion) * 100 }}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @else <!-- done -->
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar-animated bg-success progress-bar-striped" role="progressbar" style="width: {{ ($tasks->done / $tasks->completion) * 100 }}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif

                                </div>
                            
                            @endforeach
                        </div>

                        @if ($level->opening)
                            <hr/>
                            <div class="user-profile-next-level-rewards">
                                <div class="card-header pb-0" style="border: none">
                                    <h5>Новые возможности на сервисе</h5>
                                </div>

                                <div class="card-body">
                                    <div class="text-success">
                                        {!! $level->opening !!}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <hr/>

                        <div class="user-profile-next-level-rewards">
                            <div class="card-header pb-0" style="border: none">
                                <h5>Вознаграждения</h5>
                            </div>

                            <div class="card-body">
                                <div class="text-success">
                                    {!! $level->rewards !!}
                                </div>

                                <!-- кнопка перехода на след. уровень -->

                                @if ($success_next_lv['next_lv'] == True && $success_next_lv['active_lv'] == $user->level_id)
                                    <div class="btn-level-up-container">
                                        <form method="POST" action="{{ route('user.level.up', $user->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')

                                            <input type="hidden" name="user_id" value="{{ $user->id }}" required="">
                                            {{-- <input type="hidden" name="user_level" value="{{ $user->level_id }}" required=""> --}}
                                                    
                                            <button class="btn btn-outline-success">Следующий уровень</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Статистика -->
                

            </div>
        </div>
    </div>
@endsection
