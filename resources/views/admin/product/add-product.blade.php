@extends('admin.master')

@section('title')
    Add Product page
@endsection

@section('body')
    <div class="row mt-5">
        <div class="col-md-8 mx-auto" >
            <div class="card">
                <div class="card-header">
                    <h3 class="text-success text-center">Add Product page</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{ Session::has('message') ? Session::get('message') :' ' }}</p>
                    <form action="{{ route('new-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <label class="col-md-4">Category Name</label>
                            <div class="col-md-8">
                                <select name="category_id" id="" class="form-control">
                                    <option value="" selected disabled> -- category name--</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4"> Product Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" placeholder="product name">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4"> Product price</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="price" placeholder="product price">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4"> Product description</label>
                            <div class="col-md-8">
                                <textarea name="description" id="productDescription" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4"> Product image</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="image" >
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <label for=""><input type="radio" name="status" value="1" checked> Published</label>
                                <label for=""><input type="radio" name="status" value="0"> Un publishid</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success form-control" value="Add product">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
