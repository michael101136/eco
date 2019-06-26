@extends('assets.admin.layout.from')
@section('contenido')
    <section class="content-header">
        <h1 class="pull-left">Blogs</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('blogs.create') !!}">Crear</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('assets.admin.blogs.table')
            </div>
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