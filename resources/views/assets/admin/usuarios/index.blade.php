@extends('assets.admin.layout.from')
@section('contenido')
	    <section class="content-header">
      <h1>
        
      </h1>
      
    </section>

    <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Listado </h3>
          <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>

        </div>
        
        <div class="box-body">
           <a href="{{ URL::route('users.create')}}" type="button" class="btn bg-olive margin">Nuevo</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Fecha</th>
                      <th>F Actualización</th>
                      <th>Rol</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($users as $itemp)
                      <tr>
                        <td>{{$itemp->name}}</td>
                        <td>{{$itemp->phone}}</td>
                        <td>{{$itemp->email}}</td>
                        <td>{{$itemp->created_at}}</td>
                        <td>{{$itemp->updated_at}}</td>
                        <td>{{$itemp->privilege}}</td>
                        <td>
                           <div class="btn-group">
                              <button type="button" class="btn btn-success">Acción</button>
                              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li style="text-align: center;">
                                  {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $itemp->id]]) !!}
                                         {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-ls'] )  }}
                                  {!! Form::close() !!}
                                </li>
                                <li>
                                     <a href="{{ URL::route('users.show',$itemp->id)}}"> 
                                        <i class="fa fa-pencil"></i> Modificar
                                    </a> 
                                </li>
                              </ul>
                            </div>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
                @if (count($users))
                     {{ $users->links() }}
                @endif
        </div>
        <div class="box-footer">
          Usuarios
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