@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">

        <div class="card" >
            <div class="card-header">{{ __('Новости') }}</div>
               <div class="card-body">
                   <ul class="list-group list-group-flush">

                           @forelse($news as $item)
                           <li class="list-group-item">
                               <h2>{{ $item['title'] }}</h2>
                               @if (!$item['is_private'])
                                   <a href="{{ route('news.show', $item['id']) }}">Подробнее..</a>
                               @else
                                   <p>Зарегистрируйтесь для просмотра</p>
                               @endif
                           </li>
                           @empty
                               <p>Нет новостей</p>
                           @endforelse
                   </ul>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
