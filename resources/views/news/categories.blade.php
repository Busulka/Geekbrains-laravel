@extends('layouts.main')

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

                        @forelse($categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route('news.category.show', $category['slug']) }}">{{ $category['title'] }} </a>
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
