<div class="table-responsive">
    <table class="table" id="inicio">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
                <th colspan="1">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categoriaBlogs as $categoriaBlog)
            <tr>
                <td>{!! $categoriaBlog->nombre !!}</td>
            <td>{!! $categoriaBlog->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['categoria_controller.destroy', $categoriaBlog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('categoria_controller.show', [$categoriaBlog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('categoria_controller.edit', [$categoriaBlog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
