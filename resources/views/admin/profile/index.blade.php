@extends('admin.admin_master')
@section('content')

<div class="card">
   
   <br>
    <p style="margin-left:25px;"> <a href="{{route('profile.create')}}" class="btn  bg-gradient-primary btn-flat mr-auto">Create Profile</a></p>
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
          <th>Address</th>
          <th>Phone</th>
          <th>Email </th>
          <th>Facebook Link</th>
          <th>Map Link</th>
          <th>Logo</th>
        </tr>
        </thead>
       
            
       
        <tbody>
            @foreach ($profiles as $profile)
        <tr>
          <td>{{$profile->id}}</td>
          <td>{{$profile->address}}</td>
          <td>{{$profile->phone}}</td>
          <td>{{$profile->email}}</td>
          <td>{{$profile->fb_link}}</td>
        
          <td> <iframe src={{$profile->map_address}}></iframe> </td>
         
          <td> <img src="{{ asset($profile->logo) }}" style="height:40px; width:70px;" > </td>
       <td style="padding-left:12px;">  <a href="{{route('profile.edit',$profile->id)}}" class="btn btn-sm  bg-gradient-primary mr-auto"><i class="fas fa-edit"></i></a>
       <form action="{{ route('profile.destroy', $profile->id) }}" method="post">
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