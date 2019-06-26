<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Machupicchugolden</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/dist/css/bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{ URL::asset('public/assets/dist/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href=" {{ URL::asset('public/assets/dist/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href=" {{ URL::asset('public/assets/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href=" {{ URL::asset('public/assets/dist/css/blue.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Machupicchu  </b>Golde</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicio  de sessión</p>

    <form action="{{URL::route('tours.index')}}" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
</div>

<script src="{{ URL::asset('public/assets/dist/js/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ URL::asset('public/assets/dist/js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('public/assets/dist/js/icheck.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
