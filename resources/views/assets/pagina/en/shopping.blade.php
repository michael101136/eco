@extends('assets.pagina.en.layouts.master')

@section('content')
 <?php
function precioTreintaP($precio,$cantidad)
	{
	    
             $treintaP=($precio*30)/100;
             
             $calcularDiezP=($treintaP*0.1);
             
             $total=$treintaP+$calcularDiezP;
              
             return $total*$cantidad;
              
	} 
	
		function precioMonto($precio,$cantidad)
	{
	    
              
             echo $cantidad*$precio;
              
	} 
?>
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
            <section class="contact-inner">
                <br><br><br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="contact_map">
                               <div class="container">
                                    @if(Session::has('cart'))
                                        <table id="cart" class="table table-hover table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:50%">Tours</th>
                                                                <th style="width:10%">Price</th>
                                                                <th style="width:8%">Quantity</th>
                                                                <th style="width:22%" class="text-center">Advancement</th>
                                                                <th style="width:10%"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                             @foreach($products as $product)
                                                                <tr>
                                                                    <td data-th="Product">
                                                                        <div class="row">
                                                                            <div class="col-sm-2 hidden-xs"><img src="/{{ $product['item']['img'] }}" alt="..." class="img-responsive"/></div>
                                                                            <div class="col-sm-10">
                                                                                <h4 class="nomargin">{{ $product['item']['name'] }} </h4>
                                                                                </h4>
                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td data-th="Price">$. <?= precioMonto($product['item']['price'],$product['qty']) ?> </td>
                                                                    <td data-th="Quantity">
                                                                        <input type="text" class="form-control text-center" value="{{ $product['qty'] }}">
                                                                    </td>
                                                                    <td data-th="Subtotal" class="text-center">
                                                                        
                                                                       $. <?=precioTreintaP($product['item']['price'],$product['qty'] );?> 
                                                                      
                                                                        </td>
                                                                    <td class="actions" data-th="">
                                                                        <a href="{{route('product.addToCart',['id' => $product['item']['id']])}}" class="btn btn-success btn-sm" ><i class="fa  fa-plus"></i></a>
                                                                        <a href="{{route('product.reduceByOne',['id' => $product['item']['id']]) }}" class="btn btn-danger btn-sm" ><i class="fa  fa-minus"></i></a>
                                                                        <a href="{{route('product.remove',['id' => $product['item']['id']]) }}" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="visible-xs">
                                                                <td class="text-center"><strong>Totals : {{ $totalPrice}}</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                                                <td colspan="2" class="hidden-xs"></td>
                                                                <td class="hidden-xs text-center"><strong>Total $ {{ $totalPrice}} </strong></td>
                                                                <!--<td><a href="{{ route('checkout')}}" class="btn btn-success btn-block" >Checkout <i class="fa fa-angle-right"></i></a></td>-->
                                                          
                                                            
                                                             @if (Auth::guest())
                                                            <td><a href="{{ route('login')}}" class="btn btn-success btn-block" >Checkout<i class="fa fa-angle-right"></i></a></td>
                                                                                    </tr>
                                                            @else
                                                                <td><a href="{{ route('checkout')}}" class="btn btn-success btn-block" >Checkout <i class="fa fa-angle-right"></i></a></td>
                                                            @endif
                                                            
                                                        </tfoot>
                                            </table>
                                        @else


                                        @endif
                                           <div align="justify">
                                    <hr>
                                    <h5 style="color:red">IMPORTANT!</h5>
                                    <h6>
                                    TO RESERVE THE PAYMENT OF 30% OF THE TOTAL PRICE + 10% PER PAYMENT COMMISSION WITH CARD IS MADE. THE BALANCE IS PAID UPON ARRIVAL IN CUSCO BEFORE STARTING THE FIRST TOUR.<br>
                                    * APPLIES FROM TWO PEOPLE TO MORE.
                                    
                                    </h6>
                                     <h6 >
                                         * FOR A PERSON THE PRICE INCREASES ACCORDING TO THE CONTRACTED PACKAGE.
                                    
                                    </h6>
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
   
  
@endsection