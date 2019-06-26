@extends('assets.admin.layout.from')
@section('style')

<link rel="stylesheet" href="{{ URL::asset('/assets/dist/css/dropzone/dropzone.css')}}">

@endsection
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
                    
                       <div class="col-md-12" id="panelImagenes">   
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    SUBIR IMAGENES
                                </div>
                                <div class="panel-body">
                                    {!! Form::open(['route'=> ['CargarImagenItinerario'], 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}

                                            <div class="dz-message" style="height:100px;">
                                                Drop your files here
                                            </div>
                                             <input type="hidden" class="form-control" id="idToursItinerario" name="idToursItinerario" value="{{ $id}}">
                                            <div class="dropzone-previews"></div>
                                            <button type="submit" class="btn btn-success" id="submit">Save</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                    </div>

                      <div class="box-body" id="divFormularioItinerario">
                       
                         {!! Form::open(["route" => ["insertarItinerario"] , "method" => "POST","id"=>"FormCrearItinerarie", "class" => "form-horizontal" ]) !!}

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                         <input type="text" class="form-control" id="name" name="name" >
                                          <input type="hidden" class="form-control" id="idTours" name="idTours" value="{{ $id}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Descripción</label>
                               {{--  <div class="col-sm-10">
                                        
                                        <textarea id="descripcion" name="descripcion" class="form-control" rows="10" cols="80">

                                        </textarea>
                                </div> --}}
                                 <div class="col-sm-12">
                                            <textarea id="editor1" name="editor1" rows="10" cols="80">

                                            </textarea>
                                      
                                 </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Departamento</label>
                                <div class="col-sm-2">
                                         <input type="text" class="form-control" id="departamento" name="departamento" >
                                </div>
                                <label for="inputPassword3" class="col-sm-2 control-label">Provincia</label>
                                <div class="col-sm-2">
                                         <input type="text" class="form-control" id="provincia" name="provincia" >
                                </div>
                                <label for="inputPassword3" class="col-sm-2 control-label">Distrito</label>
                                <div class="col-sm-2">
                                         <input type="text" class="form-control" id="distrito" name="distrito" >
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Altitud</label>
                               <div class="col-sm-4">
                                         <input type="text" class="form-control" id="altitud" name="altitud">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Longitud</label>
                               <div class="col-sm-4">
                                         <input type="text" class="form-control" id="longitud" name="longitud">
                                </div>
                            </div>

                         <div class="box-footer">
                             <button type="submit" class="btn btn-info pull-right" name="btnInsertarItinerario">Guardar</button>
                         </div>

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

@section('script')
{!!Html::script('/assets/dist/js/ckeditor/ckeditor.js')!!}
{!!Html::script('/assets/dist/css/dropzone/dropzone.js')!!}

<script>
   
$(function () {
    
    CKEDITOR.replace('editor1')
        $('.textarea').wysihtml5()
      })

    
        $('#divFormularioItinerario').hide();
      
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 1,
            
            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                    $('#panelImagenes').hide();
                     $('#divFormularioItinerario').show();
                });
                this.on("addedfile", function(file) {
                    
                });
                
                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });
 
                this.on("success", 
                    myDropzone.processQueue.bind(myDropzone)
                );


            }
        };


        


    
</script>


@endsection