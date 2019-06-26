@extends('assets.admin.layout.from')
@section('contenido')
	    <section class="content-header">
      <h1>
        
      </h1>
      
    </section>

    <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">LISTADO</h3>
          <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>

        </div>
        
        <div class="box-body">
           <a href="{{ URL::route('categories.create')}}" type="button" class="btn bg-olive margin">Nuevo</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Imagen</th>
                      <th>Fecha</th>
                      <th>F Actualización</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($categorias as $itemp)
                      <tr>
                        <td>{{$itemp->name}}</td>
                        <td>{{$itemp->description}}</td>
                        <td>
                            <img src="public/admin/categoria/{{$itemp->id}}.{{$itemp->img}}" style="height: 50px;"> 
                        </td>
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
                                  {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $itemp->id]]) !!}
                                         {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-ls'] )  }}
                                  {!! Form::close() !!}
                                </li>
                                <li>
                                     <a href="{{ URL::route('categories.show',$itemp->id)}}"> 
                                        <i class="fa fa-pencil"></i> Modificar
                                    </a> 
                                </li>
                                <li>
                                     <a href="#" onclick="listarSubCategoria('{{$itemp->id}}')"> 
                                        <i class="glyphicon glyphicon-ok"></i> Sub categoría
                                    </a> 
                                </li>
                              </ul>
                            </div>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
          {{ $categorias->links() }}
        </div>
        <div class="box-footer">
          CATEGORIAS
        </div>
      </div>

    </section>

    <div id="myModalSubCategoria" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Sub categoria </h4>
          </div>
          <div class="modal-body">
                    {!! Form::open(['route' => ['sub_categoria.save'] , 'method' => 'POST', 'class' => 'form-horizontal','id' => 'sub_categoria']) !!}

                        <div class="box-body">
                           
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                            <input type="hidden" name="idCategia" id="idCategia">
                            <div class="col-sm-10">
                               {!!Form::text('name',null,['class'=>'form-control','required'])!!}
                            </div>
                          </div>

                      
                        </div>
                        <div class="box-footer">
                          <button type="" id="creaSubCatgoria" name="creaSubCatgoria" class="btn btn-info pull-right">Crear</button>
                        </div>
                  {!! Form::close() !!}

                     <table id="inicioDatable" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>name</th> 
                          <th></th> 
                        </tr>
                      </thead>
                      <tbody id="tableListar" name="tableListar">
                       
                        
                      </tbody>
                    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

@endsection
@section('script')
    <script>
        function listarSubCategoria(idCategia)
            {
              var idCategia;

              $('#myModalSubCategoria').modal('show'); 
              $("#idCategia").val(idCategia);


                var htmlListar;
                $("#tableListar").html('');
                $.ajax({
                             url:"{{route('sub_categoria.listar')}}",
                             type: 'POST',
                             data:{
                                    "_token": "{{ csrf_token() }}",
                                     "idCategoria":idCategia,
                                },
                              dataType: 'JSON',
                              success: function(respuesta) 
                              {

                                        
                                        $.each(respuesta.data,function(index,element)
                                            { 
                                              htmlListar=htmlListar + "<tr>"+ 
                                                                      "<td>"+element.id+" </td>"+
                                                                      "<td>"+element.name+"</td>"+
                                                                      "<td><button type='button' class='btn btn-danger btn-sm' onclick='eliminar("+element.id+");'>Eliminar</button></td>"+
                                                                    "</tr>";
                                            });
                                            $("#tableListar").html(htmlListar);
                                      
                                 
                                }
                          });

            }

        $(function () 
        {
        


              $("#creaSubCatgoria" ).click(function(e) {
                    
                   e.preventDefault();
                     $.ajax({                        
                            url:'{{ route('sub_categoria.save') }}',
                            type: 'POST',           
                            data: $("#sub_categoria").serialize(), 
                            success: function(data)             
                            {
                                   
                              listarSubCategoria(data.id);
                            }

                        });

            
            });


        });

        function  eliminar(id)
        {

            $.ajax({                        
                        url:'{{ route('sub_categoria.eliminar') }}',
                        type: 'POST',           
                        data:{
                                    "_token": "{{ csrf_token() }}",
                                     "idSub":id,
                                }, 
                        success: function(data)             
                        {
                               
                          listarSubCategoria(data.id);
                        }

                    });

        }
        
    </script>


@endsection