<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function create_sub_categoria(Request $request)
    {
            DB::table('sub_categoria')
                    ->insert([
                        'name' => $request->name,
                        'id_categoria' => $request->idCategia
                    ]);
            return response(['id' => $request->idCategia]);
    }

    public function listar(Request $request)
    {
        $data=DB::table('sub_categoria')->select('name', 'id')
                    ->where('id_categoria', '=', $request->idCategoria)
                    ->get();
        return response(['data' =>  $data]);
    }

    public function eliminar(Request $request)
    {
        
        $data=DB::table('sub_categoria')->select('id_categoria')
                        ->where('id', '=', $request->idSub)
                        ->get();
        $id;
        foreach ($data as  $item) 
        {
            $id=$item->id_categoria;
        }

        DB::table('sub_categoria')->delete($request->idSub);

        return response(['id' =>  $id]);

    }
}
