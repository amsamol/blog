@extends('admin.master')
@section('title')
  Dashboard
@stop

@section('content')
<div class="row">
  <div class="col-12 col-sm-12 col-md-3 mb-4">
    <div class="card bg-primary text-white">
       <div class="card-body">Users ({{$countUser}})</div>
     </div>
  </div>
  <div class="col-12 col-sm-12 col-md-3 mb-4">
     <div class="card bg-success text-white">
       <div class="card-body">Categories ({{$countCategories}})</div>
     </div>
  </div>
  <div class="col-12 col-sm-12 col-md-3 mb-4">
     <div class="card bg-secondary text-white">
       <div class="card-body">Sub Categories ({{$countSubCategories}})</div>
     </div>
  </div>
  <div class="col-12 col-sm-12 col-md-3 mb-4">
     <div class="card bg-warning text-white">
       <div class="card-body">Posts ({{$countPosts}})</div>
     </div>
  </div>
  <div class="col-12 col-sm-12 col-md-3 mb-4">
     <div class="card bg-warning text-white">
       <div class="card-body">Comments ({{$countComments}})</div>
     </div>
  </div>
</div>
@stop
