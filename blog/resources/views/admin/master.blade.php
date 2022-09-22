<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style media="screen">
    a{
      color: #333;
    }
  </style>
</head>
<body>

<div class="section-nav">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">

    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.dashboard.users.profile',Auth::User()->id)}}">Profile</a>
        </li>
      </ul>
    </div>

  </div>
  </nav>
</div>

<div class="section container mt-4">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-3">
      <div class="nav-side">
        <ul class="list-group">
          <li class="list-group-item active">Navication</li>
          <li class="list-group-item"><a href="{{route('admin.dashboard.index')}}">Dashboard</a> </li>
          <li class="list-group-item"><a href="{{route('admin.dashboard.users.index')}}">Users</a> </li>
          <li class="list-group-item"><a href="{{route('admin.dashboard.categories.index')}}">Categories</a> </li>
          <li class="list-group-item"><a href="{{route('admin.dashboard.subcategories.index')}}">Sub Categories</a> </li>
          <li class="list-group-item"><a href="{{route('admin.dashboard.posts.index')}}">Posts</a> </li>
          <li class="list-group-item"><a href="{{route('admin.dashboard.comments.index')}}">Comments</a> </li>
          <li class="list-group-item"><a href="{{route('admin.dashboard.users.logout')}}">Logout</a> </li>

        </ul>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-9 text-center">
      @yield('content')
    </div>
  </div>
</div>

</body>
</html>
