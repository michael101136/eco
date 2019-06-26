<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ecomer</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/bootstrap.min.css')}}">
  
  
  <link rel="stylesheet" href="{{ URL::asset('assets/dist/font-awesome/css/font-awesome.min.css')}}">
  
  <link rel="stylesheet" href=" {{ URL::asset('assets/dist/Ionicons/css/ionicons.min.css')}}">

 
  <link rel="stylesheet" href=" {{ URL::asset('assets/dist/css/dataTables.bootstrap.min.css')}}">
  
  <link rel="stylesheet" href=" {{ URL::asset('assets/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href=" {{ URL::asset('assets/dist/css/skins/_all-skins.min.css')}}">
   <link rel="stylesheet" href=" {{ URL::asset('assets/dist/css/toastr.min.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/basic.css" rel="stylesheet" type="text/css" />
   @yield('style')
      <style type="text/css">
                .dropzone {
                    border:2px dashed #999999;
                    border-radius: 10px;
                }
                .dropzone .dz-default.dz-message {
                    height: 171px;
                    background-size: 132px 132px;
                    margin-top: -101.5px;
                    background-position-x:center;

                }
                .dropzone .dz-default.dz-message span {
                    display: block;
                    margin-top: 145px;
                    font-size: 20px;
                    text-align: center;
                }
            </style>
      
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="/" class="logo">
      <span class="logo-lg"><b>Ecomer</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Adminnistrador
                  <small>Machupicchu </small>
                </p>
              </li>
           
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrador</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Categoria</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::route('categories.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
          </ul>
        </li>   

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Producto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{URL::route('producto.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::route('users.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
          </ul>
        </li>   

         <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Multimedia</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::route('multimedia.index') }}"><i class="fa fa-circle-o"></i> Slider</a></li>
          </ul>
        </li>  

         <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Testimonio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::route('testimonio.index') }}"><i class="fa fa-circle-o"></i> listar</a></li>
          </ul>
        </li>  
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Reserva</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::route('reservation.index') }}"><i class="fa fa-circle-o"></i> listar</a></li>
          </ul>
        </li>  
         <li class="treeview">
                  <a href="#">
                    <i class="fa fa-bullhorn"></i>
                    <span>Post</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                      
                        <li class="{{ Request::is('categoria_controller*') ? 'active' : '' }}">
                            <a href="{!! route('categoria_controller.index') !!}"><i class="fa fa-edit"></i><span>Categorias Blogs</span></a>
                        </li>

                        <li class="{{ Request::is('blogs*') ? 'active' : '' }}">
                            <a href="{!! route('blogs.index') !!}"><i class="fa fa-edit"></i><span>Blog</span></a>
                        </li>

                  </ul>
        </li>

      </ul>
    </section>
  </aside>


  <div class="content-wrapper">
    
     @yield('contenido')
     
 

  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0  
    </div>
    <strong>Copyright &copy; </strong>
  </footer>
</div>
<script src="{{ URL::asset('assets/dist/js/jquery/dist/jquery.min.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script src="{{ URL::asset('assets/dist/js/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script src="{{ URL::asset('assets/dist/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/dist/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/dist/js/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<script src="{{ URL::asset('assets/dist/fastclick/lib/fastclick.js')}}"></script>
<script src="{{ URL::asset('assets/dist/js/adminlte.min.js')}} "></script>
<script src="{{ URL::asset('assets/dist/js/demo.js')}}"></script>
<script src="{{ URL::asset('assets/dist/js/toastr.min.js')}}"></script>
@yield('script')
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
