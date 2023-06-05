@extends('layouts.app')

@section('content')
    <h2>Crear de Categoría de publicaciones</h2>
    @include('dashboard.fragment._errors-form')
    <form action="{{ route('categories.store') }}" method="post">
        @include('dashboard.category._form')
    </form>
@endsection