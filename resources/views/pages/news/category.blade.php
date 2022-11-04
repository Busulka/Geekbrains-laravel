<x-layout>
    @empty($news)
    <x-card-error>
        Нет такой категории
    </x-card-error>
    @endempty

    @if($news)
    <h1 class="mb-4">Новости категории {{ $category }}</h1>

    <ul class="m-0 p-0">
        @foreach ($news as $item)
        <li class="card border-0 mb-3">
            <a class="card-body text-decoration-none" href="{{ route('news.category.one', [Route::current()->originalParameters()['slug'], $item->id]) }}">
                <h2>
                    {{$item->title}}
                </h2>
                <p>
                    {{$item->description}}
                </p>
                <p class="text-end">
                    Читать...
                </p>
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</x-layout>
