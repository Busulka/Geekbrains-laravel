@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Cписок категорий') }}
                <a href="{{ route('admin.categories.create') }}" style="float: right;" class="btn btn-primary bg-dark">Добавить
                    Категорию</a>
            </div>
            <div class="card-body">
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Управление</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id  }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
                                class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    Нет Категорий
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
