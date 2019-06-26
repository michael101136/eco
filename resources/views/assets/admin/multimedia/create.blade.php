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
          
           <div class="col-md-10">
                
                        <div class="box-body">
                        
                             <div class="col-md-12" id="bannerSlider">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                          <h3 class="box-title">Slider</h3>
                                        </div>
                                       {!! Form::open(['route' => ['multimedia.store'] , 'method' => 'POST', 'class' => 'form-horizontal','id'=>'formCrearMultimedia']) !!}

                                            <div class="box-body">
                                               
                                              <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>

                                                <div class="col-sm-10">
                                                   {!!Form::text('name',null,['class'=>'form-control','required'])!!}
                                                   <p style="color:red;">{{ $errors->first('name') }}</p>
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-2 control-label">Description</label>

                                                    <div class="col-sm-10">
                                                       {!!Form::textarea('description',null,['class'=>'form-control','required'])!!}
                                                    </div>
                                              </div>

                                          
                                            </div>
                                            <div class="box-footer">
                                              <button type="submit"  id="btncrearMultimedia" name="btncrearMultimedia" class="btn btn-info pull-right">Crear</button>
                                            </div>
                                      {!! Form::close() !!}
                                     </div>
                                </div>
            
                             <div class="col-md-2">
                                
                             </div>

                              <div class="container" id="slider">
                                <div class="row">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            SUBIR IMAGENES
                                        </div>
                                        <div class="panel-body">
                                            {!! Form::open(['route'=> 'imagen.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                                            <div class="dz-message" style="height:200px;">
                                                Drop your files here
                                            </div>
                                            <input type="hidden" name="idMultimedia" id="idMultimedia">
                                            <div class="dropzone-previews"></div>
                                            <button type="submit" class="btn btn-success" id="submit">Save</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>


            </div>
            
             <div class="col-md-2">
                
             </div>

            

        </div>
        <div class="box-footer">
          Multimedia
        </div>
      </div>

    </section>

@endsection

@section('script')

{!!Html::script('/assets/dist/css/dropzone/dropzone.js')!!}

<script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 20,
            
            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
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

        $(document).ready(function(){
    

              $('#slider').hide(); 

                $("#btncrearMultimedia").click(function (e) {
                    e.preventDefault();
                        var data = $('#formCrearMultimedia').serialize();
                         $.ajax({
                                     url:'{{ route('multimedia.store') }}',
                                         type: 'POST',
                                         data:data,
                                     success: function(data) 
                                     {
                                          $("#idMultimedia").val(data.id);
                                          $('#slider').show();
                                          $('#bannerSlider').hide(); //muestro mediante id
                                     }
                                });
                         });
       
        });
    </script>
@endsection