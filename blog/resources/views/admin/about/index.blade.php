@extends('admin.master')
@section('title')
  All About Us
@stop

@section('content')
<div class="content text-left">
  <a href="{{route('admin.dashboard.abouts.create')}}" class="btn btn-primary mb-2">Create new</a>
  @if(Session::get('success'))
          <div class="alert alert-success">
              {{session::get('success')}}
          </div>
  @endif
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="bg-primary text-white">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $i = 1;
        @endphp
        @foreach($abouts as $about)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$about->title}}</td>
          <td>
            @if($about->is_active == 1)
              <span>Active</span>
            @else
              <span>InActive</span>
            @endif
          </td>
          <td>
            <a href="{{route('admin.dashboard.abouts.edit',$about->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{route('admin.dashboard.abouts.delete',$about->id)}}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
