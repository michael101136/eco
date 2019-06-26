<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str as Str;
use DB;
use App\Helpers\languageUsers;


class TestimonioController extends Controller
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
         
        $dato=languageUsers::languageTestimonioEncuesta();
        $data=Testimonial::where('language','=',$dato->abbr)->paginate(8);
        return view('assets.admin.testimonios.index',['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assets.admin.testimonios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

  
        
        $date = Carbon::now('America/Lima');
        $fechaSistema=$date->format('Y-m-d');


        $img = $request->file('img');
        $url = $img->getClientOriginalExtension();

        

        $Testimonial= new Testimonial;
        $Testimonial->name = $request->name;
        $Testimonial->email = $request->email;
        $Testimonial->date=Carbon::parse($fechaSistema);
        $Testimonial->photo = $url;
        $Testimonial->nationality = $request->nationality;
        $Testimonial->testimonial = $request->testimonial;
        $Testimonial->status='0';
        $Testimonial->language = $request->language;
        $Testimonial->save();


        $id=DB::table('testimonials')->max('id');
           $nombreImgen = $id.'.'.$img->getClientOriginalExtension();

           $destinationPath ='admin/testimonio';
          
        //   if (!file_exists($destinationPath)) {
        //       mkdir($destinationPath, 666, true);
        //      }
    
           $img->move($destinationPath, $nombreImgen);
           
        //   $thumb_img = Image::make($img->getRealPath())->resize(600,300);
        //   $thumb_img->save($destinationPath.'/'.$nombreImgen,50);


        return redirect()->route('testimonio.index');
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
        $data=Testimonial::where('id',$id)->get()[0];
   
        if( $data->status==0)
        {
            $data=Testimonial::where('id',$id)->update(['status'=>'1']);
       
        }else{
            $data=Testimonial::where('id',$id)->update(['status'=>'0']);
       
        }
        return redirect()->route('testimonio.index');

    }

   

}
