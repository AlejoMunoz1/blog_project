@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/logo-escudo.png') }}" class="img_nav" style="width: 50%" alt="">
                        <div class="card-body">
                            <h5 class="card-title">modudo de post</h5>
                            <p class="card-text">crear publicaciones.</p>
                            <a href="#" class="btn btn-primary">Ir al modulo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
