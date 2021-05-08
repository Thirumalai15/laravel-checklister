<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CoreUI CSS -->
        <link
            rel="stylesheet"
            href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css"
            integrity="sha512-n+g8P11K/4RFlXnx2/RW1EZK25iYgolW6Qn7I0F96KxJibwATH3OoVCQPh/hzlc4dWAwplglKX8IVNVMWUUdsw=="
            crossorigin="anonymous"
        />
        <title>{{ config("app.name", "Laravel") }}</title>
    </head>
    <body class="c-app">
        @include('partials.sidebar')
        <div class="c-wrapper c-fixed-components">
            <header
                class="c-header c-header-light c-header-fixed c-header-with-subheader"
            >
                <button
                    class="c-header-toggler c-class-toggler d-lg-none mfe-auto"
                    type="button"
                    data-target="#sidebar"
                    data-class="c-sidebar-show"
                >
                    <svg class="c-icon c-icon-lg">
                        <use
                            xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"
                        ></use>
                    </svg></button
                ><a class="c-header-brand d-lg-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use
                            xlink:href="assets/brand/coreui.svg#full"
                        ></use></svg
                ></a>
                <button
                    class="c-header-toggler c-class-toggler mfs-3 d-md-down-none"
                    type="button"
                    data-target="#sidebar"
                    data-class="c-sidebar-lg-show"
                    responsive="true"
                >
                    <svg class="c-icon c-icon-lg">
                        <use
                            xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"
                        ></use>
                    </svg>
                </button>
                <ul class="c-header-nav ml-auto mr-4">
                    <li class="c-header-nav-item dropdown">
                        <a href="{{ route('consultation') }}">{{ __('Get Consultation') }}</a>
                    </li>
                    <li class="c-header-nav-item d-md-down-none mx-2">
                        <a
                            class="c-header-nav-link"
                            href="{{ route('welcome') }}"
                        >
                            <svg class="c-icon">
                                <use
                                    xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"
                                ></use></svg
                        ></a>
                    </li>
                    <li class="c-header-nav-item dropdown">
                        <a
                            class="c-header-nav-link"
                            data-toggle="dropdown"
                            href="#"
                            role="button"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                        <svg class="c-icon">
                            <use
                                xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"
                            ></use></svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <strong>Account</strong>
                            </div>
    
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                <svg class="c-icon mr-2">
                                    <use
                                        xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"
                                    ></use>
                                </svg>
                                Logout</a
                            >
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </header>
            <div class="c-body">
                <main class="c-main">@yield('content')</main>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"
            integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA=="
            crossorigin="anonymous"
        ></script>
        <!-- Popper.js first, then CoreUI JS -->
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
        @yield('js')
    </body>
</html>

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
        />

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div id="app">
            <nav
                class="navbar navbar-expand-md navbar-light bg-white shadow-sm"
            >
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config("app.name", "Laravel") }}
                    </a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div
                        class="collapse navbar-collapse"
                        id="navbarSupportedContent"
                    >
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto"></ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest @if (Route::has('login'))
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="{{ route('login') }}"
                                    >{{ __("Login") }}</a
                                >
                            </li>
                            @endif @if (Route::has('register'))
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="{{ route('register') }}"
                                    >{{ __("Register") }}</a
                                >
                            </li>
                            @endif @else
                            <li class="nav-item dropdown">
                                <a
                                    id="navbarDropdown"
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    v-pre
                                >
                                    {{ Auth::user()->name }}
                                </a>

                                <div
                                    class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="navbarDropdown"
                                >
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    >
                                        {{ __("Logout") }}
                                    </a>

                                    <form
                                        id="logout-form"
                                        action="{{ route('logout') }}"
                                        method="POST"
                                        class="d-none"
                                    >
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">@yield('content')</main>
        </div>
    </body>
</html>
--}}