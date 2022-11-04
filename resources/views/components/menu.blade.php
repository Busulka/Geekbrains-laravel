<nav {{ $attributes }} class="nav">
    <ul class="nav__list list-group">
        <li>
            <a @class([ 'nav__item' , 'list-group-item' , 'list-group-item-action' , 'active'=> Route::currentRouteName() == 'home'
                ]) href="{{ route('home') }}">
                Главная
            </a>
        </li>
        <li>
            <a @class([ 'nav__item' , 'list-group-item' , 'list-group-item-action' , 'active'=> Route::currentRouteName() == 'info'
                ]) href="{{ route('info') }}">
                Инфо
            </a>
        </li>
        <li>
            <a @class([ 'nav__item' , 'list-group-item' , 'list-group-item-action' , 'active'=> Route::currentRouteName() == 'news.category.list'
                ]) href="{{ route('news.category.list') }}">
                Новости по категориям
            </a>
        </li>
        <li>
            <a @class([ 'nav__item' , 'list-group-item' , 'list-group-item-action' , 'active'=> Route::currentRouteName() == 'admin.home'
                ]) href="{{ route('admin.home') }}">
                Админка
            </a>
        </li>
    </ul>
</nav>
