<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\languageUsers;
use App\Categorie;
use App\Tour;
use App\CategorieTour;
use App\Helpers\publicTours;
use DB;
use App\Itinerarie;
use App\Testimonial;
use Image;
use Session;
use App\Http\Requests\CreateViewTestimonial;
// use App\Helpers\languageUsers;
// use Illuminate\Support\Facades\Auth;
class PublicController extends Controller
{
   
    public function index($idioma)
    {
      
        if($idioma=='es' || $idioma=='en')
        {
            
            $categoria = DB::table('categories')
                            ->select('id','name')
                            ->get();
           $arrayTaskTour=[];

           foreach($categoria as $key => $value)
                {
                  
                   
                    $arrayTaskTour[]=[

                        'id' => $value->id,
                        'name' => $value->name,
                        'tour' => $toursPorCategoria=DB::table('tours')
                                  ->select('tours.id','tours.slug','tours.img','tours.name as nametour','tours.price','categories.name as namecategorie','sub_categoria.name as nameSub')
                                  ->join('categories_has_tours','categories_has_tours.tour_id','=','tours.id')
                                  ->join('sub_categoria','sub_categoria.id','=','categories_has_tours.sub_categorie_id')
                                  ->join('categories','categories.id','=','sub_categoria.id_categoria')
                                  ->join('languages','languages.id','=','categories.language_id')
                                  ->where('languages.abbr','=',$idioma)
                                  ->where('categories.id','=',$value->id)
                                  ->get()
                    ];

                  
                }

            return view("assets.pagina.".$idioma.".inicio",['toursPorCategoria' => $arrayTaskTour, 'categoria' => $categoria,]);
        }else
        {
              
              $idioma='es';
              return view("assets.pagina.".$idioma.".error_404");
        }
        
    }

    public function tours($idioma,$categoria)
    {
     
         
        

            $categorias = DB::table('languages')
                ->select('categories.name','categories.description','languages.abbr','categories.id')
                ->join('categories', 'languages.id', '=', 'categories.language_id')
                ->join('sub_categoria', 'sub_categoria.id_categoria', '=', 'categories.id')
                ->join('categories_has_tours','categories_has_tours.sub_categorie_id','=','sub_categoria.id')
                ->where('languages.abbr','=',$idioma)
                ->get();


                $categoriaa = DB::table('categories')
                          ->select('id','name')
                                  ->get();
                 $arrayTaskCategoria=[];

                 foreach($categoriaa as $key => $value)
                      {
                        
                         
                          $arrayTaskCategoria[]=[

                              'id' => $value->id,
                              'name' => $value->name,
                              'subProducto' => $toursPorCategoria=DB::table('sub_categoria')
                                        ->select('sub_categoria.name as nameSub')
                                        ->where('sub_categoria.id_categoria','=',$value->id)
                                        ->get()
                          ];

                        
                      }


            $todoTours=publicTours::searchTours($idioma,$categoria);
     

       return view("assets.pagina.".$idioma.".productos",['categoria' =>$arrayTaskCategoria,'tours' => $todoTours,'ItempCategoria' => $categoria]);

    }

  
  
    public function contact($idioma)
    {

    	return view("assets.pagina.".$idioma.".contact");
    }

   
    public function detalleproducto()
    {
        return view('assets.pagina.es.detalleProducto');

    }
   
   

}
