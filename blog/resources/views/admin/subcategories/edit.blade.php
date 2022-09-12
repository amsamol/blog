@extends('admin.master')
@section('title')
  Edit Sub Categories
@stop

@section('content')
<div class="content text-left">
  <a href="{{route('admin.dashboard.subcategories.index')}}" class="btn btn-primary mb-2">Back</a>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form class="" action="{{route('admin.dashboard.subcategories.update',$subcategory->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <select name="category_id" class="form-control" required>
          <option value="">Select Category</option>
          @foreach($categories as $category)
            <option value="{{$category->id}}" @if($subcategory->category_id == $category->id) selected @endif>{{$category->name}}</option>

          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" required placeholder="Name" class="form-control" value="{{$subcategory->name}}">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@stop
