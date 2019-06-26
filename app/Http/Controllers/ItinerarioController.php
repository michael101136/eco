<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Itinerarie;

class ItinerarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
      function __construct()
    {
         $this->middleware(['auth' ,'roles:normal,admin']);
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    

        return view("assets.admin.itinerario.create");

    }

    public function createItinerario($id)
    {

        return view("assets.admin.itinerario.create",['id' => $id]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $idTour=$id;
         return view("assets.admin.itinerario.update",['id' =>  $idTour]);
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

    public function insertarItinerario(Request $request)
    {
           

           $idMax=DB::table('itineraries')->max('id');


           DB::table('itineraries')
                ->where('id', $idMax)
                ->update([
                        'name'          => $request->name, 
                        'description'   => $request->editor1, 
                        'department'    => $request->departamento,
                        'province'     => $request->provincia,  
                        'district'      => $request->distrito, 
                        'altitud'       => $request->altitud, 
                        'latitud'       => $request->longitud, 
                         ]);

          return redirect()->route('Itinerario.show',['id' => $request->idTours]);
    }

    public function listarItinerarios($id)
    {

        $itineraio = DB::table('itineraries')
                        ->where('tour_id','=',$id)->get();

        return response()->json(['itineraio'=> $itineraio]);
    }

    public function delete_itinerario($id)
    {

              $Image=Itinerarie::where('id', '=', $id)->first();
        
        
             if(file_exists(public_path($Image->photo)))
               {
                  unlink(public_path($Image->photo));
               }
               else
               {
                  
               }

            $Image->delete();
            
            return response()->json(['data' => "Correcto"]);
   
    }

    public function cargarImagenItinerario (Request $request)
    {

           $contador=Itinerarie::where('tour_id', '=',$request->idToursItinerario)->get();


           $data=Itinerarie::where('tour_id', '=',$request->idToursItinerario)->get()->last();
            
           if(count($contador)==0)
           {
             $dayMax=1;
           }else
           {
                $dayMax=(int)$data->day + 1;
           }
           
      
           
             $path = 'admin/uploads/itinerario/';
             $files = $request->file('file');
             foreach($files as $file)
             {
                $fileName = time().'.'.$file->getClientOriginalName();
                $size = $file->getClientSize();
                $ruta = 'admin/uploads/itinerario/'.$fileName;
                $file->move($path, $fileName);

                
                DB::table('itineraries')->insert(
                       [
                            'tour_id'     => $request->idToursItinerario, 
                            'photo'       => $ruta, 
                            'day'         => $dayMax,
                        ]
                    );

                                                                               
             }

    }

    public function showItinerario($id)
    {

          $data=Itinerarie::where('id', '=', $id)->first();

         
           return response()->json(['data' => $data]);


    }

    public function updateItinerario(Request $request)
    {

        $category = Itinerarie::find($request->idItinerario);
        $category->update([
              'name'        => $request->Editarname,
              'description' => $request->Editardescripcion, 
              'department'  => $request->Editardepartamento,
              'province' => $request->Editarprovincia,
              'district' => $request->Editardistrito,
              'altitud'  => $request->Editaraltitud,
              'latitud'  => $request->Editarlongitud
          ]);
          return redirect('Itinerario/'.$request->idItinerarioTour);
    }

    public function UpdateImagenItinerario(Request $request)
    {
        $data = Itinerarie::where('id',$request->idItinerarioImagen)->get();
        foreach( $data as $itemp )
        {
            if(file_exists($itemp->photo))
               {
                  unlink($itemp->photo);
               }
               else
               {
                  
                }
           
          
        }

        $path = 'admin/uploads/itinerario/';
             $files = $request->file('file');
            
                $fileName = time().'.'.$files->getClientOriginalName();
                $size = $files->getClientSize();
                $ruta = 'admin/uploads/itinerario/'.$fileName;
                $files->move($path, $fileName);
                                                                               
             
        $dataupdate = Itinerarie::find($request->idItinerarioImagen);
        $dataupdate->update(
            [
              'photo'        => $ruta,
       
            ]);

      
    }


}
