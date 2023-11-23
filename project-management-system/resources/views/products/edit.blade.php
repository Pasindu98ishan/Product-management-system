@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                            <p>
                                <a href="{{ route('home') }}">Home</a> / 
                                <a href="{{ route('products.index') }}">Products</a> / {{ ucfirst($product->name) }}
                            </p>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
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
                            <div class="card-header">Update {{ $product->name }}</div>
                            <div class="card-body">
                                <form action="{{ url('products/' .$product->id) }}" method="post" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    @method("PATCH")
                                    <input type="hidden" name="id" value="{{ $product->id }}" />
                                    <label>Name:</label><br>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control"><br>
                                    <label>Price:</label><br>
                                    <input type="number" name="price" value="{{ $product->price }}" class="form-control"><br>
                                    <label>Description:</label><br>
                                    <input type="text" name="description" value="{{ $product->description }}" class="form-control"><br>
                                    <label>Image:</label><br>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    <br>
                                    <input type="submit" value="Update" class="btn btn-success"><br>
                            </form>
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
