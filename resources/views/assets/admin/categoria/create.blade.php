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
          
          <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Categorias</h3>
                    </div>
                   {!! Form::open(['route' => ['categories.store'] , 'method' => 'POST', 'class' => 'form-horizontal','enctype' => 'multipart/form-data']) !!}

                        <div class="box-body">
                            <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Subir Imagen</label>
                            <div class="col-sm-5">
                               <input type="file" class="form-control" name="img" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>

                            <div class="col-sm-10">
                               {!!Form::text('name',null,['class'=>'form-control','required'])!!}
                               <p style="color:red;">{{ $errors->first('name') }}</p>
                            </div>
                          </div>

                          <div class="form-group">

                                <label for="inputPassword3" class="col-sm-2 control-label">Idioma</label>
                                <div class="col-sm-5">
                                      <select name="language_id" id="language" class="form-control">
                                            @foreach($languages as $language)
                                            <option value="{{$language->id}}">{{$language->name}}</option>
                                            @endforeach
                                      </select>
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>

                                <div class="col-sm-10">
                                   {!!Form::textarea('description',null,['class'=>'form-control','required'])!!}
                                </div>
                          </div>

                          <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Estado</label>

                                <div class="col-sm-5">
                                  {!!Form::select('status', ['A' => 'habilitado', 'D' => 'deshabilitado'], 'A',['class'=>'form-control'])!!}
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
          Categoria
        </div>
      </div>

    </section>

@endsection