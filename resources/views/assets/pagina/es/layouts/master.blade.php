<!DOCTYPE html>
<html>
<head>
<title>Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
{!!Html::style('elit/css/bootstrap.css')!!}
{!!Html::style('elit/css/style.css')!!}
{!!Html::style('elit/css/font-awesome.css')!!}
{!!Html::style('elit/css/easy-responsive-tabs.css')!!}
{!!Html::style('elit/css/flexslider.css')!!}

<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
 
    	 @include('assets.pagina.partials.header')




<style>
    /* container */

#share {
	width: 100%;
  	margin: 100px auto;
  	text-align: center;
}

/* buttons */

#share a {
	width: 50px;
  	height: 50px;
  	display: inline-block;
  	margin: 8px;
  	border-radius: 50%;
  	font-size: 24px;
  	color: #fff;
	opacity: 0.75;
	transition: opacity 0.15s linear;
}

#share a:hover {
	opacity: 1;
}

/* icons */

#share i {
  	position: relative;
  	top: 50%;
  	transform: translateY(-50%);
}

/* colors */

.facebook {
 	background: #3b5998;
}

.twitter {
  	background: #55acee;
}

.googleplus {
  	background: #dd4b39;
}

.linkedin {
  	background: #0077b5;
}

.pinterest {
  	background: #cb2027;
}
</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-96012161-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-96012161-1');
</script>

</head>

<body>

      @include('assets.pagina.es.layouts.navbar')

    @yield('content')


<div class="footer">

    <div class="col-md-6 footer-left">     
        <ul class="social-nav model-3d-0 footer-social w3_agile_social two">
              <li><a href="#" class="facebook">
                  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
              <li><a href="#" class="twitter"> 
                  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
              <li><a href="#" class="instagram">
                  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
              <li><a href="#" class="pinterest">
                  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
        </ul>

    </div>
      <div class="col-md-6 " >
        
      <!-- <p class="copy-right">Todos los derechos reservados | 2019<a href=" "></a></p> -->
      </div>

</div>
<!-- //footer -->

<!-- login -->
      <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content modal-info">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body modal-spa">
              <div class="login-grids">
                <div class="login">
                  <div class="login-bottom">
                    <h3>Sign up for free</h3>
                    <form>
                      <div class="sign-up">
                        <h4>Email :</h4>
                        <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required=""> 
                      </div>
                      <div class="sign-up">
                        <h4>Password :</h4>
                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                        
                      </div>
                      <div class="sign-up">
                        <h4>Re-type Password :</h4>
                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                        
                      </div>
                      <div class="sign-up">
                        <input type="submit" value="REGISTER NOW" >
                      </div>
                      
                    </form>
                  </div>
                  <div class="login-right">
                    <h3>Sign in with your account</h3>
                    <form>
                      <div class="sign-in">
                        <h4>Email :</h4>
                        <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required=""> 
                      </div>
                      <div class="sign-in">
                        <h4>Password :</h4>
                        <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                        <a href="#">Forgot password?</a>
                      </div>
                      <div class="single-bottom">
                        <input type="checkbox"  id="brand" value="">
                        <label for="brand"><span></span>Remember Me.</label>
                      </div>
                      <div class="sign-in">
                        <input type="submit" value="SIGNIN" >
                      </div>
                    </form>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


  <!-- Custom-JavaScript-File-Links --> 
  <!-- cart-js -->

  {!!Html::script('elit/js/minicart.min.js')!!}
  {!!Html::script('elit/js/jquery-2.1.4.min.js')!!}
  {!!Html::script('elit/js/modernizr.custom.js')!!}
  {!!Html::script('elit/js/modernizr.custom.js')!!}
<script>
  // Mini Cart
  paypal.minicart.render({
    action: '#'
  });

  if (~window.location.search.indexOf('reset=true')) {
    paypal.minicart.reset();
  }
</script>

  <!-- //cart-js --> 
<!-- script for responsive tabs -->           

{!!Html::script('elit/js/imagezoom.js')!!}
{!!Html::script('elit/js/easy-responsive-tabs.js')!!}
<script>
  $(document).ready(function () {
  $('#horizontalTab').easyResponsiveTabs({
  type: 'default', //Types: default, vertical, accordion           
  width: 'auto', //auto or any width like 600px
  fit: true,   // 100% fit in a container
  closed: 'accordion', // Start closed if in accordion view
  activate: function(event) { // Callback function if tab is switched
  var $tab = $(this);
  var $info = $('#tabInfo');
  var $name = $('span', $info);
  $name.text($tab.text());
  $info.show();
  }
  });
  $('#verticalTab').easyResponsiveTabs({
  type: 'vertical',
  width: 'auto',
  fit: true
  });
  });
</script>
<!-- //script for responsive tabs -->   
<!-- stats -->

  {!!Html::script('elit/js/jquery.waypoints.min.js')!!}
  {!!Html::script('elit/js/jquery.waypoints.min.js')!!}
  {!!Html::script('elit/js/jquery.flexslider.js')!!}

  <script>
            // Can also be used with $(document).ready()
              $(window).load(function() {
                $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
                });
              });
            </script>
  <script>
    $('.counter').countUp();
  </script>
<!-- //stats -->
<!-- start-smoth-scrolling -->

{!!Html::script('elit/js/move-top.js')!!}
{!!Html::script('elit/js/jquery.easing.min.js')!!}
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
  });
</script>
<!-- here stars scrolling icon -->
  <script type="text/javascript">
    $(document).ready(function() {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
      */
                
      $().UItoTop({ easingType: 'easeOutQuart' });
                
      });
  </script>
<!-- //here ends scrolling icon -->


<!-- for bootstrap working -->

   {!!Html::script('elit/js/bootstrap.js')!!}
</body>
</html>
