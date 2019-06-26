@extends('assets.admin.layout.from')

@section('contenido')
    <section class="content-header">
        <h1 class="pull-left">Categoria Blogs</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('categoria_controller.create') !!}">Crear</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

      

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                   @include('assets.admin.categoria_blogs.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
        $('#inicio').DataTable({
            "language": {
            "url": "/admin/idioma/Spanish.json"
            }
        });
        });
    </script>
@endsection