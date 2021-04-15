@extends('admin.admin_master')
@section('content')

<div class="card">
   
   <br>
    <p style="margin-left:25px;"> <a href="{{route('portfolio.create')}}" class="btn  bg-gradient-primary btn-flat mr-auto">Create Slider</a></p>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Id</th>
          <th>Category</th>        
          <th>Slider image</th>
          <th>Action</th>
         
        </tr>
        </thead>
       
            
       
        <tbody>
            @foreach ($portfolios as $portfolio)
        <tr>
          <td>{{$portfolio->id}}</td>
          <td>{{$portfolio->category->category}}</td>
       
         
          <td> <img src="{{ asset($portfolio->image) }}" style="height:40px; width:70px;" > </td>
       <td style="padding-left:12px;">  <a href="{{route('portfolio.edit',$portfolio->id)}}" class="btn btn-sm  bg-gradient-primary mr-auto"><i class="fas fa-edit"></i></a>
       <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="post">
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