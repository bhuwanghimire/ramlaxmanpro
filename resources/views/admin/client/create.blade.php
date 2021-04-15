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
      <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
             
         
        
        
          <div class="form-group">
            <label for="exampleInputFile">Client Logo</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="" name="logo">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
             
              <div class="input-group-append">
              
              </div>
            </div> @error('logo')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="">Client Link</label>
            <input type="text" class="form-control" name="client_link" id="" placeholder="Enter Client Link">
          
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