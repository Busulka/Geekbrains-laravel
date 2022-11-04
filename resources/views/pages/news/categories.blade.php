<x-layout>
    <h1 class="mb-4">Категории новостей</h1>

    @empty($categories)
    <x-card-error>
        Нет категорий новостей для просмотра.
    </x-card-error>
    @endempty

    @if($categories)
    <ul class="list-group list-group-flush">
        @foreach ($categories as $item)
        <li class="list-group-item">
            <a class="stretched-link" href="{{ route('news.category.newsList', $item->slug) }}">
                {{$item->title}}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</x-layout>
