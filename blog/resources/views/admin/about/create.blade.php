@extends('admin.master')
@section('title')
  Create About Us
@stop

@section('content')
<div class="content text-left">
  <a href="{{route('admin.dashboard.abouts.index')}}" class="btn btn-primary mb-2">Back</a>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form class="" action="{{route('admin.dashboard.abouts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" required placeholder="Title" class="form-control">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="8" class="form-control" required></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@stop
