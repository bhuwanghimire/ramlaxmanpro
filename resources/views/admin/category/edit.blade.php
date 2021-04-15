@extends('admin.admin_master')
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Category Edit Page</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <input type="text" class="form-control" name="category" id="" value="{{$category->category}}">
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->


  </div>
  @endsection