@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('StreamEvents Login') }}</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-3">
                            <a href="{{ config('services.google.redirect') }}" class="btn btn-danger btn-block">Login with Google</a>
                            <a href="{{ config('services.facebook.redirect') }}" class="btn btn-primary btn-block">Login with Facebook</a>
                            <a href="{{ config('services.github.redirect') }}" class="btn btn-dark btn-block">Login with Github</a>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection