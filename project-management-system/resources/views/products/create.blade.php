@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
             <div class="card p-4">
                <p>
                    <a href="{{ route('home') }}">Home</a> / 
                    <a href="{{ route('products.index') }}">Products</a> / Add Product
                </p>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
                </div>
                <br>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h3>Add a Product</h3>
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create Product</button>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection
