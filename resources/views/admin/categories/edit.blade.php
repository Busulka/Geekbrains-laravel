@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <h2>Изменить Категорию</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @include('inc.message', ['vmessage' => $error])
        @endforeach
    @endif
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{!! $category->description !!}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
