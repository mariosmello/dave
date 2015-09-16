@extends('layout.layout')

@section('conteudo')
    <h1 class="page-header"><i class="fa fa-fw fa-list"></i>Categorias</h1>

    <div class="well">
        {!! Form::open(array('url' => 'foo/bar')) !!}
        <div class="form-group">
            {!! Form::label('email', 'E-Mail Address', array('class' => 'form-label')) !!}
            {!! Form::text('email', 'example@gmail.com', ['class' => 'form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>

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
    <p></p>
    </table>

    <div class="row">
        <div class="col-md-12 text-center">
            {!! $categorias->render() !!}
        </div>
        <div class="col-md-12 text-center">
            Página {!! $categorias->currentPage() !!} de {!! $categorias->lastPage() !!} - Total de itens {!! $categorias->total() !!}
        </div>
    </div>


@endsection