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
    // function __construct()
    // {
    //      $this->middleware(['auth' ,'roles:comprador ']);
    // }
    public function index($idioma)
    {
      
        if($idioma=='es' || $idioma=='en')
        {
            // Session()->flush();
       
            // $toursRecomendadosTren=publicTours::toursRecomendadosTren($idioma,'1');


            // $toursRecomendadosCarro=publicTours::toursRecomendadosCarro($idioma,'1');
            
            
            
            // $toursPrincipal=publicTours::toursPrincipal($idioma,'1');

             

            // $toursCan=publicTours::toursCan($idioma);

       
            // $toursUnaPersona=publicTours::toursUnaPersona($idioma,'3');
           
            // dd($toursUnaPersona);
    
            // $testimonio= DB::table('testimonials')
            //                 ->select('id','testimonial','photo','name','nationality','date')
            //                 ->where('language','=',$idioma)
            //                 ->where('status','=','1')
            //                 ->paginate(10);
            

            $toursPorCategoria=DB::table('tours')
                            ->select('tours.id','tours.slug','tours.name as nametour','tours.img','tours.price','categories.name as namecategorie')
                            ->join('categories_has_tours','categories_has_tours.tour_id','=','tours.id')
                            ->join('sub_categoria','sub_categoria.id','=','categories_has_tours.sub_categorie_id')
                            ->join('categories','categories.id','=','sub_categoria.id_categoria')
                            ->join('languages','languages.id','=','categories.language_id')
                            ->where('languages.abbr','=',$idioma)
                            ->paginate(8);

            // dd($toursPorCategoria);
            // return view("assets.pagina.".$idioma.".inicio",['tourPrincipal' => $toursPrincipal,'toursRecomendadosTren' => $toursRecomendadosTren,'toursRecomendadosCarro' => $toursRecomendadosCarro,'testimonio' => $testimonio,'toursPorCategoria' => $toursPorCategoria,'toursCan'=>$toursCan,'toursUnaPersona'=>$toursUnaPersona]);
            return view("assets.pagina.".$idioma.".inicio",['toursPorCategoria' => $toursPorCategoria]);
        }else
        {
              
              $idioma='es';
              return view("assets.pagina.".$idioma.".error_404");
        }
        
    }

    public function tours($idioma,$categoria,$precio='')
    {
         if($categoria=='cusco' ||  $categoria=='puno' ||  $categoria=='arequipa' ||  $categoria=='lima' ||  $categoria=='selva' ||  $categoria=='nazca'||  $categoria=='ica' ||  $categoria=='bolivia' ||  $categoria=='para_una_persona' )
         {
            
            
             $categorias = DB::table('languages')
                ->select('categories.name','categories.description','languages.abbr','categories.id')
                ->join('categories', 'languages.id', '=', 'categories.language_id')
                ->where('languages.abbr','=',$idioma)
                ->get();
                
             if($categoria=='para_una_persona')
             {
               
                 $todoTours=publicTours::searchToursCan($idioma,3); 
                 
                 $categoria="Para una persona";
             }else 
             {
                 $todoTours=publicTours::searchToursPais($idioma,$categoria); 
             }
            

           
          

            return view("assets.pagina.".$idioma.".tours",['categoria' =>$categorias,'tours' => $todoTours,'ItempCategoria' => $categoria]);


         }else
         {
            
             // $ItempCategoria = DB::table('categories')
             //    ->select('categories.name','categories.description')
             //    ->where('categories.name','=',$categoria)
             //    ->get()[0];

            $categorias = DB::table('languages')
                ->select('categories.name','categories.description','languages.abbr','categories.id')
                ->join('categories', 'languages.id', '=', 'categories.language_id')
                ->where('languages.abbr','=',$idioma)
                ->get();
       
            $todoTours=publicTours::searchTours($idioma,$categoria);
     

         }
        

       return view("assets.pagina.".$idioma.".tours",['categoria' =>$categorias,'tours' => $todoTours,'ItempCategoria' => $categoria]);

    }

    public function toursPrecioCiudad($idioma='',$precio='',$departamento='cusco')
    {
        
             if($precio=='')
             {
                $precio='0-1800'; 
             }
             
             $categoria='Busqueda por precio';
             $categorias = DB::table('languages')
                ->select('categories.name','categories.description','languages.abbr','categories.id')
                ->join('categories', 'languages.id', '=', 'categories.language_id')
                ->where('languages.abbr','=',$idioma)
                ->get();

            $todoTours=publicTours::searchToursPrecio($idioma,$precio,$departamento);
          

            return view("assets.pagina.".$idioma.".tours",['categoria' =>$categorias,'tours' => $todoTours,'ItempCategoria' => $categoria]);


    }

    public function tour($idioma,$tourSlug,$can=''){

    	
        // $toursRelacionados=publicTours::toursRelacionado($idioma);


      $tour = Tour::where('slug', '=',$tourSlug)->get()[0];


        $tour = Tour::where('slug', '=',$tourSlug)->get()[0];
        $tourCategoria = DB::table('tours')
			        ->select('categories.id')
			        ->join('categories_has_tours', 'tours.id', '=', 'categories_has_tours.tour_id')
			        ->join('categories', 'categories.id', '=', 'categories_has_tours.categorie_id')
			        ->where("tours.id","=",$tour->id)
			        ->get()[0];//traaes el ide relacionado con tours
        
        $toursRelacionados=publicTours::toursRelacionados($idioma,$tourCategoria->id);

    	$multimediaTour = DB::table('tours')
                    ->select('images.path')
                    ->join('multimedia', 'tours.multimedia_id', '=', 'multimedia.id')
                    ->leftjoin('images', 'multimedia.id', '=', 'images.multimedia_id')
                    ->where("tours.id","=",$tour->id)
                    ->get();

        $itinerarioTour = DB::table('tours')
                    ->select('itineraries.name','itineraries.description','itineraries.day','itineraries.photo')
                    ->join('itineraries', 'tours.id', '=', 'itineraries.tour_id')
                    ->where("tours.id","=",$tour->id)
                    ->get();

               

       return view("assets.pagina.".$idioma.".tour",['tour' => $tour,'multimediaTour' => $multimediaTour,'itinerarioTour' => $itinerarioTour, 'toursRelacionados'=>$toursRelacionados,'can'=>$can]); 



    }
     public function tourDetalle($abbr='es',$slug)
   {
     
    
     $tour = Tour::where('slug', '=', $slug)->get()[0];
     $tourCategoria = DB::table('tours')
                    ->select('categories.id')
                    ->join('categories_has_tours', 'tours.id', '=', 'categories_has_tours.tour_id')
                    ->join('categories', 'categories.id', '=', 'categories_has_tours.categorie_id')
                    ->where("tours.id","=",$tour->id)
                    ->get()[0];//traaes el ide relacionado con tours
    
     return   $tourCategoria;
                   
    //  $multimediaTour = DB::table('tours')
    //                 ->select('images.path')
    //                 ->join('multimedia', 'tours.multimedia_id', '=', 'multimedia.id')
    //                 ->leftjoin('images', 'multimedia.id', '=', 'images.multimedia_id')
    //                 ->where("tours.id","=",$tour->id)
    //                 ->get();
    //  $itinerarioTour = DB::table('tours')
    //                 ->select('itineraries.name','itineraries.description','itineraries.day')
    //                 ->join('itineraries', 'tours.id', '=', 'itineraries.tour_id')
    //                 ->where("tours.id","=",$tour->id)
    //                 ->get();
    // $seriesTour     = DB::table('series')
    //                 ->select('series.cant_person','series.date_start','series.date_end','series.status')
    //                 /*->join('series', 'tours.id', '=', 'series.tour_id')*/
    //                 ->where("series.tour_id","=",$tour->id)
    //                 ->get(); 
    // $pricesTour     = DB::table('prices')
    //                 ->select('prices.range_first','prices.range_end','prices.monto')
    //                 /*->join('prices', 'tours.id', '=', 'prices.tour_id')*/
    //                 ->where("prices.tour_id","=",$tour->id)
    //                 ->get();                               
   
    // $toursPrincipal=publicTours::tours($abbr,'1');//Retorne de  tours  en español y principal(1 y 0)
    // $toursRelacionados=publicTours::toursRelacionados($abbr,$tourCategoria->id);//Retorne de  tours  relacionados
    // $lenguajeFaltantes=languageUsers::lenguajeFaltantes($abbr);
    //  return view('public.'.$abbr.'.tour',['tour' => $tour,'multimediaTour' => $multimediaTour,'toursPrincipal' => $toursPrincipal,'itinerarioTour' => $itinerarioTour,'toursRelacionados' => $toursRelacionados,'seriesTour'=>$seriesTour,'pricesTour'=>$pricesTour,'abbr'=>$abbr,'lenguajeFaltantes' => $lenguajeFaltantes]);
   }
    public function about($idioma)
    {
        
    	 return view("assets.pagina.".$idioma.".about_us");
    }
    
     public function blog($idioma)
    {
        
    	 return view("assets.pagina.".$idioma.".blog");
    }

    public function contact($idioma)
    {

    	return view("assets.pagina.".$idioma.".contact");

    }

    public function testimony($idioma)
    {
        $testimonio= DB::table('testimonials')
        ->select('id','testimonial','photo','name','nationality','date')
        ->where('language','=',$idioma)
        ->where('status','=','1')
        ->paginate(6);
            
            
        return view("assets.pagina.".$idioma.".testimony",['testimonio'=>$testimonio ]);
    }

     public function toursOpcionPrecio()
   {
        if(request()->ajax())
            {
               
                $max=$_POST['max'];
                $min=$_POST['min'];
                $idioma=$_POST['idioma'];
                $data = DB::table('categories')
                                  ->select('categories.name as categoriaName','tours.name','tours.slug','tours.description_short','tours.price','tours.img','tours.id')
                                  ->join('languages', 'languages.id', '=', 'categories.language_id')
                                  ->join('categories_has_tours as cat_t', 'cat_t.categorie_id', '=', 'categories.id')
                                  ->join('tours', 'cat_t.tour_id', '=', 'tours.id')
                                  ->where('languages.abbr','=',$idioma)
                                  ->whereBetween('tours.price',[$min,$max])->get();
                              
                                 
                
                        
            }
                
            
                return response(['data' => $data]);
                
                
    }

    
    
    public function toursOpcion()
    {
        
      if(request()->ajax())
            {
                
                $abbr=$_POST['abbr'];
                if($_POST['cantidaPeticion']<1)
                {
                    $categories = DB::table('categories')
                                  ->select('categories.name as categoriaName','tours.id','tours.name','tours.slug','tours.description_short','tours.price','tours.img')
                                  ->join('languages', 'languages.id', '=', 'categories.language_id')
                                  ->join('categories_has_tours as cat_t', 'cat_t.categorie_id', '=', 'categories.id')
                                  ->join('tours', 'cat_t.tour_id', '=', 'tours.id')
                                  ->where('languages.abbr',$abbr)->get();
                    return response(['data' => $categories,'can' => $_POST['cantidaPeticion']]);
                }
                $categorie=$_POST['catagoria'];
            
                
                $categories = DB::table('categories')
                                  ->select('categories.name as categoriaName','tours.name','tours.id','tours.slug','tours.description_short','tours.price','tours.img')
                                  ->join('languages', 'languages.id', '=', 'categories.language_id')
                                  ->join('categories_has_tours as cat_t', 'cat_t.categorie_id', '=', 'categories.id')
                                  ->join('tours', 'cat_t.tour_id', '=', 'tours.id')
                                  ->whereIn('categories.id', $categorie)
                                  ->where('languages.abbr',$abbr)->get();
                                  return response(['data' => $categories,'can' => $_POST['cantidaPeticion']]);
                
                
            }
    
    }
    
     public function ingresarTestimonio(CreateViewTestimonial $request)
    {

        
      
       
        // $date = Carbon::now('America/Lima');
        // $fechaSistema=$date->format('Y-m-d');


        $img = $request->file('img');
        $url = $img->getClientOriginalExtension();
        
        

        $Testimonial= new Testimonial;
        $Testimonial->name = $request->name;
        $Testimonial->email = $request->email;
        // $Testimonial->date=Carbon::parse($fechaSistema);
        $Testimonial->photo = $url;
        $Testimonial->nationality = $request->nationality;
        $Testimonial->testimonial = $request->message;
        $Testimonial->status='0';
        $Testimonial->language = $request->language;
        $Testimonial->save();


        $id=DB::table('testimonials')->max('id');
           $nombreImgen = $id.'.'.$img->getClientOriginalExtension();

           $destinationPath = 'admin/testimonio';
        
        //   if (!file_exists($destinationPath)) {
        //       mkdir($destinationPath, 666, true);
        //      }
           $img->move($destinationPath, $nombreImgen);
        //   $thumb_img = Image::make($img->getRealPath())->resize(600,300);
        //   $thumb_img->save($destinationPath.'/'.$nombreImgen,50);


        return redirect()->back();

    }
    
     public function terminos_condiciones($idioma)
    {

    	return view("assets.pagina.".$idioma.".condiciones");

    }
    
    public function buscarTours()
    {
       
        
        if(request()->ajax())
            {
               $contar=strlen($_POST['buscarTours']);
               if($contar>4)
               {

                // $data = Tour::select('tours.name','tours.slug','tours.price','tours.img','tours.id')
                //     ->join('categories_has_tours', 'tours.id', '=', 'categories_has_tours.tour_id')
                //     ->join('categories', 'categories.id', '=', 'categories_has_tours.categorie_id')
                //     ->join('languages', 'languages.id', '=', 'categories.language_id')
                //     ->where('tours.name', 'like', '%' . $_POST['buscarTours'] . '%')
                //     ->where('languages.abbr','=',$_POST['idioma'])
                //     ->where('categories.name','=',$_POST['categoria'])
                  
                //     ->get();
                
                 $data = DB::table('categories')
                                  ->select('categories.name as categoriaName','tours.name','tours.slug','tours.price','tours.img','tours.id')
                                  ->join('languages', 'languages.id', '=', 'categories.language_id')
                                  ->join('categories_has_tours as cat_t', 'cat_t.categorie_id', '=', 'categories.id')
                                  ->join('tours', 'cat_t.tour_id', '=', 'tours.id')
                                  ->Where('tours.name', 'like', '%' . $_POST['buscarTours'] . '%')
                                  ->where('languages.abbr','=',$_POST['idioma'])
                                  ->where('categories.name','=',$_POST['categoria'])
                               
                                  ->get();

                  return response(['data' =>$data]); 
                  
               }
                        
            }
                
            
             
    }
   
   

}
