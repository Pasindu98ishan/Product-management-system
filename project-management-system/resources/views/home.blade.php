@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome! You are logged in') }}
                    
                    <br>
                    <br>
                    <a class="btn btn-primary" href="{{ route('products.index') }}"> View Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
