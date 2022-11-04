@extends('layouts.app')
@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Пользователи') }}
            </div>
            <div class="card-body">
                            <table class="table table-striped table-hover table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Имя</th>
                                    <th scope="col">email</th>
                                    <th scope="col">is_admin</th>
                                    <th scope="col">Дата Создания</th>
                                    <th scope="col">Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->is_admin? 'True':'False' }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary  bg-dark">Редактировать</a>
                                        </td>
                                    </tr>
                                @empty
                                    Нет пользователей
                                @endforelse
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
        </div>
@endsection
