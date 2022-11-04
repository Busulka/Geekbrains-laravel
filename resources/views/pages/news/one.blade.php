<x-layout>
    @empty($news)
    <x-card-error>
        По данному запросу ничего не найдено. Попробуйте другой ID
    </x-card-error>
    @endempty

    @if($news)
    @if(!$news->is_private)
    <h1 class="mb-4">
        {{$news->title}}
    </h1>
    @if($news->image)
    <img src="/{{$news->image}}" />
    @endif
    <p>
        {{$news->text}}
    </p>
    @else
    <x-card-warning>
        Зарегистрируйтесь для просмотра
    </x-card-warning>
    @endif
    @endif

</x-layout>
