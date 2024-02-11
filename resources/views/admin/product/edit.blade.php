@extends('admin.master')

@section('title')
    Edit Product page
@endsection

@section('body')
    <div class="row mt-5">
        <div class="col-md-8 mx-auto" >
            <div class="card">
                <div class="card-header">
                    <h3 class="text-success text-center">Edit Product page</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-product',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <label class="col-md-4">Category Name</label>
                            <div class="col-md-8">
                                <select name="category_id" id="" class="form-control">
                                    <option value="" selected disabled> -- category name--</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' :'' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4"> Brand Name</label>
                            <div class="col-md-8">
                                <select name="brand_id" id="" class="form-control">
                                    <option value=""  selected disabled>-- brand name--</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : ''}}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4"> Product Name</label>
                            <div class="col-md-8">
                                <input type="text" value="{{ $product->name }}" class="form-control" name="name" placeholder="product name">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4"> Product price</label>
                            <div class="col-md-8">
                                <input type="number" value="{{ $product->price }}" class="form-control" name="price" placeholder="product price">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4"> Product description</label>
                            <div class="col-md-8">
                                <textarea name="description" id="productDescription" cols="30" rows="5" class="form-control">{!! $product->description !!}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4"> Product image</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="image" >
                                <img src="{{ asset($product->image) }}" alt="" height="60px" width="60px">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <label for=""><input type="radio" name="status" value="1" {{ $product->status == 1 ? 'checked' : '' }}> Published</label>
                                <label for=""><input type="radio" name="status" value="0" {{ $product->status == 0 ? 'checked' : '' }}> Un publishid</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success form-control" value="Update product">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
