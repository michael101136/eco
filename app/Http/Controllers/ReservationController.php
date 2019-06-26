<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Http\Requests\CreateViewReservation;
use Session;
use App\Helpers\languageUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\reservaEmail;
use App\Tour;
use App\Cart;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    //   function __construct()
    // {
    //      $this->middleware(['auth' ,'roles:normal,admin']);
    // }
    
    
    public function index()
    {
       $dato=languageUsers::languageTestimonioEncuesta();
        
       $data= Reservation::where('lenguaje', '=', $dato->abbr)
                             ->orderBy('id', 'asc')
                            ->paginate(1000);
        return view('assets.admin.reserva.index',['data' => $data]);
        
       
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateViewReservation $request)
    {
        
        $data=Tour::find($request->idtour);
        $nameTours=$data->name;
       
        
        $reservation = new Reservation;
        $reservation->name =$request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->fecha =$request->date;
        $reservation->country =$request->country;
        $reservation->lenguaje =$request->lenguaje;
        $reservation->number_adults =$request->cantidadAdultos;
        $reservation->number_children =$request->cantidadNinios;
        $reservation->message =$request->message;
        $reservation->tour_id =$request->idtour;
        $reservation->status ='pendiente';
        $reservation->save();
        
        Mail::to('sistemasmapigolden@gmail.com')->send(new reservaEmail($request,$nameTours));
        Mail::to('reservas@machupicchugolden.com')->send(new reservaEmail($request,$nameTours));//

        // Reservar 
            
            $can='';
            $producto =Tour::find($request->idtour);
        	$oldCart = Session:: has('cart') ? Session::get('cart') : null;
            
        	$cart = new Cart($oldCart);
                  
    
        	$cart->add($producto,$producto->id,$can);
    
        	$request->session()->put('cart', $cart);
        	session()->flash('estado', 'agregar');
        	
        //fin reservar 
        

        Session::flash('flash_message', '¡ Muchas gracias! Su reserva ha sido registrada.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function cambioEstado($id)
    {
        $data=Reservation::where('id',$id)->get()[0];
   
        if( $data->status=='pendiente')
        {
            $data=Reservation::where('id',$id)->update(['status'=>'aprobado']);
       
        }else{
            $data=Reservation::where('id',$id)->update(['status'=>'pendiente']);
       
        }
        return redirect()->back();

    }
}
