@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <h2>Actualizar categoría {{ $category->title }}</h2>
        @include('dashboard.fragment._errors-form')
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @method('PATCH')
            @include('dashboard.category._form')
        </form>
    </div>
@endsection