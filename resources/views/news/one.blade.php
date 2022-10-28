@extends('layouts.app')

@section('title', 'Новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
    /
    @if ($item)
        @if (!$item['isPrivate'])
            <div class="container">

                <div class="card">
            <div class="card-header">{{ $item['title'] }}</div>
                    <div class="card-body">
                        <div>{{ $item['text'] }}</div>
                    </div>
                </div>
            </div>

        @else
            <div class="container">
                <div class="card">
                    <div class="card-header">{{ __('Доступ закрыт') }}</div>
                    <div class="card-body">
                        <p>Зарегистрируйтесь для просмотра</p>
                    </div>
                </div>
            </div>

        @endif
    @else
        Нет новости с таким id
    @endif
@endsection


@section('footer')
    @include('footer')
@endsection

