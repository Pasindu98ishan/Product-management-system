@extends('layouts.app')

@section('content')
    <<div class="container">
       <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card p-4">
            <p>
                <a href="{{ route('home') }}">Home</a> / 
                <a href="{{ route('products.index') }}">Products</a>/ {{ ucfirst($product->name) }}
            </p>
            <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
            <br>
                <div class="card">
                    <div class="card-header">{{ ucfirst($product->name) }} </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/image/{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <p class="card-text">Name: {{ $product->name }}</p>
                                <p class="card-text">Price: {{ $product->price }}</p>
                                <p class="card-text">Description: {{ $product->description }}</p>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

