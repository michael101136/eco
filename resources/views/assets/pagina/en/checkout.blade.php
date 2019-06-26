@extends('assets.pagina.en.layouts.master')

@section('content')
 
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
                                   
                                  
                                        <div class="col-xs-12 col-md-6">

                                            <div class="panel panel-default">
                                                 <h1> Checkout</h1>
                               
                                                <div class="panel-body">
                                                    <span class="paymentErrors alert-danger"></span>
                                                        {!! Form::open(['route'=> ['checkoutPost'], 'method' => 'POST', 'files'=>'true', 'id' => 'checkout-form']) !!}
                                                       <div class='form-row'>
                                                                <div class='col-xs-12 form-group required'>
                                                                    <label class='control-label'>Name on Card</label> 
                                                                    <input class='form-control' size='4' id="name" name="name" type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='form-row'>
                                                                <div class='col-xs-12 form-group card required'>
                                                                    <label class='control-label'>Card Number</label> 
                                                                    <input  autocomplete='off' id="card_name"  name="card_name"   class='form-control card-number' size='20'
                                                                        type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='form-row'>
                                                                <div class='col-xs-4 form-group cvc required'>
                                                                    <label class='control-label'>CVC</label> 
                                                                    <input autocomplete='off' class='form-control card-cvc' id="cvc"  name="cvc" placeholder='ex. 311' size='4'
                                                                        type='text'>
                                                                </div>
                                                                <div class='col-xs-4 form-group expiration required'>
                                                                    <label class='control-label'>Expiration</label> <input class='form-control card-expiry-month' id="expiration" name="expiration" placeholder='MM' size='2'
                                                                        type='text'>
                                                                </div>
                                                                <div class='col-xs-4 form-group expiration required'>
                                                                    <label class='control-label'> </label>
                                                                     <input class='form-control card-expiry-year' name="year" id="year" placeholder='YYYY' size='4'
                                                                        type='text'>
                                                                </div>
                                                            </div>
                                                            <div class='form-row'>
                                                                <div class='col-md-12'>
                                                                    <div class='form-control total btn btn-info'>
                                                                        Total: <span class='amount'>${{$total}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class='form-row'>
                                                                <div class='col-md-12 form-group'>
                                                                    <button class='form-control btn btn-primary submit-button'
                                                                        type='submit' style="margin-top: 10px;">Pay »</button>
                                                                </div>
                                                            </div>
                                                            <div class='form-row'>
                                                                <div class='col-md-12 error form-group hide'>
                                                                    <div class='alert-danger alert'>Please correct the errors and try
                                                                        again.</div>
                                                                </div>
                                                            </div>
                                                             {!! Form::close() !!}
                                                    </div>
                                                </div>
                                         </div>                          

                                </div>
                            </div>
                        </div>
                      
                      
                    </div>
                </div>
            </section>
           
        </div>

@endsection

@section('script')
   
  <script src="https://js.stripe.com/v3/"></script>
  <script type="text/javascript" src="{{URL::to('js/checkout.js')}}"></script>
@endsection