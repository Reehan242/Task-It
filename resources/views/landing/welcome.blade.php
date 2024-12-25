@extends('landing.layouts.main')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-10 text-center mt-5 mb-5">
                <a href="{{ route('dashboard') }}">
                    <img class="app-logo" style="display: block; margin:auto; width: 100%;
      max-width: max-content;"
                        src="{{ asset('img/logo.svg') }}" alt="logo">
                </a>
            </div>
        </div>


        <div class="row justify-content-center mx-1">
            <div class="card bg-transparent col-lg-9">
                <div class="card-body">
                    <h1 class="card-title text-light mb-3 text-center">About <b class="text-primary">Task</b><b
                            class="text-light">-It!</b></h1>
                    <p class="card-text text-center text-light">
                        A simple task management application designed to help you stay productive and organized
                        with its
                        user-friendly interface, allows you to:
                    </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mx-1">
            <div class="card bg-dark col-lg-3 mx-2 my-2">
                <div class="card-body">
                    <h5 class="card-title text-light mb-3 text-center">Keep track of your tasks </h5>
                    <p class="card-text text-center text-light">
                        Add new tasks with a title, description, status, and deadline.
                    </p>
                </div>
            </div>
            <div class="card bg-dark col-lg-3 mx-2 my-2">
                <div class="card-body">
                    <h5 class="card-title text-light mb-3 text-center">Manage your workflow</h5>
                    <p class="card-text text-center text-light">
                        Categorize tasks by their status — whether they are not started, in
                        progress, or completed.
                    </p>
                </div>
            </div>
            <div class="card bg-dark col-lg-3 mx-2 my-2">
                <div class="card-body">
                    <h5 class="card-title text-light mb-3 text-center">Monitor your progress</h5>
                    <p class="card-text text-center text-light">
                        Easily view tasks that need attention or review the ones you've already completed.
                    </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mx-1">
            <div class="card bg-transparent col-lg-9">
                <div class="card-body">
                    <p class="card-text text-center text-light">

                        This application is built for active users with secure login systems, ensuring that each
                        user
                        has full control over their task lists without compromising privacy. All your tasks are
                        accessible only by you.

                        Whether you're a student, a professional, or anyone who needs reminders for important
                        tasks, this is your
                        best companion to stay organized and accomplish your goals effectively.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center text-muted mt-5 py-16 mb-3">
        Made with Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>
@endsection
