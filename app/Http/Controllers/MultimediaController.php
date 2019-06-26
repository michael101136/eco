<?php

namespace App\Http\Controllers;

use App\Multimedia;
use App\Image;
use App\Video;
use Illuminate\Http\Request;

class MultimediaController extends Controller
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
        $multimedias = Multimedia::paginate(7);
        return view('assets.admin.multimedia.index',['multimedias'=>$multimedias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('assets.admin.multimedia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $multimedia =  Multimedia::create($request->all());

       return response()->json(['id' => $multimedia->id]);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Multimedia  $multimedia
     * @return \Illuminate\Http\Response
     */
    public function show(Multimedia $multimedia)
    {
        return view('admin.multimedia.update',['multimedia'=>$multimedia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Multimedia  $multimedia
     * @return \Illuminate\Http\Response
     */
    public function edit(Multimedia $multimedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Multimedia  $multimedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multimedia $multimedia)
    {

        $multimedia->fill($request->all());
        $multimedia->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Multimedia  $multimedia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $data = Image::where('multimedia_id',$id)->get();
        foreach( $data as $itemp )
        {
            if(file_exists('admin/uploads/'.$itemp->name))
               {
                  unlink('admin/uploads/'.$itemp->name);
               }
               else
               {
                  
                }
            $Image=Image::where('id', '=', $itemp->id)->first();
            $Image->delete();

          
        }

        $multimedia=Multimedia::where('id', '=', $id)->first();
        $multimedia->delete();
      
        return redirect()->route('multimedia.index')->with('info' , 'Se registro correctamente');

    }

    // public function create_img(Request $request){

    //   // $file =  $request->file('images');
    //   // $extension = $file->getClientOriginalExtension();
    //   // $NameOriginal = $file->getClientOriginalName();
    //   // $fileName = $NameOriginal . time() . '.' . $extension;
    //   // $size = $file->getClientSize();
    //   // $file->move(public_path('assets/content/'),$fileName);
    //   // $ruta = 'assets/content/'.$fileName;

    //   // Image::create([
    //   //   'multimedia_id'=>$id,
    //   //   'name'=>$fileName,
    //   //   'path'=>$ruta,
    //   //   'size'=>$size
    //   // ]);


    //    $path = public_path().'/uploads/';
    //     $files = $request->file('file');
    //     foreach($files as $file)
    //     {
    //         $fileName = $file->getClientOriginalName();
    //         $size = $file->getClientSize();
    //         $ruta = 'uploads/'.$fileName;
    //         $file->move($path, $fileName);

    //         Image::create([
    //             'multimedia_id'=>$idMultimedia->id,
    //             'name'=>$fileName,
    //             'path'=>$ruta,
    //             'size'=>$size
    //           ]);

    //     }

    // }

    // public function view_img($id){
    //   $images = Image::where('multimedia_id',$id)->get();
    //   return response($images);
    // }

    // public function delete_img($id){

    //   $video= Image::find($id);
    //   \File::delete(public_path($video->path));

    //   $video->delete();
    // }



    // public function view_video($id){

    //   $videos = Video::where('multimedia_id',$id)->get();
    //   return response($videos);
    // }


    // public function create_video(Request $request, $id){

    //   Video::create($request->all());
    // }


    // public function see_video($id){
    //   $video = Video::find($id);
    //   return response($video);
    // }

    // public function update_video(Request $request, $id){
    //     $video = Video::find($id);
    //     $video->fill([
    //       'name'=>$request->name,
    //       'description'=>$request->description,
    //       'path'=>$request->path
    //     ]);

    //     $video->save();
    // }
    // public function delete_video($id){
    //   $video = Video::find($id);
    //   $video->delete();
    // }


}
