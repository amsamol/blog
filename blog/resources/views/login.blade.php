<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style media="screen">
  body{
    background: blue;
  }
    .login-form{
      background: #fff;
      padding: 14PX;
      margin-top: 200px;
      border-radius: 5px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="col-12 col-sm-12 col-md-4 offset-md-4 login-form">
    <h2>Login</h2>
    <form action="{{route('user.login')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</div>

</body>
</html>
