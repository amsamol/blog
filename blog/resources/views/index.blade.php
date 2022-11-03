@extends('master')
@section('title')
  Home
@stop

@section('content')

  <div class="slider-section mb-4 p-0">
      <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          @foreach($sliders as $key => $slider)
          <li data-target="#demo" data-slide-to="{{$key}}" class="{{ $loop->first ? 'active' : '' }}"></li>
          @endforeach
        </ul>
        <div class="carousel-inner">

          @foreach($sliders as $slider)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{asset('assets/uploads/sliders/')}}/{{$slider->image}}" alt="{{$slider->name}}" style="width:100%">
            <div class="carousel-caption">
              <h3>{{$slider->name}}</h3>
            </div>
          </div>
        @endforeach
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
  </div>
@if($posts)
<div class="row">
@foreach($posts as $post)
  <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4">
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
</div>
@endif
@stop
