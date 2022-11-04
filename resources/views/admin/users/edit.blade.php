@extends('layouts.app')
@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Редактировать пользователя') }}
            </div>
            <div class="card-body">
                <h3>{{ $user->name }} </h3>
                <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                            @csrf
                            @method('patch')

                            <div class="form-group mb-3">
                                <label for="is_admin">Права админа</label>
                                <select name="is_admin" id="is_admin" class="form-control">
                                    <option value="1">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary bg-dark">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
