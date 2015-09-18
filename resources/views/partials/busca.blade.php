{!! Form::open(['class' => 'well', 'method' => 'GET']) !!}
    {!! Form::text('busca', $busca, ['class' => 'form-control', 'placeholder' => 'Busca por nome']) !!}
    <div class="col-md-12 text-right">
        <button class="btn btn-primary" type="submit">
            <i class="fa fa-fw fa-search"></i>
            Buscar
        </button>
    </div>
    <br style="clear: both" />
{!! Form::close() !!}