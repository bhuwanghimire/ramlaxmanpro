@extends('admin.admin_master')
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Categories Page Of Portfolio</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
             
               
          <div class="form-group">
            <label for="">Category</label>
            <input type="text" class="form-control" name="category" id="" value=" {{old('category')}}" placeholder="Enter category" >
            @error('category')
            <p class="text-danger">{{ $message }}</p>
            @enderror
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