@extends('tasks.layouts.app')

@section('content')
    <div class="row mt-2">
        <h1 class="ps-5 fw-bold">My Tasks</h1>
    </div>
    <div class="row mt-3 mx-3 justify-content-center">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <!-- Tombol Order Berdasarkan Deadline -->
            <a href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['sort' => 'deadline', 'direction' => $sortField === 'deadline' && $sortDirection === 'asc' ? 'desc' : 'asc'])) }}"
                class="btn btn-sm btn-outline-primary me-2 @if($sortField === 'deadline') active @endif">
                Sort by Deadline
                @if($sortField === 'deadline')
                    <span>{!! $sortDirection === 'asc' ? ': Closest' : ': Furthest' !!}</span>
                @endif
            </a>
        
            <!-- Tombol Order Berdasarkan Created At -->
            <a href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['sort' => 'created_at', 'direction' => $sortField === 'created_at' && $sortDirection === 'asc' ? 'desc' : 'asc'])) }}"
                class="btn btn-sm btn-outline-primary @if($sortField === 'created_at') active @endif">
                Sort by Date Created
                @if($sortField === 'created_at')
                    <span>{!! $sortDirection === 'asc' ? ': Oldest' : ': Newest' !!}</span>
                @endif
            </a>
        </div>

        @forelse ($tasks as $task)
            <div class="col-lg-4">
                <div class="card m-2 mb-4 text-start">
                    <h5 class="card-header mb-2">
                        {{ Str::limit($task->title, 30, '...') }}
                    </h5>
                    <div class="card-body">
                        <!-- Dropdown untuk Edit Status -->
                        <div class="dropdown m-1">
                            <h6
                                class="card-subtitle mb-2 d-inline 
                            @if ($task->status == 'not_start') text-danger 
                            @elseif ($task->status == 'in_progress') text-warning 
                            @elseif ($task->status == 'complete') text-success @endif">
                                <!-- Ikon dan Status -->
                                @if ($task->status == 'not_start')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                        class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                    </svg>
                                    <b>Not Start</b>
                                @elseif ($task->status == 'in_progress')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                        class="bi bi-play-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445" />
                                    </svg>
                                    <b>In Progress</b>
                                @elseif ($task->status == 'complete')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                        class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                    </svg>
                                    <b>Complete</b>
                                @endif
    
                            </h6>
                            <button class="btn btn-sm btn-primary dropdown-toggle ms-2 d-inline" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Change
                            </button>
                            <ul class="dropdown-menu">
                                <!-- Form untuk Not Start -->
                                <li>
                                    <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="not_start">
                                        <button type="submit" class="dropdown-item">Not Start</button>
                                    </form>
                                </li>
                                <!-- Form untuk In Progress -->
                                <li>
                                    <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="in_progress">
                                        <button type="submit" class="dropdown-item">In Progress</button>
                                    </form>
                                </li>
                                <!-- Form untuk Complete -->
                                <li>
                                    <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="complete">
                                        <button type="submit" class="dropdown-item">Complete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        <p class="card-text">{{ Str::limit($task->description, 80, '...') }}</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-primary m-1" data-bs-toggle="modal"
                            data-bs-target="#taskDetailModal{{ $task->id }}">
                            See Task Detail
                        </button>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="card-link btn btn-warning btn-sm m-1">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="card-link btn btn-danger btn-sm m-1">Delete</button>
                        </form>


                    </div>
                    <h6 class="card-footer mb-2 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-clock" viewBox="0 0 16 16">
                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                        </svg>
                        {{ $task->getFormattedDeadline() }} due
                    </h6>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="taskDetailModal{{ $task->id }}" tabindex="-1"
                aria-labelledby="taskDetailLabel{{ $task->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="taskDetailLabel{{ $task->id }}">{{ $task->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Deadline:</strong> {{ $task->getFormattedDeadline() }} due</p>
                            <p><strong>Status:</strong>
                                @if ($task->status == 'not_start')
                                    Not Start
                                @elseif ($task->status == 'in_progress')
                                    In Progress
                                @elseif ($task->status == 'complete')
                                    Complete
                                @endif
                            </p>
                            <p><strong>Description:</strong></p>
                            <p>{{ $task->description }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="container">
                <div class="row">
                    <div class="card ">
                        <div class="card-body">
                            <p><b>Looks Like You Dont Have Any Task at The Moment, Try Adding Some New Task!</b> </p>
                            <a class="btn btn-primary" href="{{ route('tasks.create') }}">{{ __('Add New Task') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    </div>
@endsection
