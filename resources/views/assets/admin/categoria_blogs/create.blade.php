@extends('assets.admin.layout.from')

@section('contenido')
    <section class="content-header">
        <h1>
            Categoria Blog
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'categoria_controller.store']) !!}

                        @include('assets.admin.categoria_blogs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
