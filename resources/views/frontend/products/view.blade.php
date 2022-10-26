@extends('layouts.front')

@section('title', $products->name)
@endsection

@section('content')
<div class="container">
    <div class="card-shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ 'assets/uploads/products/' . $products->image }}" class="w-100" alt="Product Image Here">
                </div>

                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $products->name }}

                    </h2>
                    <br>

                    <label style="font-size: 16px" class="float-end badge bg-danger trending_tag">Trending</label>
                    <label class="me-3">Original Price : <s>Rs {{ $products->original_price }}</s></label>
                    <label class="fw-bold">Original Price : <s>Rs {{ $products->original_price }}</s></label>
                    <p class="mt-3">
                        {!! $product->small_description !!}
                    </p>
                    <br>
                    @if ($products->qty > 0)
                        <label class="badge bg-success">In Stock</label>
                    @else
                        <label class="badge bg-danger">Out of Stock</label>
                    @endif
                </div>
                <div class="row mt-2">
                    <div class="col-md-2">
                        <label for="Quantity"> Quantity</label>
                        <div class="input-group text-center mb-3">
                            <span class="input-group-text">-</span>
                            <input type="text" name="quantity" value="1" class="form-control">
                            <span class="input-group-text">+</span>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist</button>
                        <button type="button" class="btn btn-primary me-3 float-end">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
