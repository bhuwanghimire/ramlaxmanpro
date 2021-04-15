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
      <form method="POST" action="{{ route('portfolio.update',$portfolio->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <select class="custom-select custom-select-lg mb-3" name="category_id">
            <option value="">Open this select menu</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" {{$category->id == $portfolio->category_id ? 'selected' : '' }}>{{$category->category}}</option>
           
                
            @endforeach
            
           
          </select>

         
          <div class="form-group">
            <label for="exampleInputFile">Slider Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="" name="image">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
              
              </div>
            </div>
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