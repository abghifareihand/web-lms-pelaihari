{{-- <aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="" class="sidebar-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">

        </ul>
    </div>
</aside> --}}


<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="" class="sidebar-logo">
            <img src="{{ asset('assets/images/logo-lms.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/images/logo-lms.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('assets/images/logo-icon-lms.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            @php $role = auth()->user()->role; @endphp

            <!-- ADMIN -->
            @if ($role === 'admin')
                <li class="{{ Route::is('admin.dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard.index') }}">
                        <iconify-icon icon="solar:home-angle-outline" class="menu-icon"></iconify-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.user.guru.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.user.guru.index') }}">
                        <iconify-icon icon="solar:user-rounded-outline" class="menu-icon"></iconify-icon>
                        <span>Guru</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.user.siswa.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.user.siswa.index') }}">
                        <iconify-icon icon="solar:user-rounded-outline" class="menu-icon"></iconify-icon>
                        <span>Siswa</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.blog.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.blog.index') }}">
                        <iconify-icon icon="ri-news-line" class="menu-icon"></iconify-icon>
                        <span>Blog</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.materi.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.materi.index') }}">
                        <iconify-icon icon="solar:clipboard-check-outline" class="menu-icon"></iconify-icon>
                        <span>Materi</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.meeting.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.meeting.index') }}">
                        <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                        <span>Meeting</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.quiz.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.quiz.index') }}">
                        <iconify-icon icon="solar:chat-round-line-outline" class="menu-icon"></iconify-icon>
                        <span>Quiz</span>
                    </a>
                </li>


                <!-- GURU -->
            @elseif($role === 'guru')
                {{-- <li class="{{ Route::is('guru.dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('guru.dashboard.index') }}">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                        <span>Dashboard</span>
                    </a>
                </li> --}}
                <li class="{{ Route::is('guru.blog.index') ? 'active' : '' }}">
                    <a href="{{ route('guru.blog.index') }}">
                        <iconify-icon icon="ri-news-line" class="menu-icon"></iconify-icon>
                        <span>Blog</span>
                    </a>
                </li>
                <li class="{{ Route::is('guru.materi.index') ? 'active' : '' }}">
                    <a href="{{ route('guru.materi.index') }}">
                        <iconify-icon icon="solar:clipboard-check-outline" class="menu-icon"></iconify-icon>
                        <span>Materi</span>
                    </a>
                </li>
                <li class="{{ Route::is('guru.meeting.index') ? 'active' : '' }}">
                    <a href="{{ route('guru.meeting.index') }}">
                        <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                        <span>Meeting</span>
                    </a>
                </li>
                <li class="{{ Route::is('guru.quiz.index') ? 'active' : '' }}">
                    <a href="{{ route('guru.quiz.index') }}">
                        <iconify-icon icon="solar:chat-round-line-outline" class="menu-icon"></iconify-icon>
                        <span>Quiz</span>
                    </a>
                </li>
                <!-- SISWA -->
            @elseif($role === 'siswa')
                {{-- <li class="{{ Route::is('siswa.dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('siswa.dashboard.index') }}">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                        <span>Dashboard</span>
                    </a>
                </li> --}}
                <li class="{{ Route::is('siswa.blog.index') ? 'active' : '' }}">
                    <a href="{{ route('siswa.blog.index') }}">
                        <iconify-icon icon="ri-news-line" class="menu-icon"></iconify-icon>
                        <span>Blog</span>
                    </a>
                </li>
                <li class="{{ Route::is('siswa.materi.index') ? 'active' : '' }}">
                    <a href="{{ route('siswa.materi.index') }}">
                        <iconify-icon icon="solar:clipboard-check-outline" class="menu-icon"></iconify-icon>
                        <span>Materi</span>
                    </a>
                </li>
                <li class="{{ Route::is('siswa.meeting.index') ? 'active' : '' }}">
                    <a href="{{ route('siswa.meeting.index') }}">
                        <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                        <span>Meeting</span>
                    </a>
                </li>
                <li class="{{ Route::is('siswa.quiz.index') ? 'active' : '' }}">
                    <a href="{{ route('siswa.quiz.index') }}">
                        <iconify-icon icon="solar:chat-round-line-outline" class="menu-icon"></iconify-icon>
                        <span>Quiz</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</aside>
