@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <h2>Редактировать Новость</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @include('inc.message', ['vmessage' => $error])
        @endforeach

    @endif
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.news.update', ['news' => $news])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$news->title}}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{!! $news->description !!}</textarea>
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{$news->author}}">
            </div>
            <div class="form-group">
                <label for="category_id">Выбрать Категорию</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">Выбрать</option>
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}" @if ($news->category_id === $category['id']) selected @endif > {{$category['title']}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image" value="{{$news->image}}">
            </div>
            <div class="form-group">
                <label for="released_at">Дата релиза</label>

                <input type="datetime-local" class="form-control" name="released_at" id="released_at" value="{{$news->released_at}}">
            </div>
            <div class="form-check">
                <label class="form-label" for="is_private">Приватная</label>
                <input @if (old('is_private') === "1") checked @endif id="is_private" name="is_private" type="checkbox" value="{{$news->is_private}}" class="form-check-input">

            </div>
            <br>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
