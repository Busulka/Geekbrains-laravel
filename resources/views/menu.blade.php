
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">

        <div class="collapse navbar-collapse justify-content-md-center">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Главная новости</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('news.index') }}">Новости</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('news.category.index') }}">Категории</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.index') }}">Админка</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('vue') }}">Vue</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
