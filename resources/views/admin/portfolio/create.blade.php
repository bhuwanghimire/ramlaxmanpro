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

          <div class="form-group">
            <label for="exampleInputEmail1">Enter Project Name</label>
            <input type="text" class="form-control" name="project_name" id="" placeholder="Enter Project Name" value=" {{old('project_name')}}">
            
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Enter Company  Name</label>
            <input type="text" class="form-control" name="company_name" id="" placeholder="Enter Company  Name" value=" {{old('company_name')}}">
            
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Enter Projct Date</label>
            <input type="date" class="form-control" name="date" id="" placeholder="Enter Projct Date" value=" {{old('date')}}">
            
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Enter Projct Link</label>
            <input type="text" class="form-control" name="link" id="" required placeholder="Enter Projct Link" value=" {{old('link')}}">
            
          </div>

          <div class="form-group">
            <label for="">Project Description</label>
            <textarea id="summernote" class="form-control" rows="5" cols="100" name="description" >
             {{old('description')}}
              </textarea>
             
          </div>
          <label for="">Select Portfolio Category</label>
          <select class="custom-select custom-select-lg mb-3" name="categoryid" value=" {{old('categoryid')}}">
           
            <option selected>Open this select menu</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
           
                
            @endforeach
            
           
          </select>
          @error('category')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <div class="form-group">
            <label for="exampleInputFile">Portfolio Image</label>
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