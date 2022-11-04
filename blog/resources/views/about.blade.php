@extends('master')
@section('title')
  About Us
@stop

@section('content')
@foreach($abouts as $about)
  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card-body p-0 mt-3">
          <h2 class="card-title">{{$about->title}}</h2>
          <p>{{$about->description}}</p>
      </div>
  </div>
  @endforeach
@stop
