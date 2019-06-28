@extends('assets.pagina.es.layouts.master')

@section('content')
  <!-- banner -->



  <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
    <div class="container">
         <!-- mens -->
        <div class="col-md-4 products-left">
           
            <div class="css-treeview">
                <h4>CATEGORÍA</h4>
                <ul class="tree-list-pad">

                     @foreach($categoria as $key => $value)
                        <li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> {{$value['name']}}</label>
                            <ul>
                                  @foreach($value['subProducto'] as $key => $values)
                                    
                                    <li>
                                        <input type="checkbox" id="item-0-0" /><label for="item-0-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>{{$values->nameSub}}</label>

                                    </li>

                                  @endforeach
                               
                            </ul>
                        </li>
                    @endforeach
                  
                </ul>
            </div>
           
            <div class="clearfix"></div>
        </div>
        <div class="col-md-8 products-right">
            <h5>{{ $ItempCategoria}}<span>Compare(0)</span></h5>
            <div class="sort-grid">
              
                <div class="sorting">
                    <h6>FILTRAR</h6>
                    <select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
                        <option value="null">7</option>
                        <option value="null">14</option> 
                        <option value="null">28</option>                    
                        <option value="null">35</option>                                
                    </select>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        
            @foreach($tours as $item)
                            <div class="col-md-4 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="/{{$item->img}}" alt="" class="pro-image-front">
                                        <img src="/{{$item->img}}" alt="" class="pro-image-back">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="single.html" class="link-product-add-cart">Quick View</a>
                                                </div>
                                            </div>
                                            <span class="product-new-top"> {{$item->categoriesName}}</span>
                                            
                                    </div>
                                    <div class="item-info-product ">
                                        <h4><a href="{{$item->slug}}">{{$item->name}}</a></h4>
                                        <div class="info-product-price">
                                            <span class="item_price">{{$item->price}}</span>
                                            <del>$89.71</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                            <form action="#" method="post">
                                                                <fieldset>
                                                                    <input type="hidden" name="cmd" value="_cart">
                                                                    <input type="hidden" name="add" value="1">
                                                                    <input type="hidden" name="business" value=" ">
                                                                    <input type="hidden" name="item_name" value="Running Shoes">
                                                                    <input type="hidden" name="amount" value="30.99">
                                                                    <input type="hidden" name="discount_amount" value="1.00">
                                                                    <input type="hidden" name="currency_code" value="USD">
                                                                    <input type="hidden" name="return" value=" ">
                                                                    <input type="hidden" name="cancel_return" value=" ">
                                                                    <input type="submit" name="submit" value="Add to cart" class="button">
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                                            
                                    </div>
                                </div>
                            </div>

                    @endforeach
                
                <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        
     
    </div>
</div>  
<!-- //mens -->


@endsection

@section('script')

   
  
  
 <script type="text/javascript">
      


 </script>
@endsection

