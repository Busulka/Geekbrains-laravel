@extends('layouts.main')

@section('title')
@parent | Главная
@endsection


@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Главная') }}</div>
            <div class="card-body">
                <div>
                    Добро пожаловать в агрегатор новостей!
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection
