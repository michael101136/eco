<?php

namespace App\Http\Controllers;

use App\language;
use App\Categorie;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCategorie;
use App\Http\Requests\UpdateCategory;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Auth;
use App\Helpers\languageUsers;
class CategorieController extends Controller
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

        $user = Auth::user();
        $idLanguage=$user->language_id;
        $privilege=$user->privilege;
        if($privilege=='normal')
        {
          $Categorie = DB::table('categories')
                      ->join('languages', 'languages.id', '=', 'categories.language_id')
                      ->select('categories.*', 'languages.name as idioma')
                      ->whereNull('categories.deleted_at')
                      ->where('languages.id',$idLanguage)
                      ->orderBy('categories.id')
                      ->paginate(6);
        }else{
         
         $Categorie = DB::table('categories')
                      ->join('languages', 'languages.id', '=', 'categories.language_id')
                      ->select('categories.*', 'languages.name as idioma')
                      ->whereNull('categories.deleted_at')
                      ->orderBy('categories.id')
                      ->paginate(6);
        }

        return view('assets.admin.categoria.index',['categorias' => $Categorie]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $languages = language::All();
        
        if(languageUsers::privilege()=='normal')
        {
          $languages = DB::table('languages')
                    ->where('id', languageUsers::idLanguage())
                    ->get();
        }
       
        return view('assets.admin.categoria.create',['languages'=>$languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategorie $request)
    {
           
         

           $slug = Str::slug($request['name']);
           $img = $request->file('img');
           $url = $img->getClientOriginalExtension();
           $categoria = new Categorie;
           $categoria->language_id =$request->language_id;
           $categoria->name = $request->name;
           $categoria->img = $url;
           $categoria->img_hd ='';
           $categoria->description =$request->description;
           $categoria->status = $request->status;
           $categoria->slug =str_replace(' ', '-', $slug);
           $categoria->save();

           $id=DB::table('categories')->max('id');
           $nombreImgen = $id.'.'.$img->getClientOriginalExtension();

           $destinationPath = public_path().'/public/admin/categoria';
           
           if (!file_exists($destinationPath)) {
              mkdir($destinationPath, 666, true);
             }
           $thumb_img = Image::make($img->getRealPath())->resize(600,300);
           $thumb_img->save($destinationPath.'/'.$nombreImgen,50);

           return redirect()->route('categories.index')->with('info' , 'Se registro correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        $languages = language::All();
        $category = Categorie::find($id);
        
        if(languageUsers::privilege()=='normal')
        {
          $languages = DB::table('languages')
                    ->where('id', languageUsers::idLanguage())
                    ->get();
        }

        return view('assets.admin.categoria.update',['category'=>$category,'languages'=>$languages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, $id)
    {
        $img = $request->file('img');
        $slug = Str::slug($request['slug']);

        if(empty($img))
        {
          $category = Categorie::find($id);
          $category->update([
              'name'        => $request->name,
              'description' => $request->description,
              'status'      => $request->status,
              'language_id' => $request->language_id,
              'slug'        => str_replace(' ', '-', $slug)
          ]);

          return redirect()->route('categories.index');

        }else{

          $img = $request->file('img');
          $url = $img->getClientOriginalExtension();

          $category = Categorie::find($id);
          $category->update([
              'name'        => $request->name,
              'description' => $request->description,
              'status'      => $request->status,
              'language_id' => $request->language_id,
              'img' 		=> $url,
              'slug'        => str_replace(' ', '-', $slug)
          ]);

          $itemCategoria = Categorie::where('id', '=',$id)->get()[0];
          $destinationPath = public_path().'/public/admin/categoria'.$id.'.'.$itemCategoria->img;

          if(file_exists(public_path($destinationPath)))
            {

			  unlink(public_path($destinationPath));

			}else{

			}

          $nombreImgen = $id.'.'.$img->getClientOriginalExtension();
		  $destinationPath = public_path().'/public/admin/categoria';

           if (!file_exists($destinationPath))
           {
              mkdir($destinationPathN, 666, true);
           }

           $thumb_img = Image::make($img->getRealPath())->resize(600,300);
           $thumb_img->save($destinationPath.'/'.$nombreImgen,20);

           return redirect()->route('categories.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemCategoria = Categorie::where('id', '=',$id)->get()[0];
        Categorie::destroy($id);

        $destinationPath = '../public/assets/content/categoria/'.$id.'.'.$itemCategoria->img;

        if(file_exists(public_path($destinationPath)))
        	{

		  	unlink(public_path($destinationPath));

			}else{

			}

        return redirect()->route('categories.index')
                        ->with('success','Member deleted successfully');


    }
}
