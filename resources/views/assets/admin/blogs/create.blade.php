@extends('assets.admin.layout.from')
 
           
@section('contenido')
    <section class="content-header">
        <h1>
            Blog
        </h1>
    </section>
    <div class="content">
     
        <div class="box box-primary">

            <div class="box-body">

                <div class="panel panel-info">
                    <div class="panel-heading">SUBIR PORTADA</div>
                    <div class="panel-body">
                        
                       
                             {!! Form::open(['route' => 'blog.save','id'=>'dropzone','class'=>'dropzone']) !!}
                                  
                               {!! Form::close() !!}

                    </div>
                    <div style="text-align: center;">
                        
                    </div><br>
               
                </div>
                <div class="row">


                    {!! Form::open(['id'=>'form-crearEntrada','class'=>'form-crearEntrada']) !!}

                        @include('assets.admin.blogs.fields')

                    {!! Form::close() !!}
                </div>
            </div>


        </div>
    </div>
@endsection
@section('script')
    <script>
    
        $(document).ready(function() {
         
          $('#contenido').summernote();
        });
        
           Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#dropzone', {
            paramName: 'file',
            maxFilesize: 5, // MB
            autoProcessQueue: false,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            dictRemoveFile: 'Remover foto',
            dictDefaultMessage: "Arrastre las fotos que desea subir aquí.",
            init: function() {
                this.on("success", function(file, response) {
                    var a = document.createElement('span');
                    a.className = "thumb-url btn btn-primary";
                    
                    a.innerHTML = "copy url";
                    file.previewTemplate.appendChild(a);
                });
                 this.on("queuecomplete", function() { 
                   this.options.autoProcessQueue = false; 
                  }); 

                  this.on("processing", function() { 
                   this.options.autoProcessQueue = true; 
                  }); 

            }
        });
        
         $('#btnUpload').on('click', function(e){

                e.preventDefault();
                var data = $('#form-crearEntrada').serialize();

                 $.ajax({
                  url:'{{ route('blog.contenido') }}',
                    type: 'POST',
                    data:data,
                     success: function(data) {
                       
                             console.log(data);
                             myDropzone.processQueue();
                            window.setTimeout('location.reload()', 3000);
                    }
                    
                });

        });
        
        
    </script>

@endsection