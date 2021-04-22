@extends('admin.admin_master')
@section('content')

<div class="card">
   
   <br>
    <p style="margin-left:25px;"> <a href="{{route('about.create')}}" class="btn  bg-gradient-primary btn-flat mr-auto">Create Aboutus</a></p>
    {{-- @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif --}}
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Description</th>
          <th>Image </th>
          <th>Action</th>
         
        </tr>
        </thead>
       
            
       
        <tbody>
            @foreach ($abouts as $about)
        <tr>
          <td>{{$about->id}}</td>
          <td>{{$about->title}}</td>
          <td>{!!$about->description!!}</td>
         
          <td> <img src="{{ asset($about->image) }}" style="height:40px; width:70px;" > </td>
       <td style="padding-left:12px;">  <a href="{{route('about.edit',$about->id)}}" class="btn btn-sm  bg-gradient-primary mr-auto "><i class="fas fa-edit "></i></a>
       <form action="{{ route('about.destroy', $about->id) }}" method="post">
        @csrf
      @method('delete')
        <button type="submit" class="text-danger"><i class="fas fa-trash"></i></button>
       </form></td>
        </tr>
        @endforeach
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  
  </div>
@endsection