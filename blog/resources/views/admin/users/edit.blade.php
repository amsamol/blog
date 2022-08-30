@extends('admin.master')
@section('title')
  user Edit
@stop

@section('content')
<div class="content text-left">
  <a href="{{route('admin.dashboard.users.index')}}" class="btn btn-primary mb-2">Back</a>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form class="" action="{{route('admin.dashboard.users.update',$user->id)}}" method="post">
    @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" required placeholder="Name" class="form-control" value="{{$user->name}}">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" required placeholder="Email" class="form-control" value="{{$user->email}}">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@stop
