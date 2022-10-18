@extends('admin.master')
@section('title')
  All Sliders
@stop

@section('content')
<div class="content text-left">
  <a href="{{route('admin.dashboard.sliders.create')}}" class="btn btn-primary mb-2">Create new</a>
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
          <th>Image</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $i = 1;
        @endphp
        @foreach($sliders as $slider)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$slider->name}}</td>
          <th><img src="{{asset('/assets/uploads/sliders/')}}/{{$slider->image}}" alt="{{$slider->image}}" style="width:50px"> </th>
          <td>
            @if($slider->is_active == 1)
              <span>Active</span>
            @else
              <span>InActive</span>
            @endif
          </td>
          <td>
            <a href="{{route('admin.dashboard.sliders.edit',$slider->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{route('admin.dashboard.sliders.delete',$slider->id)}}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
