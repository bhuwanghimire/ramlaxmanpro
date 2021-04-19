@extends('admin.admin_master')
@section('content')

<div class="card">
   
   <br>
    <p style="margin-left:25px;"> <a href="{{route('team.create')}}" class="btn  bg-gradient-primary btn-flat mr-auto">Create Team</a></p>
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
          <th>Name</th>
          <th>Designation</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
        </thead>
       
            
       
        <tbody>
            @foreach ($teams as $team)
        <tr>
          <td>{{$team->id}}</td>
          <td>{{$team->name}}</td>
          <td>{{$team->designation}}</td>               
          <td> <img src="{{ asset($team->image) }}" style="height:40px; width:70px;" > </td>
       <td style="padding-left:12px;">  <a href="{{route('team.edit',$team->id)}}" class="btn btn-sm  bg-gradient-primary mr-auto"><i class="fas fa-edit"></i></a>
       <form action="{{ route('team.destroy', $team->id) }}" method="post">
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