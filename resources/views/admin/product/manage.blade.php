@extends('admin.master')

@section('title')
    Manage product page
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-success">Manage Product</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{ Session::has('message') ? Session::get('message') : '' }}</p>
                    <table class="table table-bordered table-striped table-hover " id="basic-datatable">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Category Name</th>
                            <th>brand Name</th>
                            <th>product Name</th>
                            <th>product price</th>
                            <th>product description</th>
                            <th>product Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{!! \Illuminate\Support\Str::words($product->description,20,'.....') !!}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" alt="" style="width: 70px" height="60px">
                                </td>
                                <td>{{ $product->status == 1 ? 'published':'unpublished' }}</td>
                                <td>
                                    <a href="{{ route('edit-product',['id'=>$product->id]) }}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="{{ route('delete-product',['id'=>$product->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete product')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
