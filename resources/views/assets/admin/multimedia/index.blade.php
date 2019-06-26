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
          <h3 class="box-title">LISTADO DE MULTIMEDIA</h3>
          <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>

        </div>
        
        <div class="box-body">
           <a href="{{ URL::route('multimedia.create')}}" type="button" class="btn bg-olive margin">Nuevo</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Fecha</th>
                      <th>F Actualización</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($multimedias as $itemp)
                      <tr>
                        <td>{{$itemp->name}}</td>
                        <td>{{ str_limit($itemp->description,150) }}</td>
                        <td>{{$itemp->created_at}}</td>
                        <td>{{$itemp->updated_at}}</td>
                        <td>
                           <div class="btn-group">
                              <button type="button" class="btn btn-success">Acción</button>
                              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li style="text-align: center;">
                                  {!! Form::open(['method' => 'DELETE','route' => ['multimedia.destroy', $itemp->id]]) !!}
                                         {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-ls'] )  }}
                                  {!! Form::close() !!}
                                </li><br>
                                <li style="text-align: center;">
                                    {{--  <a href="{{ URL::route('multimedia.show',$itemp->id)}}"> 
                                        <i class="fa fa-pencil"></i> Modificar
                                    </a>  --}}
                                     <button type="button" class="btn btn-success btn-ls" onclick="listarImagenes({{$itemp->id}});">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </li>
                              </ul>
                            </div>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
            {{ $multimedias->links() }}
        </div>
        <div class="box-footer">
          Multimedia
        </div>
      </div>

    </section>


    <div class="modal fade" id="sliderImagenes">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Slider</h4>
              </div>
              <div class="modal-body">
               <table class="table table-striped" id="tableImagenes">
                    <thead>
                      <tr>
                        <th>Imagen</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody id="sliderTabla">
                     
                     
                    </tbody>
                  </table>

     
                        <div class="row">
                              <div class="col-md-12">   
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
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Guardar</button>
              </div>
            </div>
         
          </div>

        
    </div>

@endsection



@section('script')
{!!Html::script('/assets/dist/css/dropzone/dropzone.js')!!}

<script>
  function  listarImagenes(id)
                {
                 
              $('#sliderImagenes').modal('show'); 
           
                    var htmlTours;
                    var idMultimedia;
                     $( "#sliderTabla" ).html('');
                 $.ajax({
                           url:'{{ route('listarImagenes') }}/'+id,
                               type: 'GET',
                           success: function(data) 
                           {

                             $.each(data.data,function(index,element)
                                { 
                                   htmlTours=htmlTours + "<tr>"+ 
                                                             "<td>  <img  style='height: 50px;' src="+element.path+"> </td>"+
                                                             "<td> <a  onclick='eliminarImagem("+element.id+",this)' class='btn btn-danger btn-ls'> <i class='fa fa-trash'></i></a>"+  
                                                         "</td>"+
                                                         "<tr>";
                                    idMultimedia =element.multimedia_id;
                                });

                               $("#idMultimedia").val(id);

                               $("#sliderTabla").append(htmlTours);

                           }
                        });
                      
                }

        function eliminarImagem(id,trEliminar)
        {

                 $.ajax({
                             url:'{{ route('EliminarImagenes') }}/'+id,
                             type: 'GET',
                             success: function(data) 
                             {
                                var i = trEliminar.parentNode.parentNode.rowIndex;
                                document.getElementById("tableImagenes").deleteRow(i);
                                 
                             }
                        });  
        }

      
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

                    var id=$("#idMultimedia").val();
                    listarImagenes(id);
                    

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
    
                
                              

                /*$("#btncrearMultimedia").click(function (e) {
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
                         });*/
       
        });
    </script>
@endsection