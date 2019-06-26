@extends('assets.pagina.es.layouts.master')

@section('content')
 
  <script>

  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1588538331453581');
  fbq('track', 'AddPaymentInfo');
</script>
<noscript>
    <img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1588538331453581&ev=PageView&noscript=1"
/>
</noscript>


    <!-- page header -->
            <!--<section class="header header-bg-10">-->
            <!--    <div class="container">-->
            <!--        <div class="row">-->
            <!--            <div class="col-md-8 col-md-offset-2">-->
            <!--                <div class="header-content">-->
            <!--                    <div class="header-content-inner">-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->
            <!-- contact -->
            <br><br><br>
            <section class="contact-inner" style="text-align: center;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="contact_map">
                                <div class="container">                                
                                    <br>
                                   
                                  <?php 
                                  
                                    function entorno($data)
                                    {
                                            switch ($data) {
                                            case 'dev':
                                                $urljs="https://static-content-qas.vnforapps.com/v2/js/checkout.js?qa=true";
                                                $merchantId = merchantidtest;
                                                break;
                                            case 'prd':
                                                $urljs="https://static-content.vnforapps.com/v2/js/checkout.js";
                                                $merchantId = merchantidprd;
                                                break;
                                        }  
                                        
                                        return   $merchantId;
                                             
                                    } 
                                    
                                ?>
                              
   

                                     {!! Form::open(['route' => ['transaction'] , 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                                                <script src='https://static-content.vnforapps.com/v2/js/checkout.js'
                                                data-sessiontoken='{{$sessionToken}}'
                                                data-channel='web'
                                                data-merchantid='600690813'
                                                data-merchantlogo= 'https://www.machupicchugolden.com/plantilla/assets/images/logo_visaNet.png' data-formbuttoncolor='#09ab13'
                                                data-purchasenumber='{{$contador}}' 
                                                data-amount='{{$total}}'
                                                data-cardholdername='{{auth()->user()->name}}'
                                                data-cardholderlastname='{{auth()->user()->apellido}}'
                                                data-cardholderemail='{{auth()->user()->email}}'
                                                data-expirationminutes='5' data-timeouturl = 'timeout.html'>
                                                    
                                                </script>
                                                
                                 {!! Form::close() !!}

        
                                </div>
                            </div>
                        </div>
                      
                      
                    </div>
                </div>
            </section>
           
        </div>
        
        
       


@endsection

@section('script')
 

@endsection