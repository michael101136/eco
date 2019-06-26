@extends('assets.admin.layout.from')

@section('style')

<link rel="stylesheet" href="{{ URL::asset('public/assets/dist/css/bootstrap3-wysihtml5.css')}}">
<link rel="stylesheet" href="{{ URL::asset('public/assets/dist/css/dropzone/dropzone.css')}}">

@endsection

@section('contenido')
	    <section class="content-header">
      <h1>
        
      </h1>
      
    </section>

    <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Testimonio</h3>
          <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>

        </div>
        
        <div class="box-body">
          
          <div class="col-md-11">
                <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Crear</h3>
                    </div>
                    {!! Form::open(['route' => ['testimonio.store'] , 'method' => 'POST', 'class' => 'form-horizontal','enctype' => 'multipart/form-data']) !!}

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
                               
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                {!!Form::text('email',null,['class'=>'form-control','required'])!!}
                     
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nacionalidad</label>

                                <div class="col-sm-10">
                                {!!Form::text('nationality',null,['class'=>'form-control','required'])!!}
                              
                                </div>
                            </div>

                       

                            <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Testimonio</label>

                                    <div class="col-sm-10">
                                    {!!Form::textarea('testimonial',null,['class'=>'form-control','required'])!!}
                                    </div>
                                    <input type="hidden" name="language" id="language" value='es'>
                            </div>

                            <!-- <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Estado</label>

                                    <div class="col-sm-5">
                                    {!!Form::select('status', ['A' => 'habilitado', 'D' => 'deshabilitado'], 'A',['class'=>'form-control'])!!}
                                    </div>
                            </div> -->

                            </div>
                            <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Crear</button>
                            </div>
                    {!! Form::close() !!}

                 </div>
            
                        
                </div>
            
            

        </div>
        <div class="box-footer">
          Testimonios
        </div>
      </div>

    </section>

@endsection

