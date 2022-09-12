@extends('admin.master')
@section('title')
  All Categories
@stop

@section('content')
<div class="content text-left">
  <a href="{{route('admin.dashboard.categories.create')}}" class="btn btn-primary mb-2">Create new</a>
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
        @if(count($categories) > 0)
        @php
          $i = 1;
        @endphp
        @foreach($categories as $category)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$category->name}}</td>
          <td>
            @if($category->is_active == 1)
              <span>Active</span>
            @else
              <span>InActive</span>
            @endif
          </td>
          <td>
            <a href="{{route('admin.dashboard.categories.edit',$category->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{route('admin.dashboard.categories.delete',$category->id)}}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
        @else
          <tr class="text-center">
            <td colspan="4">No record</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
@stop
