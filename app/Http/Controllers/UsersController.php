<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Language;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
class UsersController extends Controller
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
        $users = User::orderBy('id', 'desc')->simplePaginate(1000);
      
        return view('assets.admin.usuarios.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::All();
        

        return view('assets.admin.usuarios.create',['languages' => $languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $request)
    {
        
        User::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'language_id'=>$request->usuarioIdioma,
          'privilege'=>$request->privilegio,
          'password'=>bcrypt( $request->input('password') ),
        ]);

        return redirect('users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
        $languages = language::All();
        return view('assets.admin.usuarios.update',['user' => $user,'languages' => $languages]);
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
        if(is_null($request->password))
        {
            
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->language_id=$request->usuarioIdioma;
            $user->privilege=$request->privilegio;
            $user->save();
        
        }else 
        {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->language_id=$request->usuarioIdioma;
            $user->privilege=$request->privilegio;
            $user->password = bcrypt( $request->input('password') );
            $user->save();

        }

           return redirect('users');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back();
    }
}
