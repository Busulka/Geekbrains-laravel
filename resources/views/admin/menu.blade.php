
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">

        <div class="collapse navbar-collapse justify-content-md-center">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Главная новости</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.index') }}">Главная админка</a>
                </li>
                <li>
                    <a class="nav-link"  href="{{ route('admin.test1') }}">test1</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.test2') }}">test2</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
