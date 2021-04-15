@extends('admin.admin_master')
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">About Us</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('profile.update',$profile->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
             
               
            <div class="form-group">
              <label for="exampleInputEmail1">Address</label>
              <input type="text" class="form-control" name="address" id="" value="{{$profile->address}}">
              @error('address')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
  
            <div class="form-group">
              <label for="exampleInputEmail1">Phone</label>
              <input type="number" class="form-control" name="phone" id="" value="{{$profile->phone}}">
              @error('phone')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
  
            <div class="form-group">
              <label for="exampleInputEmail1">Mail Address</label>
              <input type="text" class="form-control" name="email" id=""value="{{$profile->email}}">
              @error('email')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
  
            <div class="form-group">
              <label for="exampleInputEmail1">Facebook Link</label>
              <input type="url" required class="form-control" name="fb_link" id="" value="{{$profile->fb_link}}">
              @error('fb_link')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
  
            <div class="form-group">
              <label for="">Map Address</label>
              <input type="text" required class="form-control"  name="map_address"  id="" value="{{$profile->map_address}}">
            
                @error('map_address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
          
            <div class="form-group">
              <label for="exampleInputFile"> Logo</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="" name="logo">
                  <label class="custom-file-label" for="exampleInputFile">Choose Logo</label>
                </div>
               
                <div class="input-group-append">
                
                </div>
              </div> @error('logo')
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