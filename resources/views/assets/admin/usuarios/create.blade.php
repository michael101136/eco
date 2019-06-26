@extends('assets.admin.layout.from')
@section('contenido')
	    <section class="content-header">
      <h1>
        
      </h1>
      
    </section>

    <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Crear</h3>
          <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>

        </div>
        
        <div class="box-body">
          
          <div class="col-md-2">
                
          </div>

          <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Usuario</h3>
                    </div>
                   {!! Form::open(['route' => ['users.store'] , 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                        <div class="box-body">
                            <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" placeholder="nombre completo">
                              <p style="color:red;">{{ $errors->first('name') }}</p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}" placeholder="Email">
                              <p style="color:red;">{{ $errors->first('email') }}</p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="password" name="password" value="{{ old('password')}}" placeholder="Password">
                              <p style="color:red;">{{ $errors->first('password') }}</p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Privilegio</label>
                                <div class="col-sm-10">
                                      <select name="privilegio" id="privilegio">
                                          <option value="admin">Administrador</option>
                                          <option value="normal">Normal</option>
                                    </select>
                                </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Usuario</label>
                                <div class="col-sm-10">
                                    <select id="usuarioIdioma" name="usuarioIdioma"> 
                                        @foreach($languages as $item)
                                          <option value="{{$item->id}}"> {{ $item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                          </div>
                        
                        </div>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-info pull-right">Crear</button>
                        </div>
                  {!! Form::close() !!}
                 </div>
            </div>
            
             <div class="col-md-2">
                
             </div>

        </div>
        <div class="box-footer">
          Usuarios
        </div>
      </div>

    </section>

@endsection