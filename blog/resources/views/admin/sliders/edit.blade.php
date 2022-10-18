@extends('admin.master')
@section('title')
  Edit Slider
@stop

@section('content')
<div class="content text-left">
  <a href="{{route('admin.dashboard.sliders.index')}}" class="btn btn-primary mb-2">Back</a>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form class="" action="{{route('admin.dashboard.sliders.update',$slider->id)}}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" required placeholder="Name" class="form-control" value="{{$slider->name}}">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="8" class="form-control" required>{{$slider->description}}</textarea>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@stop
