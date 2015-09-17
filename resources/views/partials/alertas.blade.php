
@if($errors->any())
    @foreach($errors->all() as $erro)
    <div class="alert alert-danger">{{$erro}}</div>
    @endforeach
@endif

@if(Session::has('sucesso'))
    <div class="alert alert-success">{!! Session::get('sucesso') !!}</div>
@endif