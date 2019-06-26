<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
class ImageController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
          

             $path = 'admin/uploads/';
             $files = $request->file('file');
             foreach($files as $file)
             {
                $fileName = time().'.'.$file->getClientOriginalName();
                $size = $file->getClientSize();
                $ruta = 'admin/uploads/'.$fileName;
                $file->move($path, $fileName);

                Image::create([
                    'multimedia_id'=> $request->idMultimedia,
                    'name'=>$fileName,
                    'path'=>$ruta,
                    'size'=>$size
                  ]);
             }

           
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

    public function listarImagenes($id)
    {
       
            $data = Image::where('multimedia_id',$id)->get();
            
             return response()->json(['data'=>$data]);

    }

    public function delete_img($id)
    {
            

            $Image=Image::where('id', '=', $id)->first();
            
        
             if(file_exists(public_path($Image->path)))
               {
                  unlink(public_path($Image->path));
               }
               else
               {
                  
               }

            $Image->delete();
            return response()->json(['data' => "Correcto"]);

    }




}
