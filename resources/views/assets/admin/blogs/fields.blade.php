
<!-- Categoria Blog Id Field -->
<div class="form-group col-sm-6">
    <!-- {!! Form::label('categoria_blog_id', 'Categoria Blog Id:') !!}
    {!! Form::text('categoria_blog_id', null, ['class' => 'form-control']) !!} -->

    {!! Form::label('categoria_blog_id', 'Categoria:') !!}
        <select id="categoria_blog_id" name="categoria_blog_id" class='form-control'>
            @foreach($categoria as $item )
              @if($opcion==0)
                <option value="{{$item->id}}">{{$item->nombre}}</option>
              @else
                 <option value="{{$item->id}}" {{ ($item->id == $blog->categoria_blog_id ) ? 'selected': ''}} >{{$item->nombre}}</option>
              @endif
               
            @endforeach
        </select>
</div>

<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('descripcioncorta', 'Descripcion corta:') !!}
    {!! Form::text('descripcioncorta', null, ['class' => 'form-control']) !!}
</div>
<!-- Url Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Fechapublicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaPublicacion', 'Fecha publicación:') !!}
    @if($opcion==0)
    {!! Form::date('fechaPublicacion', $date, ['class' => 'form-control']) !!}
    @else
    {!! Form::date('fechaPublicacion', $blog->fechaPublicacion , ['class' => 'form-control']) !!}
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('autor', 'autor:') !!}
    {!! Form::text('autor', null, ['class' => 'form-control']) !!}
</div>
<!-- Estado Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
    
</div> -->

<!-- Contenido Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contenido', 'Contenido:') !!}
    {!! Form::textarea('contenido', null, ['class' => 'form-control']) !!}
</div>

<!-- Contador Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('contador', 'Contador:') !!}
    {!! Form::text('contador', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12" style="text-align: center;">
     <button type="submit"  style="text-align: center;" class="btn btn-success" id="Modificar" name="Modificar">Modificar</button>
       <button type="button"  style="text-align: center;" class="btn btn-success" id="btnUpload" name="btnUpload">Guardar </button>

    <a href="{!! route('blogs.index') !!}" class="btn btn-default">Cancelar</a>
</div>

