
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">

        <div class="collapse navbar-collapse justify-content-md-center">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home')?'active':'' }}" href="{{ route('home') }}">Главная новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.index')?'active':'' }}" href="{{ route('admin.index') }}">Главная админка</a>
                </li>
                <li class="nav-item">
                <a class="nav-link @if(request()->routeis('admin.news.*')) active @endif" href="{{ route('admin.news.index')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Новости
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeis('admin.categories.*')) active @endif" href="{{ route('admin.categories.index')}}">
                        <span data-feather="list" class="align-text-bottom"></span>
                        Категории
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ request()->routeIs('admin.users.index')?'active':'' }}" href="{{ route('admin.users.index') }}">
                        <span data-feather="list" class="align-text-bottom"></span>
                        Пользователи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ request()->routeIs('account')?'active':'' }}" href="{{ route('account') }}">
                        <span data-feather="list" class="align-text-bottom"></span>
                        Личный кабинет</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
