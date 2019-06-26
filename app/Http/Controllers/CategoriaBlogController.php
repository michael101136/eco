<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoria_blogs;
use Flash;
use Response;
use DB;
class CategoriaBlogController extends Controller
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
        $categoriaBlogs =categoria_blogs::all();
        
        return view('assets.admin.categoria_blogs.index')
            ->with('categoriaBlogs', $categoriaBlogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('assets.admin.categoria_blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = $request->all();

        $categoriaBlog = categoria_blogs::create($input);

        return redirect(route('categoria_controller.index'));
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
        $categoriaBlog = categoria_blogs::find($id);

        if (empty($categoriaBlog)) {
          
            return redirect(route('categoria_controller.index'));
        }

       DB::table('categoria_blogs')->where('id', '=',$id)->delete();


        

        return redirect(route('categoria_controller.index'));
    }
}
