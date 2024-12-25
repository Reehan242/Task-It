<nav class="navbar navbar-expand-lg navbar-light bg-dark shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand ps-3" href="{{ route('landing') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="" width="50">
            <b class="text-primary">{{ __('Task') }}</b>
            <b class="text-light">{{__('-It!')}}</b>

        </a>
        <button class="navbar-toggler navbar-dark me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav>