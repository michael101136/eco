<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mail\EmailCompra;
use Mail;
use App\Cart;
use Session;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/tours');
    }
    public function envio()
    {
            $oldCart =Session::get('cart');
    	   
    	    $cart = new Cart($oldCart);

            // dd($cart);
            
            $email=auth()->user()->email;
            $nombreCompleto=auth()->user()->name.' '.auth()->user()->apellido; 

            Mail::to('sistemasmapigolden@gmail.com')->send(new EmailCompra($cart->items,$cart->totalPrice, $nombreCompleto));
            
            Mail::to($email)->send(new EmailCompra($cart->items,$cart->totalPrice, $nombreCompleto));
            
    
    }   
}
