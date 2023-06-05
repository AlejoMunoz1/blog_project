@extends('layouts.app')

@section('content')
    <h2>Crear de publicaciones</h2> 
    @include('dashboard.fragment._errors-form')
    <form action="{{ route('posts.store') }}" method="post">
        @include('dashboard.post._form')
    </form>
@endsection
