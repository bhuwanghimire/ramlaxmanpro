@extends('admin.admin_master')
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Testimonials</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('testimonial.store') }}" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
             
               
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" id="" placeholder="Enter Name" value="{{old('name')}}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

                
          <div class="form-group">
            <label for="exampleInputEmail1">Designation</label>
            <input type="text" class="form-control" name="designation" id="" placeholder="Enter Designation" value="{{old('designation')}}">
            @error('designation')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="">Content</label>
            <textarea id="summernote" class="form-control" rows="5" cols="100" name="description" value="{{old('description')}}">
              {{old('description')}}
              </textarea>
              @error('description')
              <p class="text-danger">{{ $message }}</p>
              @enderror
          </div>
        
         
          <div class="form-group">
            <label for="exampleInputFile"> Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="" name="image">
                <label class="custom-file-label" for="exampleInputFile"> Image</label>
              </div>
             
              <div class="input-group-append">
              
              </div>
            </div> @error('image')
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