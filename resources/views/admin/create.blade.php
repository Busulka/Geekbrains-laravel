
@extends('layouts.app')

@section('title', 'Добавление новость')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Добавить новость') }}</div>

                    <div class="card-body">
                    <form action="{{ route('admin.create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="newsTitle">Заголовок новости</label>
                            <input type="text" name="title" id="newsTitle" class="form-control" value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="newsCategory">Категория новости</label>
                            <select class="form-select" name="category" id="newsCategory">
                                @forelse($categories as $item)
                                <option @if ($item['id'] == old('category')) selected
                                        @endif value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                                @empty
                                    <option value="0" selected>Нет категории</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="newsText">Текст новости</label>
                            <textarea class="form-control" rows="6" name="text" id="newsText">{{ old('text') }}</textarea>
                        </div>
                        <div class="form-check">
                            <label class="form-label" for="isPrivate">Приватная</label>
                            <input @if (old('isPrivate') === "1") checked @endif id="newsPrivate" name="isPrivate" type="checkbox" value="1" class="form-check-input">

                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-outline-primary" value="Добавить новость">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection
