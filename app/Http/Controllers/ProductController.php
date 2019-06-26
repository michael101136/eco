<?php

namespace App\Http\Controllers;
use App\Tour;
use App\Cart;
use Illuminate\Http\Request;
use Session;
use App\Helpers\function1;
use Cookie;
use Response;
use App\Mail\EmailCompra;
use Mail;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    
    public function getAddToCart(Request $request, $id,$can='')
    {

    
    	$producto =Tour::find($id);
    	$oldCart = Session:: has('cart') ? Session::get('cart') : null;
        
    	$cart = new Cart($oldCart);
              

    	$cart->add($producto,$producto->id,$can);

    	$request->session()->put('cart', $cart);
    	session()->flash('estado', 'agregar');
    	return redirect()->back()->with('error', 'Something went wrong.');

    }

    public function getReduceByOne($id)
    {
        
        $oldCart = Session:: has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->reduceByOne($id);
    	
    	Session::put('cart', $cart);
    	return redirect()->back()->with('error', 'Something went wrong.');
        
    }
    
    public function getRemoveItem($id)
    {
        
        $oldCart = Session:: has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->removeItem($id);
    	
    	Session::put('cart', $cart);
    	return redirect()->back()->with('error', 'Something went wrong.');
        
    }
    
    public function getCart($idioma)
    {
    	
    	if(!Session:: has('cart')){

    		    return view("assets.pagina.".$idioma.".shopping",['products' => null]);
    	}

    	$oldCart =Session::get('cart');
    	$cart = new Cart($oldCart);
        
        // if(Auth::guest())
        // {
        //   $costoReduc=0;
          
        // }else
        // {
        //     if(auth()->user()->pais=='PE' || auth()->user()->pais=='BO' || auth()->user()->pais=='CO' || auth()->user()->pais=='EC' )
        //     {
        //          $costoReduc=20;
        //     }
           
        // }
        // dd($costoReduc);
    	return view("assets.pagina.".$idioma.".shopping",['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }

    public function getCheckout()
    {
    	
        $key = function1::securitykey('prd', 'sistemasmapigolden@gmail.com' ,'E-0rF!pH');

        $contador =function1::contador();
        
        Cookie::queue('key', $key);
        Cookie::queue('contador', $contador);
        
    
      
    	$idioma="es";

    	if(!Session::has('cart'))
    	{
    		return redirect()->back()->with('error', 'Something went wrong.');
    	}
    	
    	$email=auth()->user()->email;
        
    	$oldCart =Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
    	Cookie::queue('total',$total);
    	Cookie::queue('cantidaTours',$cart->totalQty);
        $sessionToken =function1::create_token('prd',$cart->totalPrice,$key,$contador,$email);

    	return view("assets.pagina.".$idioma.".checkout",['total' => $total,'sessionToken'=>$sessionToken,'key'=>$key,'contador'=>$contador,'merchantId'=>'dev']);
    	

    }

    public function postCheckout(Request $request)
    {
    		dd($request->all());
    }
    
    public function transactionToken(Request $request)
    {
        
       
        $transactionToken =$request->transactionToken;
    	$entorno ='prd';
    
    	$purchaseNumber = $request->cookie('contador');
    	$amount = $request->cookie('total');
        $key=$request->cookie('key');
        $cantidaTours=$request->cookie('cantidaTours');
            
    	$respuesta = function1::authorization($entorno,$key,$amount,$transactionToken,$purchaseNumber);
    	
    	
    	Session::flash('pago', 'El pago se ha completado correctamente '); 
    	
        $json = json_decode($respuesta, true);
        
        // dd($json);
        if(isset($json['errorCode']))
        {
            $monto= $json['data']['AMOUNT']; 
        		$card= $json['data']['CARD'];
        		$estado= $json['data']['ACTION_DESCRIPTION']; 
        
        		
                $request->session()->forget('cart');
            	
            	return view("assets.pagina.cancelado",['monto'=>$monto,'card'=>$card,'estado'=>$estado,'numero'=>$purchaseNumber,'cantidaTours'=>$cantidaTours]);
        }
        else
        {
                $oldCart =Session::get('cart');
    	        $cart = new Cart($oldCart);
            
            	$monto= $json['dataMap']['AMOUNT']; 
        		$card= $json['dataMap']['CARD'];
        		$estado= $json['dataMap']['ACTION_DESCRIPTION']; 
        		$numeroTrans= $json['order']['purchaseNumber'];
        	   
        	   
        	   //  PARA ENVIAR UN CORREO DE DETALLE DE COMPRA
        	    $email=auth()->user()->email;
                $nombreCompleto=auth()->user()->name.' '.auth()->user()->apellido; 
    
                Mail::to('reservas@machupicchugolden.com')->send(new EmailCompra($cart->items,$cart->totalPrice,$nombreCompleto,$card,$numeroTrans));
                Mail::to('sistemasmapigolden@gmail.com')->send(new EmailCompra($cart->items,$cart->totalPrice,$nombreCompleto,$card,$numeroTrans));
                Mail::to($email)->send(new EmailCompra($cart->items,$cart->totalPrice, $nombreCompleto,$card,$numeroTrans));
        		
        		//END
        		
                $request->session()->forget('cart');
            	
            	//return view("assets.pagina.detalle",['monto'=>	$monto,'card'=>$card,'estado'=>$estado,'numeroTrans'=>$numeroTrans,'numero'=>	$purchaseNumber,'cantidaTours'=>$cantidaTours]);
                return view("assets.pagina.detalle",['monto'=>	$monto,'card'=>$card,'estado'=>$estado,'numeroTrans'=>$numeroTrans,'numero'=>	$purchaseNumber,'cantidaTours'=>$cantidaTours,'products' => $cart->items]);

                // return redirect()->route('paquetesCategoriaES', ['idioma'=> 'es','categoria'=>'aventura']); 
        }
        
        
        
    }
}
