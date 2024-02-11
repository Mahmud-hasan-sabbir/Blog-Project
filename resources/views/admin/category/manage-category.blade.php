@extends('admin.master')

@section('title')
    Manage category page
@endsection

@section('body')
    <div class="row">
       <div class="col-12">
           <div class="card">
               <div class="card-header">
                   <h3 class="text-center text-success">Manage Category</h3>
               </div>
               <div class="card-body">
                   <p class="text-success text-center">{{ Session::has('message') ? Session::get('message') : '' }}</p>
                   <table class="table table-bordered table-striped table-hover " id="basic-datatable">
                       <thead>
                       <tr>
                           <th>SL NO</th>
                           <th>Category Name</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                       <tbody>
                       @foreach($categories as $category)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $category->name }}</td>
                           <td>{{ $category->status == 1 ? 'published':'unpublished' }}</td>
                           <td>
                               <a href="{{ route('edit-category', ['id' => $category->id]) }}" class="btn btn-success btn-sm">Edit</a>
                               <a href="{{ route('delete-category',['id' => $category->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete category')">Delete</a>
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
