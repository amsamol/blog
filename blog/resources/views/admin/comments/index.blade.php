@extends('admin.master')
@section('title')
  All Comments
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
          <th>Name</th>
          <th>Post by</th>
          <th>Post</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if(count($comments) > 0)
        @php
          $i = 1;
        @endphp
        @foreach($comments as $comment)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$comment->title}}</td>
          <td>{{$comment->user['name']}}</td>
          <td>{{$comment->post['title']}}</td>
          <td>
            @if($comment->is_active == 1)
              <span>Active</span>
            @else
              <span>InActive</span>
            @endif
          </td>
          <td>
            <a href="" class="btn btn-primary">Edit</a>
            <a href="" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
        @else
          <tr class="text-center">
            <td colspan="5">No record</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
@stop
