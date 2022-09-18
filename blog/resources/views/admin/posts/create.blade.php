@extends('admin.master')
@section('title')
  Post Create
@stop

@section('content')
<div class="content text-left">
  <a href="{{route('admin.dashboard.posts.index')}}" class="btn btn-primary mb-2">Back</a>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form class="" action="{{route('admin.dashboard.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf

      <div class="form-group">
        <select class="form-control" name="category_id">
          <option value="" style="display:none">Select Category</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <select class="form-control" name="sub_category_id">
          <option value="" style="display:none">Select Sub Category</option>
          @foreach($subcategories as $subcategory)
          <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" required placeholder="Title" class="form-control">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="5" class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@stop
