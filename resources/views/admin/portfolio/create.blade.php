@extends('admin.admin_master')
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Portfolio</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('portfolio.store') }}" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
             
         
          <select class="custom-select custom-select-lg mb-3" name="categoryid">
            <option selected>Open this select menu</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
           
                
            @endforeach
            
           
          </select>
          @error('category')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <div class="form-group">
            <label for="exampleInputFile">Slider Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="" name="image">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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