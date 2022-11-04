@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Cписок новостей') }}
                <a href="{{ route('admin.news.create') }}" style="float: right;" class="btn btn-primary bg-dark">Добавить
                    Новость</a>
            </div>
            <div class="card-body">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Заголовок</th>
        <th scope="col">Автор</th>
        <th scope="col">Дата Релиза</th>
        <th scope="col">Дата Создания</th>
        <th scope="col">Управление</th>

      </tr>
    </thead>
    <tbody>

        @forelse ($newsList as $news)
        <tr>
            <td>{{$news->id}}</td>
            <td>{{$news->title}}</td>
            <td>{{$news->author}}</td>
            <td>{{$news->released_at}}</td>
            <td>{{$news->rcreated_at}}</td>




            <td>
            <a href="{{ route('admin.news.edit', ['news' => $news['id']]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
        </td>
        </tr>
        @empty
            Нет новостей
        @endforelse

    </tbody>
  </table>
</div>

@endsection
