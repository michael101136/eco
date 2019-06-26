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
       
            <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
            </div>

        </div>
        
        <div class="box-body">
           <a href="{{ URL::route('createItinerario',$id)}}" type="button" class="btn bg-navy btn-flat margin">Nuevo</a>
            <table id="example1" class="table table-bordered table-striped">
          <div class="col-md-12">
                         
                  <table class="table" id="tableImagenes">
                    <thead>
                      <tr>
                        <th>DÍA</th>
                        <th>NAME</th>
                        <th>IMAGEN</th>
                        <th>DESCRIPCIÓN</th>
                        <th>LUGAR</th>
                        <th>COORDENADAS</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="tablaItinerarioTour">
                        
                    </tbody>
                  </table>
            </div>
            
             <div class="col-md-2">
                
             </div>

        </div>
        <div class="box-footer">
          ITINERARIO
        </div>
      </div>

    </section>




  <div class="modal fade" id="myModalEditar" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar </h4>
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

                <div class="box box-info">
                                          

                    <div class="col-md-12">   
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    SUBIR IMAGENES
                                </div>
                                <div class="panel-body">
                                    {!! Form::open(['route'=> ['UpdateImagenItinerario'], 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}

                                            <div class="dz-message" style="height:100px;">
                                                Drop your files here
                                            </div>
                                            <input type="hidden" class="form-control" id="idItinerarioImagen" name="idItinerarioImagen">
                                            <div class="dropzone-previews"></div>
                                            <button type="submit" class="btn btn-success" id="submit">Save</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                    </div>

                      <div class="box-body">
                       
                         {!! Form::open(["route" => ["updateItinerario"] , "method" => "POST","id"=>"updateItinerario", "class" => "form-horizontal" ]) !!}

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Editarname" name="Editarname" >
                                        <input type="hidden" class="form-control" id="idItinerarioTour" name="idItinerarioTour" value="{{ $id}}">
                                        <input type="hidden" class="form-control" id="idItinerario" name="idItinerario">
                                        
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Descripción</label>
                                <div class="col-sm-10">
                                        
                                        <textarea id="Editardescripcion" name="Editardescripcion" class="form-control" rows="10" cols="80">

                                        </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Departamento</label>
                                <div class="col-sm-2">
                                         <input type="text" class="form-control" id="Editardepartamento" name="Editardepartamento" >
                                </div>
                                <label for="inputPassword3" class="col-sm-2 control-label">Provincia</label>
                                <div class="col-sm-2">
                                         <input type="text" class="form-control" id="Editarprovincia" name="Editarprovincia" >
                                </div>
                                <label for="inputPassword3" class="col-sm-2 control-label">Distrito</label>
                                <div class="col-sm-2">
                                         <input type="text" class="form-control" id="Editardistrito" name="Editardistrito" >
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Altitud</label>
                               <div class="col-sm-4">
                                         <input type="text" class="form-control" id="Editaraltitud" name="Editaraltitud">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Longitud</label>
                               <div class="col-sm-4">
                                         <input type="text" class="form-control" id="Editarlongitud" name="Editarlongitud">
                                </div>
                            </div>

                      </div>
                   
                      <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right" name="submit">Guardar</button>
                      </div>
                {!! Form::close() !!}
        </div>
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('script')
{!!Html::script('/assets/dist/js/ckeditor/ckeditor.js')!!}
{!!Html::script('/assets/dist/css/dropzone/dropzone.js')!!}

<script>
   $(function () {
    
    CKEDITOR.replace('Editardescripcion')
        $('.textarea').wysihtml5()
      })
    var suma=1;
      
             function crearFormularioItinerario()
             {
                 $('#myModal').modal('show'); 
             }
    
    listarImagenes();
    function  listarImagenes()
                {
                 
                    var id={{ $id}};
                    var htmlTours;

                     $( "#tablaItinerarioTour" ).html('');

                 $.ajax({
                           url:'{{ route('listarItinerarios') }}/'+id,
                               type: 'GET',
                           success: function(data) 
                           {

                         
                             $.each(data.itineraio,function(index,element)
                                { 
                                
                                htmlTours=htmlTours + "<tr>"+ 
                                                             "<td> "+element.day+" </td>"+
                                                               "<td> "+element.name+" </td>"+
                                                               "<td> <img  style='height: 50px;' src='/"+element.photo+"'></td>"+
                                                               "<td> "+element.description+"  </td>"+
                                                               "<td> "+element.department+" : "+element.province+" :   "+element.district+"  </td>"+
                                                               "<td> "+element.altitud+" : "+element.latitud+"  </td>"+
                                                               "<td> <a  onclick='eliminarItinerario("+element.id+",this)' class='btn btn-danger btn-ls'> <i class='fa fa-trash'></i></a>"+  
                                                               "</td>"+
                                                               "<td> <a  onclick='editarItinerario("+element.id+")' class='btn btn-success btn-ls'> <i class='fa fa-fw fa-edit'></i></a>"+  
                                                               "</td>"+
                                                         "<tr>";

                                });

                               $("#tablaItinerarioTour").append(htmlTours);

                           }
                        });
                      
                }
     function eliminarItinerario(id,trEliminar) 
      {

         $.ajax({
                     url:'{{ route('delete_itinerario') }}/'+id,
                     type: 'GET',
                     success: function(data) 
                     {
                        var i = trEliminar.parentNode.parentNode.rowIndex;
                        document.getElementById("tableImagenes").deleteRow(i);
                         
                     }
                });  

      }   

        function editarItinerario(id)
         {
             ImagnesItinerario(id);
             $("#sliderTabla").html('');

             $.ajax({
                     url:'{{ route('showItinerario') }}/'+id,
                     type: 'GET',
                     success: function(data) 
                     {
                        // var id=data.data.id;
                        $("#Editardepartamento").val(data.data.department);
                        $("#Editarprovincia").val(data.data.province);
                        $("#Editardistrito").val(data.data.district);
                        $("#Editaraltitud").val(data.data.altitud);
                        $("#Editarlongitud").val(data.data.latitud);
                        CKEDITOR.instances['Editardescripcion'].setData(data.data.description);
                        // $("#Editardescripcion").val(data.data.description);
                        $("#Editarname").val(data.data.name);
                        $('#myModalEditar').modal('show'); 
                        $("#idItinerarioTour").val(data.data.tour_id);
                        $("#idItinerario").val(data.data.id);
                        $("#idItinerarioImagen").val(data.data.id);

                
                     }
                });  

         }

            function ImagnesItinerario(id)
         {
            
             $("#sliderTabla").html('');
             $("#sliderTabla").append('');

             $.ajax({
                     url:'{{ route('showItinerario') }}/'+id,
                     type: 'GET',
                     success: function(data) 
                     {
                        

                       var htmlTours=htmlTours + "<tr>"+ 
                                                             "<td>  <img  style='height: 50px;' src='/"+data.data.photo+"'> </td>"+
                                                             "<td> <a  onclick='eliminarImagem("+data.data.id+",this)' class='btn btn-danger btn-ls'> <i class='fa fa-trash'></i></a>"+  
                                                         "</td>"+
                                                         "<tr>";

                         $("#sliderTabla").append(htmlTours);
                     }
                });  

         }


    
    
      
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: false,
            maxFilezise: 10,
            maxFiles: 1,
            
            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();

                    var id=$("#idItinerario").val();
                    ImagnesItinerario(id);     
                
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