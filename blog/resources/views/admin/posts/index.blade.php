@extends('admin.master')
@section('title')
  All Posts
@stop

@section('content')
<div class="content text-left">
  <a href="{{route('admin.dashboard.posts.create')}}" class="btn btn-primary mb-2">Create new</a>
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
          <th>Image</th>
          <th>Name</th>
          <th>Post by</th>
          <th>Category</th>
          <th>Sub Category</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if(count($posts) > 0)
        @php
          $i = 1;
        @endphp
        @foreach($posts as $post)
        <tr>
          <td>{{$i++}}</td>
          <td><img src="{{asset('/assets/uploads/posts')}}/{{$post->image}}" alt="" style="width:50px"> </td>
          <td>{{$post->title}}</td>
          <td>{{$post->user['name']}}</td>
          <td>{{$post->category['name']}}</td>
          <td>{{$post->sub_category['name']}}</td>
          <td>
            @if($post->is_active == 1)
              <span>Active</span>
            @else
              <span>InActive</span>
            @endif
          </td>
          <td>
            <a href="{{route('admin.dashboard.posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{route('admin.dashboard.posts.delete',$post->id)}}" class="btn btn-danger">Delete</a>
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
