@extends('admin.master')

@section('title')
    Edit Brand page
@endsection

@section('body')
    <div class="row mt-5">
        <div class="col-md-6 mx-auto" >
            <div class="card">
                <div class="card-header">
                    <h3 class="text-success text-center">Edit Brand page</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{ Session::has('message') ? Session::get('message') :' ' }}</p>
                    <form action="{{ route('update-brand', ['id' => $brand->id]) }}" method="post">
                        @csrf
                        <div class="row mt-3">
                            <label class="col-md-4">Add Brand</label>
                            <div class="col-md-8">
                                <input type="text" value="{{ $brand->name }}" class="form-control" name="name" placeholder="brand name">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <label for=""><input type="radio" name="status" value="1" {{ $brand->status == 1 ? 'checked':'' }} > Published</label>
                                <label for=""><input type="radio" name="status" value="0" {{ $brand->status == 0 ? 'checked':'' }}> Un publishid</label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success form-control" value="Update Brand">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
