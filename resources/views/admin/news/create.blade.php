@extends('layouts.app')
@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h2>Добавить Новость</h2>
    @if ($errors->any())

    @foreach ($errors->all() as $error)
        @include('inc.message', ['message' => $error])
    @endforeach
@endif
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.news.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old("title")}}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{!! old("description")!!}</textarea>
                @error('description')<span style="color:red">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="text">Текст новости</label>
                <textarea name="text" id="text" cols="30" rows="5" class="form-control">{!! old("text")!!}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Выбрать Категорию</label>
                <select class="form-control" name="category_id" id="category_id" value="{{old("category")}}">
                    <option value="0">Выбрать</option>
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}" @if (old('category_id') === $category['id']) selected @endif > {{$category['title']}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{old("author")}}">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="released_at">Дата релиза</label>

                <input type="datetime-local" class="form-control" name="released_at" id="released_at" value="{{$news->released_at}}">
            </div>
            <div class="form-check">
                <label class="form-label" for="is_private">Приватная</label>
                <input name="is_private" type="checkbox" value="{{$news->is_private}}" class="form-check-input">

            </div>
            <br>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
