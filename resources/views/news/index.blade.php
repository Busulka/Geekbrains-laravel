@extends('layouts.main')

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
                               <a href="{{ route('news.show', $item['id']) }}">{{ $item['title'] }}</a>
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
