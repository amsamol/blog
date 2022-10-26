@extends('master')
@section('title')
  Home
@stop

@section('content')

@if($posts)
@foreach($posts as $post)
  <div class="col-12 col-sm-6 col-md-3 col-lg-3">
    <div class="card">
      <a href="{{route('article.detail',$post->id)}}">
        <img class="card-img-top" src="{{asset('/assets/uploads/posts/')}}/{{$post->image}}" alt="image" style="width:100%">
      </a>
      <div class="card-body">
        <a href="{{route('article.detail',$post->id)}}">
          <h2 class="card-title">{{ Str::limit($post->title, 30) }}</h2>
        </a>
      </div>
    </div>
  </div>
  @endforeach
  {{$posts->render()}}
@endif
@stop
