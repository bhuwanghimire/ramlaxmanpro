@extends('admin.admin_master')
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
             
               
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title" id="" value=" {{old('title')}}" placeholder="Enter title">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" > {{old('description')}}</textarea>
            @error('description')
              <p class="text-danger">{{ $message }}</p>
              @enderror
          </div>

          {{-- <div class="form-group">
            <label for="">Content</label>
            <textarea id="summernote" class="form-control" rows="5" cols="100" name="description">
              {{old('description')}}
              </textarea>
              @error('description')
              <p class="text-danger">{{ $message }}</p>
              @enderror
          </div> --}}
        
          <div class="form-group">
            <label for="exampleInputFile">Slider Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id=""  name="slider_image">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
             
              <div class="input-group-append">
              
              </div>
            </div> @error('slider_image')
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