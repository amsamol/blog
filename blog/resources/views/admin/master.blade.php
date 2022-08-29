<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
          <a class="nav-link" href="#">Profile</a>
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
          <li class="list-group-item active">Dashboard</li>
          <li class="list-group-item"><a href="#">Home</a> </li>
          <li class="list-group-item"><a href="#">Users</a> </li>
          <li class="list-group-item"><a href="#">Categories</a> </li>
          <li class="list-group-item"><a href="#">Sub Categories</a> </li>
          <li class="list-group-item"><a href="#">Posts</a> </li>
        </ul>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-9 text-center">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3">
          <div class="card bg-primary text-white">
             <div class="card-body">Users</div>
           </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
           <div class="card bg-success text-white">
             <div class="card-body">Categories</div>
           </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
           <div class="card bg-secondary text-white">
             <div class="card-body">Sub Categories</div>
           </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3">
           <div class="card bg-warning text-white">
             <div class="card-body">Posts</div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
