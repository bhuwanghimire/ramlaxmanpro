@extends('admin.admin_master')
@section('content')

<div class="card">
   
   <br>
    <p style="margin-left:25px;"> <a href="{{route('client.create')}}" class="btn  bg-gradient-primary btn-flat mr-auto">Client Logo</a></p>
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
          <th>Client logo link</th>
          <th>Client Logo</th>
         
          <th>Action</th>
         
        </tr>
        </thead>
       
            
       
        <tbody>
            @foreach ($clients as $client)
        <tr>
          <td>{{$client->id}}</td>
         
       
          <td>{{$client->client_link}}</td>
          <td> <img src="{{ asset($client->client_logo) }}" style="height:40px; width:70px;" > </td>
       <td style="padding-left:12px;">  <a href="{{route('client.edit',$client->id)}}" class="btn btn-sm  bg-gradient-primary mr-auto"><i class="fas fa-edit"></i></a>
       <form action="{{ route('client.destroy', $client->id) }}" method="post">
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