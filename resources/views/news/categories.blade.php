@extends('layouts.app')

@section('title', 'Категории')

@section ('menu')
    @include('menu')
@endsection

@section('content')


        <div class="container">

            <div class="card" >
                <div class="card-header">{{ __('Категории') }}</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        @forelse($categories as $item)
                            <li class="list-group-item">
                                <h2><a class="text-decoration-none" href="{{ route('news.category.show', $item['slug']) }}">{{ $item['title'] }} </a></h2>
                            </li>
                        @empty
                            Нет категорий
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>




@endsection

@section('footer')
    @include('footer')
@endsection
