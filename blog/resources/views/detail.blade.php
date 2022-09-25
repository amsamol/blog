@extends('master')
@section('title')
  {{$post->title}}
@stop

@section('content')
  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <img class="card-img-top" src="{{asset('/assets/uploads/posts/')}}/{{$post->image}}" alt="image" style="width:100%">
      <div class="card-body p-0 mt-3">
          <h2 class="card-title">{{$post->title }}</h2>
          <p>{{$post->description}}</p>
      </div>
  </div>
@stop
