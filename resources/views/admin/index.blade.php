
@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Админка!') }}</div>

            <div class="card-body">
                <div>
                    Тут админка
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection
