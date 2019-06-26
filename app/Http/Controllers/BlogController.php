<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str as Str; 
use Illuminate\Support\Facades\Auth;
use App\Blog;
use Redirect;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=DB::table('blogs')
            ->select('categoria_blogs.nombre as categoriablog','blogs.id','usuario_id','categoria_blog_id','titulo','url','fechaPublicacion','estado','contenido','contador')
            ->join('categoria_blogs','categoria_blogs.id','=','blogs.categoria_blog_id')
            ->get();

        return view('assets.admin.blogs.index')
            ->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $opcion=0;


        $categoria = DB::table('categoria_blogs')
            ->select('id', 'nombre','descripcion')
            ->get();

        $fechaA = Carbon::now('America/Lima');
        $date=$fechaA->format('Y-m-d');
        
        // dd($fechaSistema1);
        return view('assets.admin.blogs.create',['opcion'=>$opcion,'categoria'=>$categoria,'date'=>$date]);
        
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
         $opcion=1;


        $categoria = DB::table('categoria_blogs')
            ->select('*')
            ->get();
   
        $blog = Blog::find($id); //ya obtien la data del id del blog

        if (empty($blog)) {
          
            return redirect(route('blogs.index'));
        }

        // dd($blog);
        return view('assets.admin.blogs.edit',['blog'=>$blog,'categoria'=>$categoria,'opcion'=>$opcion]);
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
         $blog =Blog::find($id);

        if (empty($blog)) {
            

            return redirect(route('blogs.index'));
        }


        $blog->update($request->all());

     

        return redirect(route('blogs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
           $data=DB::table('blogs')
                    ->where('id', '=', $id)
                    ->get();
          foreach($data as $item)
          {
              
             if(file_exists(public_path($item->urlimagen)))
               {
                  unlink(public_path($item->urlimagen));
               }
               else
               {
                  
               }
               
          }
            DB::table('blogs')->where('id', '=', $id)->delete();

            return Redirect::back()->with('msg', 'The Message');
            
        
    }
    public function storeImagen(Request $request)
    {
        
        $file = $request->file('file');
        $path = 'public/blog/';


        $fileName = uniqid() . $file->getClientOriginalName();

        $file->move($path, $fileName);

        $id=DB::table('blogs')->max('id');

        $blog = Blog::find($id);

        $blog->urlimagen = 'public/blog'.'/'.$fileName;

        $blog->save();

     
    }   

     public function saveContenidoBlog(Request $request)
    {

        
        
        $user = Auth::user();
        $usuarioId=$user->id;

       
        $data = new Blog;
        $data->categoria_blog_id = $request->categoria_blog_id;
   
        $data->titulo = $request->titulo;
        $data->descripcioncorta= $request->descripcioncorta;
        $data->url = Str::slug($request['titulo']);
        $data->fechaPublicacion = $request->fechaPublicacion;
        $data->estado = '1';
        $data->contenido=$request->contenido;
        $data->autor=$request->autor;
        $data->contador= '';
        $data->usuario_id=$usuarioId;
        $data->urlimagen='1.jpg';
        $data->language='es';
        $data->save();
        
        $url=Str::slug($request['titulo']);
        
        $id=DB::table('blogs')->max('id');
        $tours = Blog::find($id);
        
        if($tours->url==$url)
        {
                $blog = Blog::find($id);

                $blog->url = $url.'-'.$id;
        
                $blog->save();

        }

    }

    public function saveCambioImagenBlog(Request $request)
    {
        $file = $request->file('file');
        $path = 'public/blog/';


        $fileName = uniqid() . $file->getClientOriginalName();

        $file->move($path, $fileName);

        $blog = Blog::find($request->id);

        $blog->urlimagen = '/public/blog'.'/'.$fileName;

        $blog->save();
    }
}
