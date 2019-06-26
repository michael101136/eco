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
           <a href="{{ URL::route('testimonio.create')}}" type="button" class="btn bg-olive margin">Nuevo</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Nacionalidad</th>
                      <th>Photo</th>
                      <th>status</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($data as $itemp)
                      <tr>
                        <td>{{$itemp->name}}</td>
                        <td>{{$itemp->email}}</td>
                        <td>{{$itemp->date}}</td>
                        <td>{{$itemp->nationality}}</td>
                        <td> <img  style="height: 50px; width: 70px;" src="/admin/testimonio/{{$itemp->id}}.{{$itemp->photo}}"></td>
                        <td>

                                @if($itemp->status=='1')

                                   <small class="label label-success"><i class="fa fa-clock-o"></i> APROBADO</small>
                                                  
                                @endif

                        </td>
                        <td>
                            @if($itemp->status=='1')

                                <a  href="{{ route('testimonio.estado',['id'=> $itemp->id])}}" type="button"  class="btn bg-olive margin btn-xs">
                                         <span class="glyphicon glyphicon-ok"></span>                           
                                </a>
                                                  
                            @else

                                <a  href="{{ route('testimonio.estado',['id'=> $itemp->id])}}" type="button"  class="btn bg-danger margin btn-xs">
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
          TESTIMONIOS
        </div>
      </div>

    </section>

@endsection