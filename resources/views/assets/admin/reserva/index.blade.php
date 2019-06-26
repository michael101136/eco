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
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>phone</th>
                      <th>Pais</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Nacionalidad</th>
                      <th>status</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($data as $itemp)
                      <tr>
                        <td>{{$itemp->id}}</td>
                        <td>{{$itemp->name}}</td>
                        <td>{{$itemp->phone}}</td>
                        <td>{{$itemp->country}}</td>
                        <td>{{$itemp->email}}</td>
                        <td>{{$itemp->fecha}}</td>
                        <td>{{$itemp->lenguaje}}</td>
                        <td>

                                @if($itemp->status=='pendiente')

                                   <small class="label label-danger"><i class="fa fa-clock-o"></i> PENDIENTE</small>
                                                  
                                @else
                                
                                 <small class="label label-success"><i class="fa fa-clock-o"></i> ATENDIDO</small>
                                
                                @endif

                        </td>
                        <td>
                            @if($itemp->status=='aprobado')

                                <a  href="{{ route('reserva.estado',['id'=> $itemp->id])}}" type="button"  class="btn bg-olive margin btn-xs">
                                         <span class="glyphicon glyphicon-ok"></span>                           
                                </a>
                                                  
                            @else

                                <a  href="{{ route('reserva.estado',['id'=> $itemp->id])}}" type="button"  class="btn bg-success margin btn-xs">
                                         <span class="glyphicon glyphicon-remove"></span>                           
                                </a>

                            @endif
                             
                        </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
                                  {{ $data->links() }}

        </div>
        <div class="box-footer">
          RESERVA
        </div>
      </div>

    </section>

@endsection
@section('script')

<script>

$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 3, "desc" ]],
        "paging" :  true,
    } );
} );



    
    </script>
@endsection