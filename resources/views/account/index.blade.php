@extends('layouts.app')
@section('menu')
    @include('menu')
@endsection
@section('content')
    <div class="container">

        <div class="card" >
            <div class="card-header"><h2>welcome, {{Auth::user()->name}} </h2></div>
            <div class="card-body">
                @if(Auth::user()->avatar)
                    <img src="{{ Auth::user()->avatar }}" style="width:200px;">
                @endif

    <br>
    @if(Auth::user()->is_admin === true)
    <a href="{{ route('admin.index') }}">В админку</a>
    @endif
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('footer')
@endsection
