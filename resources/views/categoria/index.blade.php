@extends('layout.layout')

@section('conteudo')

    <h1 class="page-header"><i class="fa fa-fw fa-list"></i>Categorias</h1>

    <div class="row">
        <div class="col-md-7">

            <table class="table table-bordered table-striped table-hover" id="gridCategorias">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Criada em</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{!! $categoria->id !!}</td>
                        <td>{!! $categoria->nome !!}</td>
                        <td>{!! $categoria->created_at !!}</td>
                        <td>
                            <button class="btn btn-primary btn-xs">Editar</button>
                            <button class="btn btn-danger btn-xs">Excluir</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12 text-center">
                    {!! $categorias->render() !!}
                </div>
                <div class="col-md-12 text-center">
                    Página {!! $categorias->currentPage() !!} de {!! $categorias->lastPage() !!} - Total de itens {!! $categorias->total() !!}
                </div>
            </div>

        </div>
        <div class="col-md-5">

            <div class="well">
                {!! Form::open(array('url' => 'foo/bar')) !!}
                <div class="form-group">
                    {!! Form::label('nome', 'Nome', array('class' => 'form-label')) !!}
                    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row">

                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>

@endsection