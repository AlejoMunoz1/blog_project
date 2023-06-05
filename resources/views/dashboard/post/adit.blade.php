@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <h2>Actualizar publicación {{ $post->title }}</h2>
        @include('dashboard.fragment._errors-form')
        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @include('dashboard.post._form')
        </form>
    </div>
@endsection