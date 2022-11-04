@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <h2>Добавить Категорию</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @include('inc.message', ['message' => $error])
        @endforeach
    @endif
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{!! old('description') !!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
